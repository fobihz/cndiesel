<?php

class DefaultController extends Controller
{


        public function actions()
        {
            return array(
                //'create' => 'ext.QTreeGridView.actions.Create',
                //'update' => 'ext.QTreeGridView.actions.Update',
                'delete' => 'ext.QTreeGridView.actions.Delete',
                'moveNode' => 'ext.QTreeGridView.actions.MoveNode',
                //'makeRoot' => 'ext.QTreeGridView.actions.MakeRoot',
            );
        }

        public $CQtreeGreedView  = array (
            'modelClassName' => 'Stre', //название класса
            'adminAction' => 'viewcatalog' //action, где выводится QTreeGridView. Сюда будет идти редирект с других действий.
        );

        protected function performAjaxValidation($model)
        {
            if(isset($_POST['ajax']) )
            {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
        }

        public function actionSetisview()
        {
            if(Yii::app()->request->isPostRequest)
            {
			// we only allow deletion via POST request
			$model = Stre::model()->findByPk($_POST['item']);
                        $model->view = $_POST['checked'];
                        $model->saveNode();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('index'));
	    }
	    else
		throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

        }

        public function actionTranslit($str)
        {

            if(Yii::app()->request->isAjaxRequest)
            {
                $url = Url::str2url($_GET['str']);
                echo $url;
            }
            else
                throw new CHttpException (404);
        }

        public function actionChangenumonpage($pid)
        {
            if(isset($_POST['numonpage']))
            {
                $cookie = new CHttpCookie('cat_num_on_page', $_POST['numonpage']);
                $cookie->expire = time()+86400;
                Yii::app()->request->cookies['cat_num_on_page'] = $cookie;
                $this->redirect($this->createUrl('default/viewcatalog',array('id'=>$pid,'msg'=>'[!] Количество элементов на странице успешно изменено','msgtype'=>'success')));
            }
            else
                $this->redirect($this->createUrl('default/viewcatalog',array('id'=>$pid,'msg'=>'[!] Ошибка: невозможно изменить количество элементов на странице!','msgtype'=>'error')));

        }

	public function actionIndex()
	{
            $roots=Stre::model()->roots()->findAll();
            $this->render('index',array('roots'=>$roots));
        }

        public function actionViewcatalog($id,$Stre_page=1)
        {

           $model = new Stre('search');
           $model->root = $id;
           //$model->type_id = $root->type_id;

           if(isset($_GET['Stre']))
              $model->attributes = $_GET['Stre'];

           $this->render('viewcatalog', array(
                                                'model' => $model,
                                                'id'=>$id,
                                                'Stre_page'=>$Stre_page
                                             ));
       }

        public function actionAdditem($pid,$Stre_page=1)
        {

            $cs = Yii::app()->clientScript;
            $cs->registerScriptFile("/js/admin/url.js");

            $model = new Stre();
            $model->type_id = isset($_POST['Stre']['type_id']) ? $_POST['Stre']['type_id'] : null;
            $root = Stre::model()->roots()->findByPk($pid);

            $this->performAjaxValidation($model);

            if(!empty($_POST['Stre']['name']))
            {
                //print_r($_POST['AttrVal'][18]);
                //exit();

                $model->attributes = $_POST['Stre'];
                $parent = Stre::model()->findByPk($_POST['Stre']['root']);
                try{
                    $model->appendTo($parent);
                    $attrs = $model->type->attrs;

                    foreach( $attrs as $attr)
                    {

                        $attr_val = new AttrVal();
                        $attr_val->id_attr = $attr->id;
                        $attr_val->id_elem = $model->id;
                        $attr_val->value = $_POST['AttrVal'][$attr->id];


                        if( $attr->fk > 0 )
                        {
                                if(!empty($attr_val->value))
                                    $attr_val->value = implode(',',$_POST['AttrVal'][$attr->id]);
                                else
                                    $attr_val->value = '';

                        }

                        if($attr->mytype->mytype == 'photo' && !empty($_POST['AttrVal'][$attr->id]) )
                        {
                            $photo = $_POST['AttrVal'][$attr->id];

                            $img = Yii::app()->image->load($_SERVER['DOCUMENT_ROOT'].'/userfiles/editor/images/'.$photo);

                            $pname = 'catalog_'.$model->id.'_'.$photo;
                            $img->save($_SERVER['DOCUMENT_ROOT'].'/userfiles/original/'.$pname);
                            $img->resize(600, 600);
                            $img->save($_SERVER['DOCUMENT_ROOT'].'/userfiles/large/'.$pname);
                            $img->resize(200, 200);
                            $img->save($_SERVER['DOCUMENT_ROOT'].'/userfiles/medium/'.$pname);
                            $img->resize(100, 100);
                            $img->save($_SERVER['DOCUMENT_ROOT'].'/userfiles/small/'.$pname);

                            $attr_val->value = $pname;
                        }

                        $attr_val->save();
                    }

                }
                catch(CDbException $e){

                    $this->redirect($this->createUrl('default/viewcatalog',array('id'=>$pid,'Stre_page'=>$Stre_page,'msg'=>$e->getMessage(),'msgtype'=>'error')));
                }
                if(isset($_POST['savebutton']))
                    $this->redirect($this->createUrl('default/viewcatalog',array('id'=>$pid,'Stre_page'=>$Stre_page,'msg'=>'[!] Элемент успешно создан','msgtype'=>'success')));
                else
                {
                    $this->redirect($this->createUrl('default/update',array('id'=>$model->id,'pid'=>$pid,'Stre_page'=>$Stre_page,'msg'=>'[!] Элемент успешно создан','msgtype'=>'success')));
                }

            }
            $this->render('additem',array('root'=>$root,'model'=>$model,'pid'=>$pid,'Stre_page'=>$Stre_page));

        }

