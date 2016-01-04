<?php

/**
 * This is the model class for table "News".
 *
 * The followings are the available columns in table 'News':
 * @property string $id
 * @property string $keywords
 * @property string $description
 * @property string $htitle
 * @property string $date
 * @property string $title
 * @property string $shorttext
 * @property string $fulltext
 * @property string $img
 * @property integer $view
 */
class News extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return News the static model class
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
		return 'news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date, title, fulltext, view', 'required'),
                        array('keywords, description, htitle, img, shorttext', 'safe'),
                        array('date', 'type','type'=>'datetime','datetimeFormat'=>'dd.MM.yyyy HH:mm:ss','message'=>'{attribute} неверный формат'),
			array('view', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, keywords, description, htitle, date, title, shorttext, fulltext, img, view', 'safe', 'on'=>'search'),
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
			'keywords' => 'Кл. слова',
			'description' => 'Описание',
			'htitle' => 'Заголовок',
			'date' => 'Дата',
			'title' => 'Заголовок новости',
			'shorttext' => 'Кратко',
			'fulltext' => 'Текст',
			'img' => 'Изображение',
			'view' => 'Отобр.',
		);
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

        public function viewImg()
        {
            if(!empty($this->img))
                return "<a class='fancybox' href='/userfiles/large/".$this->img."'><img src='/userfiles/small/".$this->img."' /></a>";

            return '-';
        }

        public function viewDate()
        {
            $formater = new CDateFormatter(Yii::app()->locale);
            return $formater->format('dd.MM.yyyy HH:mm:ss',$this->date);
        }

        public function viewSDate()
        {
            $formater = new CDateFormatter(Yii::app()->locale);
            return $formater->format('dd.MM.yyyy',$this->date);
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

		$criteria->compare('keywords',$this->keywords,true);

		$criteria->compare('description',$this->description,true);

		$criteria->compare('htitle',$this->htitle,true);

		$criteria->compare('date',$this->date,true);

		$criteria->compare('title',$this->title,true);

		$criteria->compare('shorttext',$this->shorttext,true);

		$criteria->compare('fulltext',$this->fulltext,true);

		$criteria->compare('img',$this->img,true);

		$criteria->compare('view',$this->view);

		return new CActiveDataProvider('News', array(
			'criteria'=>$criteria,
                        'pagination' => array(
                                                                      'pageSize' => 20,
                                                                  ),
                        'sort'=>array(
                                'defaultOrder' =>'date DESC',
                        ),
		));
	}
}