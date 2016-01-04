<?php

/**
 * This is the model class for table "cat_type".
 *
 * The followings are the available columns in table 'cat_type':
 * @property integer $id
 * @property string $name
 */
class Type extends CActiveRecord
{
	public $prefix = 'cat_';
	/**
	 * Returns the static model of the specified AR class.
	 * @return Type the static model class
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
		return $this->prefix.'type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required','message'=>'параметр не может быть пустым',),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name', 'safe', 'on'=>'search'),
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
			'attrs' => array(self::HAS_MANY, 'Attr', 'type_id','order'=>'pos',),
			'stres' => array(self::HAS_MANY, 'Stre', 'type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'name' => 'Наименование',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);

		$criteria->compare('name',$this->name,true);

		return new CActiveDataProvider('Type', array(
			'criteria'=>$criteria,
		));
	}

        public static function selectData()
        {
            $models = self::model()->findAll();
            $data = array();
            foreach($models as $model)
            {
                $data[$model->id] = $model->name;
            }
            return $data;
        }

        public static function selectDataOnName($name)
        {
            $criteria = new CdbCriteria;
            $criteria->condition = "`name` LIKE('".$name.":%')";
            $models = self::model()->findAll($criteria);
            $data = array();
            foreach($models as $model)
            {
                $data[$model->id] = $model->name;
            }
            return $data;
        }
}