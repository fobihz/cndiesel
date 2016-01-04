<?php

/**
 * This is the model class for table "cat_stre".
 *
 * The followings are the available columns in table 'cat_stre':
 * @property string $id
 * @property integer $type_id
 * @property string $root
 * @property string $lft
 * @property string $rgt
 * @property integer $level
 * @property string $name
 * @property string $alias
 * @property integer $view
 */
class Stre extends CActiveRecord
{
        public $parentId;
	public $prefix = 'cat_';

        public function behaviors()
        {
            return array(
                'tree'=>array(
                    'class' => 'ext.trees.NestedSetBehavior',
                    'hasManyRoots'=>true,
                    'leftAttribute'=>'lft',
                    'rightAttribute'=>'rgt',
                    'levelAttribute'=>'level',
                    
            ));
        }


	/**
	 * Returns the static model of the specified AR class.
	 * @return Stre the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return $this->prefix.'stre';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type_id, name, alias, view', 'required','message'=>'параметр не может быть пустым'),
			array('type_id, view', 'numerical', 'integerOnly'=>true,'message'=>'параметр принимает только числовое значение'),
                        array('alias', 'unique','message'=>'параметр должен принимать уникальное значение'),
			array('title, keywords, description','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type_id, name, alias, view', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'attrs' => array(self::MANY_MANY, 'Attr', 'cat_attr_val(id_elem, id_attr)'),
			'type' => array(self::BELONGS_TO, 'Type', 'type_id'),
                        'attrs_vals' => array(self::HAS_MANY, 'AttrVal', 'id_elem'),
                        
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'type_id' => 'Группа атрибутов',
			'root' => 'Родитель',
			'lft' => 'Левый',
			'rgt' => 'Правый',
			'level' => 'Глубина',
			'name' => 'Наименование',
                        'title' => 'Заголовок',
                        'keywords' => 'Ключевые слова',
                        'description' => 'Описание',
			'alias' => 'URL',
			'view' => 'Отобр.',
		);
	}

        public function updateurl()
        {
            if($this->type_id != 16)
                return Yii::app()->controller->createUrl("update",array("id"=>$this->primaryKey,"pid"=>$_GET["id"],"Stre_page"=>$_GET["Stre_page"]));
            else
                return $this->attr_val('Ссылка в админке');
        }

        public function deleteurl()
        {
            if($this->type_id != 16)
                return Yii::app()->controller->createUrl("delete",array("id"=>$this->primaryKey));
            else
                return $_SERVER['REQUEST_URI'];
        }

        public function viewLink()
        {
            if($this->view)
                    return "Да";
            else
                    return 'Нет';
        }

        public function descendantsData()
        {
            $data = array();
            $data[$this->id] = $this->name;

            $models = $this->descendants()->findAll();
            foreach( $models as $model)
            {
               
               $data[$model->id] = $model->name;
            }
    
            return $data;
        }

        public function delete()
        {
            foreach ($this->attrs_vals as $attr_val)
            {
                if($attr_val->attr->mytype->mytype == 'photo' && !empty ($attr_val->value))
                {
                    @unlink($_SERVER['DOCUMENT_ROOT'].'/userfiles/original/'.$attr_val->value);
                    @unlink($_SERVER['DOCUMENT_ROOT'].'/userfiles/large/'.$attr_val->value);
                    @unlink($_SERVER['DOCUMENT_ROOT'].'/userfiles/medium/'.$attr_val->value);
                    @unlink($_SERVER['DOCUMENT_ROOT'].'/userfiles/small/'.$attr_val->value);
                    break;
                }
            }
            return parent::delete();

        }

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
        {
            // Warning: Please modify the following code to remove attributes that
            // should not be searched.

            $criteria = new CDbCriteria;
            $criteria->order = $this->tree->hasManyRoots
                    ? $this->tree->rootAttribute . ', ' . $this->tree->leftAttribute
                    : $this->tree->leftAttribute;
            $criteria->compare('id', $this->id, true);
            $criteria->compare('root', $this->root, true);
            $criteria->compare('lft', $this->lft, true);
            $criteria->compare('rgt', $this->rgt, true);
            $criteria->compare('level', $this->level);
            $criteria->compare('t.name', $this->name, true);
            $criteria->compare('alias', $this->alias, true);
            $criteria->compare('view', $this->view, true);
            $criteria->addCondition('root='.$this->root);
            //$criteria->condition = 'root=:root';
            $criteria->with = array('type');
           // $criteria->params = array(':root'=>$this->root);

            $num_on_page = Yii::app()->request->cookies['cat_num_on_page']->value;
            if(empty($num_on_page)) $num_on_page = 50;

            return new CActiveDataProvider(get_class($this), array(
                                                                  'criteria' => $criteria,
                                                                  'pagination' => array(
                                                                      'pageSize' => $num_on_page,
                                                                  ),
                                                                  'sort' => array(
                                                                      'defaultOrder' => 'root ASC, lft ASC',
                                                                  ),
                                                             ));
        }

    /**
     * Build tree-like array for display in DropDownList
     * using in admin panel
     * @static
     * @param bool $canSelectNonLeaf can user select category that have children
     * @return string[]
     */
    public static function TreeArray($canSelectNonLeaf = true)
    {
        if ($canSelectNonLeaf)
            return self::TreeArrayLeafCanSelected();
        else
            return self::TreeArrayLeafCannotSelected();
    }

