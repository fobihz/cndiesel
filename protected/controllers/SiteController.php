<?php

class SiteController extends Controller
{
    public function actionIndex( $id )
    {
        $this->layout = 'main';

        if( $page = Page::model()->findByPk($id) )
        {
            $this->setPageTitle($page->title);
            $this->render('index',array('page' => $page));
        }
        else{
            throw new CHttpException(404);
        }
    }

    public function actionError()
    {
        $this->layout = 'main';
        if ($error = Yii::app()->errorHandler->error)
            $this->render('error', $error);

    }

}

