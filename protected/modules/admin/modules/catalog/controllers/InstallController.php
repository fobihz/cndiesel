<?php

class InstallController extends Controller
{

        protected function performAjaxValidation($model)
        {
            if(isset($_POST['ajax']) )
            {
                echo CActiveForm::validate($model);
                Yii::app()->end();
                //exit;
            }
        }

        public function actionIndex()
	{
            $roots=Stre::model()->roots()->findAll();
            $types = Type::model()->findAll();
            $attrs = Attr::model()->findAll(array('order'=>'type_id,pos'));
            $this->render('index',array('roots'=>$roots,'types'=>$types,'attrs'=>$attrs));

	}
        
	public function actionAddattrgr($id=null)
	{
            if(isset($id))
            {
                $attr_gr = Type::model()->findByPk($id);
                if(empty($attr_gr))
                    $this->redirect($this->createUrl('install/index',array('msg'=>'[!] Ошибка: нет такой группы атрибутов','msgtype'=>'error')));
                
            }
            else
                $attr_gr = new Type();

            
            $this->performAjaxValidation($attr_gr);
            if(!empty($_POST['Type']))
            {
                $attr_gr->name = $_POST['Type']['name'];
                $attr_gr->save();
                $this->redirect($this->createUrl('install/index',array('msg'=>'[!] Группа аттрибутов успешно создана или обновлена','msgtype'=>'success')));
            }
            $this->render('addattrgr',array('attr_gr'=>$attr_gr));
        }

        public function actionDeleteattrgr($id)
        {
            $gr = Type::model()->findByPk($id);
            if(!empty($gr))
            {
                try{
                    $gr->delete();
                }
                catch(CDbException $e){

                    $this->redirect($this->createUrl('install/index',array('msg'=>$e->getMessage(),'msgtype'=>'error')));
                }
                $this->redirect($this->createUrl('install/index',array('msg'=>'[!] Группа аттрибутов успешно удалена','msgtype'=>'success')));
            }
            else
                $this->redirect($this->createUrl('install/index',array('msg'=>'[!] Ошибка: нет такой группы атрибутов','msgtype'=>'error')));
        }

        public function actionAddattr($id=null)
        {
            if(isset($id))
            {
                $attr = Attr::model()->findByPk($id);
                if(empty($attr))
                    $this->redirect($this->createUrl('install/index',array('msg'=>'[!] Ошибка: нет такого атрибута','msgtype'=>'error')));

            }
            else
                $attr = new Attr();
            
            $this->performAjaxValidation($attr);
            if(!empty($_POST['Attr']))
            {
                $attr->attributes = $_POST['Attr'];
                $attr->save();
                $this->redirect($this->createUrl('install/index',array('msg'=>'[!] Аттрибут успешно создан или обновлен','msgtype'=>'success')));
            }
            $this->render('addattr',array('attr'=>$attr));


        }

         public function actionAttrpos($id)
        {
            $attr = Attr::model()->findByPk($id);
            $this->performAjaxValidation($attr);
            if(!empty($_POST['Attr']))
            {
                $attr->pos = $_POST['Attr']['pos'];
                $attr->save();
                $this->redirect($this->createUrl('install/index',array('msg'=>'[!] Позиция аттрибута успешно изменена','msgtype'=>'success')));
            }
            $this->redirect($this->createUrl('install/index',array('msg'=>'[!] Не удалось изменить позицию атрибута','msgtype'=>'error')));
            //$this->render('addattr',array('attr'=>$attr));


        }

        public function actionDeleteattr($id)
        {
            $gr = Attr::model()->findByPk($id);
            if(!empty($gr))
            {
                /*
                $attr_vals = AttrVal::model()->findAll(array('condition'=>'attr_id=:attr_id','params'=>array(':attr_id'=>$id)));
                foreach($attr_vals as $attr_val)
                {
                    $attr_val->delete();
                }*/
                  try{
                    $gr->delete();
                }
                catch(CDbException $e){

                    $this->redirect($this->createUrl('install/index',array('msg'=>$e->getMessage(),'msgtype'=>'error')));
                }

                $this->redirect($this->createUrl('install/index',array('msg'=>'[!] Атрибут успешно удален','msgtype'=>'success')));
            }
            else
                $this->redirect($this->createUrl('install/index',array('msg'=>'[!] Ошибка: нет такого атрибута','msgtype'=>'error')));
        }


        public function actionAddcatalog($id=null)
        {
            if(isset($id))
            {
                $root = Stre::model()->roots()->findByPk($id);
                if(empty($root))
                    $this->redirect($this->createUrl('install/index',array('msg'=>'[!] Ошибка: нет такого каталога','msgtype'=>'error')));
                $old_type_id = $root->type_id;
            }
            else
                $root = new Stre();

            $this->performAjaxValidation($root);
            if(!empty($_POST['Stre']))
            {
                $root->attributes = $_POST['Stre'];
                $new_type_id = $root->type_id;
                try{
                    $root->saveNode();
                    if( $new_type_id != $old_type_id )
                    {
                        $criteria = new CDbCriteria();
                        $criteria->condition = 'id_elem=:id_elem';
                        $criteria->params = array(':id_elem'=>$root->id);
                        AttrVal::model()->deleteAll($criteria);
                    }
                }
                catch(CDbException $e){

                    $this->redirect($this->createUrl('install/index',array('msg'=>$e->getMessage(),'msgtype'=>'error')));
                }


                $this->redirect($this->createUrl('install/index',array('msg'=>'[!] Каталог успешно создана или обновлена','msgtype'=>'success')));
            }
            $this->render('addcatalog',array('root'=>$root));
            
        }

        public function actionDeletecatalog($id)
        {
            $root = Stre::model()->roots()->findByPk($id);
            if(!empty($root))
            {
                $root->deleteNode();
                $this->redirect($this->createUrl('install/index',array('msg'=>'[!] Каталог успешно удален','msgtype'=>'success')));
            }
            else
            {
                $this->redirect($this->createUrl('install/index',array('msg'=>'[!] Ошибка: нет такого каталога','msgtype'=>'error')));
            }

        }

	// -----------------------------------------------------------
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}