<?php

/**
 * This is the model class for table "cat_mytype".
 *
 * The followings are the available columns in table 'cat_mytype':
 * @property integer $id
 * @property string $name
 * @property string $dbtype
 */
class Mytype extends CActiveRecord
{
	public $prefix = 'cat_';
	/**
	 * Returns the static model of the specified AR class.
	 * @return Mytype the static model class
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
		return $this->prefix.'mytype';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, dbtype', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, dbtype', 'safe', 'on'=>'search'),
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
			'cat_attrs' => array(self::HAS_MANY, 'Attr', 'mytype_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'name' => 'Name',
			'dbtype' => 'Dbtype',
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

		$criteria->compare('dbtype',$this->dbtype,true);

		return new CActiveDataProvider('Mytype', array(
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
}