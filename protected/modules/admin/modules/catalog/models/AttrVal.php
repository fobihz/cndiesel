<?php

/**
 * This is the model class for table "cat_attr_val".
 *
 * The followings are the available columns in table 'cat_attr_val':
 * @property string $id_elem
 * @property string $id_attr
 * @property string $value
 */
class AttrVal extends CActiveRecord
{
	public $prefix = 'cat_';
	/**
	 * Returns the static model of the specified AR class.
	 * @return AttrVal the static model class
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
		return $this->prefix.'attr_val';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_elem, id_attr, value', 'required'),
			array('id_elem, id_attr', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_elem, id_attr, value', 'safe', 'on'=>'search'),
		);
	}

        public function __get($name)
        {
            if($name==($this->id_attr))
                    return $this->value;
            else
                return parent::__get($name);
        }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
                    'attr' => array(self::BELONGS_TO, 'Attr', 'id_attr'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_elem' => 'Id Elem',
			'id_attr' => 'Id Attr',
			'value' => 'Value',
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

		$criteria->compare('id_elem',$this->id_elem,true);

		$criteria->compare('id_attr',$this->id_attr,true);

		$criteria->compare('value',$this->value,true);

		return new CActiveDataProvider('AttrVal', array(
			'criteria'=>$criteria,
		));
	}
}