    /**
     * Build tree-like array for display in DropDownList
     * Categories that have children cannot be selected
     * using in admin panel
     * @static
     * @return string[]
     */
    public static function TreeArrayLeafCannotSelected()
    {
        $roots = Category::model()->roots()->findAll();
        $res = array();
        foreach ($roots as $root) {
            if ($root->isLeaf())
                $res[$root->id] = $root->name;
            else
                $res[$root->name] = Category::GetChildrenForTreeArrayLeafCannotSelected($root);
        }

        return $res;
    }

    /**
     * Build tree-like array for the category
     * Categories that have children cannot be selected
     * @static
     * @param Category $elem the category for which builds array
     * @return string[]
     */
    private static function GetChildrenForTreeArrayLeafCannotSelected($elem)
    {
        $res = array();
        $roots = $elem->children()->findAll();
        foreach ($roots as $root) {
            if ($root->isLeaf())
                $res[$root->id] = $root->name;
            else
                $res[$root->name] = Category::GetChildrenForTreeArrayLeafCannotSelected($root);
        }
        return $res;
    }

    /**
     * Build tree-like array for display in DropDownList
     * Categories that have children can be selected
     * using in admin panel
     * @static
     * @return string[]
     */
    public static function TreeArrayLeafCanSelected()
    {
        $roots = Category::model()->roots()->findAll();
        $res = array();
        foreach ($roots as $root) {
            $res[$root->id] = $root->GetStringName();
            if (!$root->isLeaf())
                $res = $res + Category::GetChildrenForTreeArrayLeafCanSelected($root, 1);
        }

        return $res;
    }

    /**
     * Build tree-like array for the category
     * Categories that have children can be selected
     * @static
     * @param Category $elem the category for which builds array
     * @param integer $i nesting level
     * @return string[]
     */
    private static function GetChildrenForTreeArrayLeafCanSelected($elem, $i)
    {
        $res = array();
        $roots = $elem->children()->findAll();
        foreach ($roots as $root) {
            $res[$root->id] = $root->GetStringName();
            if (!$root->isLeaf())
                $res = $res + Category::GetChildrenForTreeArrayLeafCanSelected($root, $i + 1);
        }
        return $res;
    }

    /**
     * Return category name for dropDownList with spaces before it for tree-like visual view
     * @return string category name with spaces
     */
    public function GetStringName()
    {
        if ($this->isLeaf())
            return str_repeat('&nbsp', ($this->level - 1) * 4) . $this->name;
        else
            return str_repeat('&nbsp', ($this->level - 1) * 4) . "<b>" . $this->name . "</b>";
    }

    /**
     * @return Attr [] category attributes
     */
    public function GetCategoryAttributes()
    {
        $attrs = array();
        foreach ($this->attrGroups as $group) {
            foreach ($group->attrs as $attr) {
                $attrs[] = $attr;
            }
        }

        return $attrs;
    }

    public function attr_val($attr_name)
    {
        $sql = "SELECT * from cat_attr_val where id_elem=".$this->id." and id_attr = (select id from cat_attr where name='".$attr_name."' and type_id=".$this->type_id." limit 1) limit 1";
        $command = Yii::app()->db->createCommand($sql);
        $row = $command->queryRow();
        if(!empty($row))
            return $row['value'];
        else
            return null;
    }
}