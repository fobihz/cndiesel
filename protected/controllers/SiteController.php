<?php

class SiteController extends Controller
{
    public $columns = 2;
    public $layout = 'main';

    public function actionIndex( $id ) {
        if( $page = Page::model()->findByPk($id) ) {
            $this->setPageTitle($page->title);
            $this->metakeys = $page->keywords;
            $this->metadescr = $page->description;
            $this->render('index',array('page' => $page));
        }
        else{
            throw new CHttpException(404);
        }
    }

    public function actionCatalog($alias, $p = 1 ) {
        $this->columns = 1;
        if( $page = Stre::model()->findByAttributes(array(
            'view' => 1,
            'alias' => $alias,
        ))) {
            $this->setPageTitle($page->title);
            $this->metakeys = $page->keywords;
            $this->metadescr = $page->description;
            $this->render('catalog', array('page' => $page, 'p' => $p));
        }
        else{
            throw new CHttpException(404);
        }
    }


    public function actionOrder() {
        $name    = Yii::app()->request->getParam('name');
        $phone   = Yii::app()->request->getParam('phone');
        $comment = Yii::app()->request->getParam('comment');
        header('Content-Type: application/json');
        if( $name && $phone ) {
            if(
                ($v1 = Yii::app()->session->get('verifyCode')) &&
                ($v2 = Yii::app()->request->getParam('verifyCode')) &&
                ($v1 == $v2)
            ) {
                $message = "Имя: " . $name . "\n";
                $message .= "Телефон: " . $phone . "\n";

                if ($comment) {
                    $message .= "Комментарий: \n" . $comment . "\n";
                }

                $headers = array();
                $headers[] = "MIME-Version: 1.0";
                $headers[] = "Content-type: text/plain; charset=UTF-8";
                $headers[] = "From: Cndiesel.ru <system@cndiesel.ru>";

                $email = Page::model()->findByAttributes(array('name' => 'Param: email для отправки заказов'));
                if( mail($email->text, 'Новый заказ на cndiesel.ru', $message, implode("\r\n", $headers)) ) {
                    echo json_encode(array(
                        'result' => 0,
                        'code' => 'ok',
                    ));
                } else {
                    echo json_encode(array(
                        'result' => 1,
                        'code' => 'send_mail_error',
                    ));
                }
            } else {
                echo json_encode(array(
                    'result' => 1,
                    'code' => 'captcha_error',
                ));
            }
        } else {
            echo json_encode(array(
                'result' => 1,
                'code' => 'invalid_args',
            ));
        }
    }

    public function actionForm() {
        $this->layout = 'clean';
        $this->setPageTitle('Форма заказа');
        $this->render('_order');
    }

    public function actionError() {
        if ($error = Yii::app()->errorHandler->error)
            $this->render('error', $error);

    }

}

