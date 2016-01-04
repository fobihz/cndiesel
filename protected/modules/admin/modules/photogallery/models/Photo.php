<?php

/**
 * This is the model class for table "phg_photo".
 *
 * The followings are the available columns in table 'phg_photo':
 * @property string $id
 * @property string $phid
 * @property string $title
 * @property integer $pos
 * @property integer $view
 */
class Photo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Photo the static model class
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
		return 'phg_photo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('phid, name, view', 'required'),
			array('view', 'numerical', 'integerOnly'=>true),
			array('phid', 'length', 'max'=>10),
                        array('pos, title', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, phid, title, pos, view', 'safe', 'on'=>'search'),
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
			'phg' => array(self::BELONGS_TO, 'Photogallery', 'phid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => '#',
			'phid' => 'Фотогалерея',
                        'name' => 'Фото',
			'title' => 'Подпись',
			'pos' => 'Позиция',
			'view' => 'Отобр.',
		);
	}
        public function view2str()
        {
            if($this->view) return 'Да';
            else return 'Нет';
        }

        

        public function name2img()
        {
            return "<a class='fancybox' title='".htmlentities($this->title, ENT_QUOTES,'UTF-8')."' href='/userfiles/large/".$this->name."' target='_blank' ><img style='border:1px solid #bbb;' height='40' src='/userfiles/small/".$this->name."'></a>";
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

		$criteria->compare('phid',$this->phid,true);

		$criteria->compare('title',$this->title,true);

		$criteria->compare('pos',$this->pos);

		$criteria->compare('view',$this->view);
                $criteria->order = 'pos';

		return new CActiveDataProvider('Photo', array(
			'criteria'=>$criteria,
                        'pagination' => array(
                                                                      'pageSize' => 100000,
                                                                  ),
		));
	}
}