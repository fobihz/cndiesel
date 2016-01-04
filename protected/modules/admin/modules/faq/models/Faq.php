<?php

/**
 * This is the model class for table "Faq".
 *
 * The followings are the available columns in table 'Faq':
 * @property string $id
 * @property string $question
 * @property string $answer
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property integer $is_answered
 * @property integer $is_viewed
 */
class Faq extends CActiveRecord
{
        public $verifyCode;
        public function viewSDate()
        {
            $formater = new CDateFormatter(Yii::app()->locale);
            return $formater->format('dd.MM.yyyy',$this->date);
        }
	/**
	 * Returns the static model of the specified AR class.
	 * @return Faq the static model class
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
		return 'Faq';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('verifyCode', 'captcha', 'allowEmpty' => !extension_loaded('gd'), 'captchaAction' => 'faq/captcha', 'message'=>'неверный верификационный код','on'=>'create'),

			array('date, question, name', 'required'),
                        array('answer', 'safe'),
			array('is_answered, is_viewed', 'numerical', 'integerOnly'=>true),
                        array('date', 'type','type'=>'datetime','datetimeFormat'=>'dd.MM.yyyy HH:mm:ss','message'=>'{attribute} неверный формат'),
                        array('email', 'email','message'=>'{attribute} неверный формат'),
                        //array('date', 'type','datetimeFormat'=>'yyyy-MM-dd HH:mm:ss'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, date,question, answer, name, email, phone, is_answered, is_viewed', 'safe', 'on'=>'search'),
		);
	}

        public function viewDate()
        {
            $formater = new CDateFormatter(Yii::app()->locale);
            return $formater->format('dd.MM.yyyy HH:mm:ss',$this->date);
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

        public function dbDate()
        {
             $formater = new CDateFormatter(Yii::app()->locale);
             $this->date = $formater->format('yyyy-MM-dd HH:mm:ss',$this->date);
        }

        public function  afterValidate() {
             parent::afterValidate();
             $this->dbDate();
        }

        public function bool2str($par)
        {
            if($this->$par)
            {
                return 'Да';
            }
            else
            {
                return 'Нет';
            }
            
        }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => '#',
			'question' => 'Отзыв',
			'answer' => 'Ответ',
			'name' => 'ФИО',
			'email' => 'E-mail',
			'phone' => 'Телефон',
			'is_answered' => 'Отвечен',
			'is_viewed' => 'Отобр.',
                        'date' => 'Дата пост.',
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

                $criteria->compare('date',$this->date,true);

		$criteria->compare('question',$this->question,true);

		$criteria->compare('answer',$this->answer,true);

		$criteria->compare('name',$this->name,true);

		$criteria->compare('email',$this->email,true);

		$criteria->compare('phone',$this->phone,true);

		$criteria->compare('is_answered',$this->is_answered);

		$criteria->compare('is_viewed',$this->is_viewed);

		return new CActiveDataProvider('Faq', array(
			'criteria'=>$criteria,
                        'pagination' => array(
                                                                      'pageSize' => 20,
                                                                  ),
		));
	}
}