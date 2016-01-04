<?php

class PhotogalleryController extends Controller
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

	
        public function  actions() {
        
            return array('sort'=>'ext.CSortableGridView.Sort');
        }

	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		$this->render('view',array(
			'model'=>$this->loadModel(),
		));
	}

        public function actionSetisview()
        {
            if(Yii::app()->request->isPostRequest)
            {
			// we only allow deletion via POST request
			$model = Photogallery::model()->findByPk($_POST['item']);
                        $model->view = $_POST['checked'];
                        $model->save();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('index'));
	    }
	    else
		throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

        }

        public function actionSetisviewphoto()
        {
            if(Yii::app()->request->isPostRequest)
            {
			// we only allow deletion via POST request
			$model = Photo::model()->findByPk($_POST['item']);
                        $model->view = $_POST['checked'];
                        $model->save();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('index'));
	    }
	    else
		throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

        }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new Photogallery;
                $photo = new Photo('search');


                if(isset($_GET['Photo']))
                    $photo->attributes = $_GET['Photo'];
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Photogallery']))
		{
			$model->attributes=$_POST['Photogallery'];

                        $criteria = new CDbCriteria();
                        $criteria->order = 'pos DESC';
                        $criteria->limit = 1;
                        $lastModel = Photogallery::model()->find($criteria);
                        if(!empty($lastModel)) $model->pos = $lastModel->pos+1;
                        else $model->pos = 0;

			if($model->save())
                        {
                            if(isset($_POST['savebutton']))
                                $this->redirect($this->createUrl('index',array('msg'=>'[!] Фотогалерея успешно создана','msgtype'=>'success')));
                            else
                            {
                                $this->redirect($this->createUrl('update',array('id'=>$model->id,'msg'=>'[!] Фотогалерея успешно создана','msgtype'=>'success')));
                            }

                        }
			//	$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,'photo'=>$photo,
		));
	}

        public function actionAddphotos($phid)
        {
            $model = Photogallery::model()->findByPk($phid);

            if(isset($_POST['savebutton']))
            {
                  $criteria = new CDbCriteria();
                  $criteria->order = 'pos DESC';
                  $criteria->limit = 1;
                  $lastModel = Photo::model()->find($criteria);
                  if(!empty($lastModel)) $pos = $lastModel->pos+1;
                  else $pos = 0;

                    foreach($_POST['File'] as $file)
                    {
                       
                       
                       $photo = new Photo('search');
                       $photo->phid = $phid;
                       $photo->name = basename($file['name']);
                       $photo->view = 1;
                       $photo->pos = $pos;
                       $photo->save();

                       $img = Yii::app()->image->load($_SERVER['DOCUMENT_ROOT'].$file['name']);
                       $pname = 'photo_'.$photo->id.'_'.basename($file['name']);
                       $img->save($_SERVER['DOCUMENT_ROOT'].'/userfiles/original/'.$pname);
                       $img->resize(600, 600);
                       $img->save($_SERVER['DOCUMENT_ROOT'].'/userfiles/large/'.$pname);
                       $img->resize(200, 200);
                       $img->save($_SERVER['DOCUMENT_ROOT'].'/userfiles/medium/'.$pname);
                       $img->resize(100, 100);
                       $img->save($_SERVER['DOCUMENT_ROOT'].'/userfiles/small/'.$pname);

                       $photo->name = $pname;
                       $photo->save();
                       @unlink($_SERVER['DOCUMENT_ROOT'].$file['name']);
                       $pos = $pos + 1;

                    }
                    $this->redirect($this->createUrl('update',array('id'=>$model->id,'msg'=>'[!] Фото добавлены','msgtype'=>'success')));

            }

            $this->render('addphotos',array('model'=>$model,'photo'=>$photo));
        }

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();

                $photo = new Photo('search');


                if(isset($_GET['Photo']))
                    $photo->attributes = $_GET['Photo'];

                $photo->phid = $model->id;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Photogallery']))
		{
			$model->attributes=$_POST['Photogallery'];
			if($model->save())
			{
                            if(isset($_POST['savebutton']))
                                $this->redirect($this->createUrl('index',array('msg'=>'[!] Фотогалерея успешно создана','msgtype'=>'success')));
                            else
                            {
                                $this->redirect($this->createUrl('update',array('id'=>$model->id,'msg'=>'[!] Фотогалерея успешно создана','msgtype'=>'success')));
                            }

                        }
		}

		$this->render('update',array(
			'model'=>$model,'photo'=>$photo
		));
	}

        public function actionUpdatephoto($id,$phid)
	{
                $model = Photogallery::model()->findByPk($phid);
		$photo = Photo::model()->findByPk($id);

  		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($photo);

		if(isset($_POST['Photo']))
		{
			$photo->attributes=$_POST['Photo'];
			if($photo->save())
			{
                            if(isset($_POST['savebutton']))

                                $this->redirect($this->createUrl('update',array('id'=>$phid,'msg'=>'[!] Фото успешно обновлено','msgtype'=>'success')));
                            else
                            {
                                $this->redirect($this->createUrl('updatephoto',array('id'=>$id,'phid'=>$phid,'msg'=>'[!] Фото успешно обновлено','msgtype'=>'success')));
                            }

                        }
		}

		$this->render('updatephoto',array(
			'model'=>$model,'photo'=>$photo
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

			$model = Photogallery::model()->with('photos')->findByPk($_GET['id']);
                        foreach($model->photos as $photo)
                        {
                            $pname = $photo->name;
                            @unlink($_SERVER['DOCUMENT_ROOT'].'/userfiles/original/'.$pname);
                            @unlink($_SERVER['DOCUMENT_ROOT'].'/userfiles/large/'.$pname);
                            @unlink($_SERVER['DOCUMENT_ROOT'].'/userfiles/medium/'.$pname);
                            @unlink($_SERVER['DOCUMENT_ROOT'].'/userfiles/small/'.$pname);
                        }
                        $model->delete();


			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

        public function actionDeletephoto($id,$phid)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$photo = Photo::model()->findByPk($id);
                        
                        $pname = $photo->name;
                        @unlink($_SERVER['DOCUMENT_ROOT'].'/userfiles/original/'.$pname);
                        @unlink($_SERVER['DOCUMENT_ROOT'].'/userfiles/large/'.$pname);
                        @unlink($_SERVER['DOCUMENT_ROOT'].'/userfiles/medium/'.$pname);
                        @unlink($_SERVER['DOCUMENT_ROOT'].'/userfiles/small/'.$pname);
                        $photo->delete();
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect($this->createUrl('update',array('id'=>$phid)));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		//$dataProvider=new CActiveDataProvider('Photogallery');
                $model = new Photogallery('search');

                if(isset($_GET['Photogallery']))
                    $model->attributes = $_GET['Photogallery'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

       
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Photogallery('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Photogallery']))
			$model->attributes=$_GET['Photogallery'];

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
				$this->_model=Photogallery::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']))
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
