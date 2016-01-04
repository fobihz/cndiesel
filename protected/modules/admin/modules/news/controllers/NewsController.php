<?php

class NewsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;


	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		$this->render('view',array(
			'model'=>$this->loadModel(),
		));
	}

        public function actions()
        {
            return array(
                //'create' => 'ext.QTreeGridView.actions.Create',
                //'update' => 'ext.QTreeGridView.actions.Update',
                'check' => 'ext.phaActiveColumn.Check',

                //'makeRoot' => 'ext.QTreeGridView.actions.MakeRoot',
            );
        }


	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new News;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['News']))
		{
			$model->attributes=$_POST['News'];
			if($model->save())
			{
                            
                            if(!empty($model->img) )
                            {
                                $photo = $model->img;

                                $img = Yii::app()->image->load($_SERVER['DOCUMENT_ROOT'].'/userfiles/editor/images/'.$photo);

                                $pname = 'news_'.$model->id.'_'.$photo;
                                $img->save($_SERVER['DOCUMENT_ROOT'].'/userfiles/original/'.$pname);
                                $img->resize(600, 600);
                                $img->save($_SERVER['DOCUMENT_ROOT'].'/userfiles/large/'.$pname);
                                $img->resize(200, 200);
                                $img->save($_SERVER['DOCUMENT_ROOT'].'/userfiles/medium/'.$pname);
                                $img->resize(100, 100);
                                $img->save($_SERVER['DOCUMENT_ROOT'].'/userfiles/small/'.$pname);

                                $model->img = $pname;
                                $model->update();
                            }


                            if(isset($_POST['savebutton']))
                                $this->redirect($this->createUrl('index',array('News_page'=>$_GET['News_page'],'msg'=>'[!] Новость успешно создана','msgtype'=>'success')));
                            else
                            {
                                $this->redirect($this->createUrl('update',array('id'=>$model->id,'msg'=>'[!] Новость успешно создана','msgtype'=>'success')));
                            }
                        }
                        else
                            $model->date = $model->viewDate();


		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();
                $model->date = $model->viewDate();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['News']))
		{
                        $old_value = $model->img;
                        $new_value = $_POST['News']['img'];

			$model->attributes=$_POST['News'];
			if($model->save())
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
                                    $photo = $model->img;
                                    $img = Yii::app()->image->load($_SERVER['DOCUMENT_ROOT'].'/userfiles/editor/images/'.$photo);

                                    $pname = 'news_'.$model->id.'_'.$photo;
                                    $img->save($_SERVER['DOCUMENT_ROOT'].'/userfiles/original/'.$pname);
                                    $img->resize(600, 600);
                                    $img->save($_SERVER['DOCUMENT_ROOT'].'/userfiles/large/'.$pname);
                                    $img->resize(200, 200);
                                    $img->save($_SERVER['DOCUMENT_ROOT'].'/userfiles/medium/'.$pname);
                                    $img->resize(100, 100);
                                    $img->save($_SERVER['DOCUMENT_ROOT'].'/userfiles/small/'.$pname);

                                    $model->img = $pname;
                                }
                                else
                                {

                                   $model->img = $new_value;
                                }
                                $model->update();


				if(isset($_POST['savebutton']))
                                $this->redirect($this->createUrl('index',array('News_page'=>$_GET['News_page'],'msg'=>'[!] Новость успешно обновлена','msgtype'=>'success')));
                                else
                                {
                                    $this->redirect($this->createUrl('update',array('id'=>$model->id,'msg'=>'[!] Новость успешно обновлена','msgtype'=>'success')));
                                }
                        }
                        else{
                            $model->date = $model->viewDate();
                        }
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$model = $this->loadModel();

                        if(!empty($model->img))
                        {
                            $old_value = $model->img;
                            @unlink($_SERVER['DOCUMENT_ROOT'].'/userfiles/original/'.$old_value);
                            @unlink($_SERVER['DOCUMENT_ROOT'].'/userfiles/large/'.$old_value);
                            @unlink($_SERVER['DOCUMENT_ROOT'].'/userfiles/medium/'.$old_value);
                            @unlink($_SERVER['DOCUMENT_ROOT'].'/userfiles/small/'.$old_value);
                        }
                        $model->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
            $model = new News('search');

            if(isset($_GET['News']))
            {
                $model->attributes = $_GET['News'];
            }


            $this->render('index',array(
		'model'=>$model,
            ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new News('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['News']))
			$model->attributes=$_GET['News'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=News::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='news-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
