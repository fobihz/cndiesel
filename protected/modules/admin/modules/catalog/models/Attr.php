<?php

/**
 * This is the model class for table "cat_attr".
 *
 * The followings are the available columns in table 'cat_attr':
 * @property string $id
 * @property integer $type_id
 * @property integer $mytype_id
 * @property string $name
 * @property string $pos
 */
class Attr extends CActiveRecord
{
        public $prefix = 'cat_';
	/**
	 * Returns the static model of the specified AR class.
	 * @return Attr the static model class
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
		return $this->prefix.'attr';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type_id, mytype_id, name, pos', 'required','message'=>'параметр не может быть пустым',),
			array('type_id, mytype_id, pos', 'numerical', 'integerOnly'=>true,'message'=>'значение параметра должно быть числом',),
			array('pos', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type_id, mytype_id, name, pos', 'safe', 'on'=>'search'),
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
			'type' => array(self::BELONGS_TO, 'Type', 'type_id'),
			'mytype' => array(self::BELONGS_TO, 'Mytype', 'mytype_id'),
			'stres' => array(self::MANY_MANY, 'Stre', 'cat_attr_val(id_elem, id_attr)'),
                        
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'type_id' => 'Группа аттрибутов',
			'mytype_id' => 'CMS-тип',
			'name' => 'Наименование',
			'pos' => 'Позиция',
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

		$criteria->compare('id',$this->id,true);

		$criteria->compare('type_id',$this->type_id);

		$criteria->compare('mytype_id',$this->mytype_id);

		$criteria->compare('name',$this->name,true);

		$criteria->compare('pos',$this->pos,true);

		return new CActiveDataProvider('Attr', array(
			'criteria'=>$criteria,
		));
	}
}