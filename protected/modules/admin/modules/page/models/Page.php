<?php

/**
 * This is the model class for table "Page".
 *
 * The followings are the available columns in table 'Page':
 * @property string $id
 * @property string $title
 * @property string $keywords
 * @property string $description
 * @property string $name
 * @property string $text
 */
class Page extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Page the static model class
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
		return 'page';
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
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
                        array('id, title, keywords, description, text', 'safe'),
			array('id, title, keywords, description, name, text', 'safe', 'on'=>'search'),
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
			'title' => 'Заголовок',
			'keywords' => 'Ключевые слова',
			'description' => 'Описание',
			'name' => 'Наименование',
			'text' => 'Текст',
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

		$criteria->compare('title',$this->title,true);

		$criteria->compare('keywords',$this->keywords,true);

		$criteria->compare('description',$this->description,true);

		$criteria->compare('name',$this->name,true);

		$criteria->compare('text',$this->text,true);

		return new CActiveDataProvider('Page', array(
			'criteria'=>$criteria,
                        'pagination' => array(
                                                 'pageSize' => 1000,
                                             ),
		));
	}
}