        public function actionUpdate($pid,$id,$Stre_page=1)
        {

            $cs = Yii::app()->clientScript;
            $cs->registerScriptFile("/js/admin/url.js");

            $model = Stre::model()->findByPk($id);
            $root = Stre::model()->roots()->findByPk($pid);
            if(empty($model) || empty($root))
                $this->redirect($this->createUrl('default/viewcatalog',array('id'=>$pid,'Stre_page'=>$Stre_page,'msg'=>'[!] Не существует такого элемента!','msgtype'=>'error')));

            $this->performAjaxValidation($model);

            if(!empty($_POST['Stre']['name']))
            {

                $model->name = $_POST['Stre']['name'];
                $model->alias = $_POST['Stre']['alias'];

                $old_view = $model->view;
                $new_view = $_POST['Stre']['view'];
                $model->view = $_POST['Stre']['view'];

                $model->title = $_POST['Stre']['title'];
                $model->keywords = $_POST['Stre']['keywords'];
                $model->description = $_POST['Stre']['description'];

                try{
                    $model->saveNode();
                    if($old_view!=$new_view)
                    {
                        foreach($model->descendants()->findAll() as $des )
                        {
                            $des->view = $new_view;
                            $des->saveNode();
                        }
                    }

                    foreach($model->type->attrs as $attr)
                    {
                        unset($attr_val);
                        $attr_val = AttrVal::model()->findByPk(array('id_attr'=>$attr->id,'id_elem'=>$model->id));
                        if(empty($attr_val))
                        {
                            $attr_val = new AttrVal();
                            $attr_val->id_attr = $attr->id;
                            $attr_val->id_elem = $model->id;
                        }

                        $old_value = $attr_val->value;
                        $new_value = $_POST['AttrVal'][$attr->id];

                        if($attr->mytype->mytype == 'photo' )
                        {
                            if( $old_value !='' && $old_value != $new_value)
                            {
                                   @unlink($_SERVER['DOCUMENT_ROOT'].'/userfiles/original/'.$old_value);
                                   @unlink($_SERVER['DOCUMENT_ROOT'].'/userfiles/large/'.$old_value);
                                   @unlink($_SERVER['DOCUMENT_ROOT'].'/userfiles/medium/'.$old_value);
                                   @unlink($_SERVER['DOCUMENT_ROOT'].'/userfiles/small/'.$old_value);
                            }

                            if( $new_value !='' && $old_value != $new_value)
                            {
                                $photo = $_POST['AttrVal'][$attr->id];
                                $img = Yii::app()->image->load($_SERVER['DOCUMENT_ROOT'].'/userfiles/editor/images/'.$photo);

                                $pname = 'catalog_'.$model->id.'_'.$photo;
                                $img->save($_SERVER['DOCUMENT_ROOT'].'/userfiles/original/'.$pname);
                                $img->resize(600, 600);
                                $img->save($_SERVER['DOCUMENT_ROOT'].'/userfiles/large/'.$pname);
                                $img->resize(200, 200);
                                $img->save($_SERVER['DOCUMENT_ROOT'].'/userfiles/medium/'.$pname);
                                $img->resize(100, 100);
                                $img->save($_SERVER['DOCUMENT_ROOT'].'/userfiles/small/'.$pname);

                                $attr_val->value = $pname;
                            }
                            else
                            {

                               $attr_val->value = $new_value;
                            }
                        }
                        else
                        {
                            $attr_val->value = $_POST['AttrVal'][$attr->id];
                            if( $attr->fk > 0 )
                            {
                                if(!empty($attr_val->value))
                                    $attr_val->value = implode(',',$_POST['AttrVal'][$attr->id]);
                                else
                                    $attr_val->value = '';
                            }
                        }

                        if($attr_val->isNewRecord)
                            $attr_val->insert();
                        else
                            $attr_val->update();
                    }

                }
                catch(CDbException $e){

                    $this->redirect($this->createUrl('default/viewcatalog',array('id'=>$pid,'Stre_page'=>$Stre_page,'msg'=>$e->getMessage(),'msgtype'=>'error')));
                }
                if(isset($_POST['savebutton']))
                    $this->redirect($this->createUrl('default/viewcatalog',array('id'=>$pid,'Stre_page'=>$Stre_page,'msg'=>'[!] Элемент успешно обновлен','msgtype'=>'success')));
                else
                {
                    $this->redirect($this->createUrl('default/update',array('id'=>$model->id,'pid'=>$pid,'Stre_page'=>$Stre_page,'msg'=>'[!] Элемент успешно обновлен','msgtype'=>'success')));
                }
            }
            $this->render('update',array('root'=>$root,'model'=>$model,'pid'=>$pid,'Stre_page'=>$Stre_page));

        }


}