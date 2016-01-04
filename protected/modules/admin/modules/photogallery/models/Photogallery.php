<?php

/**
 * This is the model class for table "phg_photogallery".
 *
 * The followings are the available columns in table 'phg_photogallery':
 * @property string $id
 * @property string $name
 * @property string $text
 * @property integer $pos
 * @property integer $view
 */
class Photogallery extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Photogallery the static model class
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
		return 'phg_photogallery';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('view', 'numerical', 'integerOnly'=>true),
                        array('text, pos, view','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, text, pos, view', 'safe', 'on'=>'search'),
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
			'photos' => array(self::HAS_MANY, 'Photo', 'phid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => '#',
			'name' => 'Наименование',
			'text' => 'Текст',
			'pos' => 'Позиция',
			'view' => 'Отобр.',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
        public function view2str()
        {
            if($this->view) return 'Да';
            else return 'Нет';
        }

        public function preview($num=null)
        {
            $criteria = new CDbCriteria();
            $criteria->order = 'pos';
            if($num!='all')
                $criteria->limit = 5;
            $criteria->condition = 'phid=:phid';
            $criteria->params = array(':phid'=>$this->id);
            
            $photos = Photo::model()->findAll($criteria);
            $tmp = '';
            foreach($photos as $photo)
            {
                $tmp .= '&nbsp;'.$photo->name2img();
            }
            return $tmp;
        }
        public function number()
        {
            $criteria = new CDbCriteria();
            $criteria->condition = 'phid=:phid';
            $criteria->params = array(':phid'=>$this->id);

            return Photo::model()->count($criteria);
        }

	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);

		$criteria->compare('name',$this->name,true);

		$criteria->compare('text',$this->text,true);

		$criteria->compare('pos',$this->pos);

		$criteria->compare('view',$this->view);

                $criteria->order = 'pos';
               // $criteria->with = 'photos';

		return new CActiveDataProvider('Photogallery', array(
			'criteria'=>$criteria,
                        'pagination' => array(
                                                                      'pageSize' => 100000,
                                                                  ),
		));
	}
}