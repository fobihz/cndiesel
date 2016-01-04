<?php

class FaqController extends Controller
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Faq;

		// Uncomment the following line if AJAX validation is needed
		//$this->performAjaxValidation($model);

		if(isset($_POST['Faq']))
		{
			$model->attributes=$_POST['Faq'];
                       
                        
			if($model->save())
                        {
                            if(isset($_POST['savebutton']))
                                $this->redirect($this->createUrl('index',array('msg'=>'[!] Вопрос-ответ успешно создан','msgtype'=>'success')));
                            else
                            {
                                $this->redirect($this->createUrl('update',array('id'=>$model->id,'msg'=>'[!] Вопрос-ответ успешно создан','msgtype'=>'success')));
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

		if(isset($_POST['Faq']))
		{
			$model->attributes=$_POST['Faq'];
			if($model->save())
                        {
                            if(isset($_POST['savebutton']))
                                $this->redirect($this->createUrl('index',array('msg'=>'[!] Вопрос-ответ успешно обновлен','msgtype'=>'success','Faq_page'=>$_GET['Faq_page'])));
                            else
                            {
                                if(isset($_POST['applybutton']))
                                    $this->redirect($this->createUrl('update',array('id'=>$model->id,'msg'=>'[!] Вопрос-ответ успешно обновлен','msgtype'=>'success')));
                                else
                                {
                                    $model->is_answered = 1;
                                    $model->update();

                                    $body = '<p><b>Вопрос:</b></p>';
                                    $body .= '<p>'.$model->question.'</p>';
                                    $body .= '<p><b>Ответ:</b></p>';
                                    $body .= '<p>'.$model->answer.'</p>';

                                    $mailer = new SwiftMailer();
                                    $mailer->sendHtmlMail(array('noreply@'.Yii::app()->params['domain']=>Yii::app()->params['company']), $model->email, 'Ответ на Ваш вопрос на сайте '.Yii::app()->params['domain'], $body, $attachments = array());
                                    $this->redirect($this->createUrl('update',array('id'=>$model->id,'msg'=>'[!] Вопрос-ответ успешно обновлен и ответ на вопрос отправлен на почту '.$model->email,'msgtype'=>'success')));
                                }
                            }
                        }
                        else
                            $model->date = $model->viewDate();
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
			$this->loadModel()->delete();

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
		//$dataProvider=new CActiveDataProvider('Faq');
                $model = new Faq('search');
                if(isset($_GET['Faq']))
                    $model->attributes = $_GET['Faq'];
		$this->render('index',array(
			'model'=>$model,
		));
	}

        public function actionIsview()
        {
            
           
            if(Yii::app()->request->isPostRequest)
            {
			// we only allow deletion via POST request
			$model = Faq::model()->findByPk($_POST['item']);
                        $model->is_viewed =$_POST['checked'];
                        $model->update();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('index'));
                        
	    }
	    else
		throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
                
        }
         public function actionIsanswer()
        {
            if(Yii::app()->request->isPostRequest)
            {
			// we only allow deletion via POST request
			$model = Faq::model()->findByPk($_POST['item']);
                        $model->is_answered = $_POST['checked'];
                        $model->update();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('index'));
	    }
	    else
		throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

        }

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Faq('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Faq']))
			$model->attributes=$_GET['Faq'];

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
				$this->_model=Faq::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='faq-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
