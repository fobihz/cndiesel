<?php

/**
 * This is the model class for table "Email".
 *
 * The followings are the available columns in table 'Email':
 * @property string $id
 * @property string $email
 * @property integer $used
 */
class Email extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Email the static model class
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
		return 'email';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, used', 'required'),
			array('used', 'numerical', 'integerOnly'=>true),
                        array('email', 'email'),
                        array('email', 'unique'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, email, used', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => '#',
			'email' => 'E-mail',
			'used' => 'Используется',
		);
	}

        public function used2str()
        {
            if($this->used) return 'Да';
            else return 'Нет';
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

		$criteria->compare('email',$this->email,true);

		$criteria->compare('used',$this->used);

		return new CActiveDataProvider('Email', array(
			'criteria'=>$criteria,
                        'pagination' => array(
                                                                      'pageSize' => 10000,
                                                                  ),
		));
	}

        public function emails2send()
        {
            $models = $this->findAll(array('condition'=>'used=1'));
            $emails = array();
            foreach($models as $model)
            {
                $emails[] = $model->email;
            }
            return $emails;
        }
}
