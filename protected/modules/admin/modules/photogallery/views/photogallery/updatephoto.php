<?php
$this->breadcrumbs=array(
	'Фотогалереи'=>array('index'),
	'Фотографии галереи: '.$model->name=>array('photogallery/update','id'=>$model->id),
        ''
);


?>

<h1>Редактирование фото</h1>

<?
if(!empty($_GET['msg']))
{
    echo '<br/><br/>';
    $this->renderPartial('application.modules.admin.views.msg',array('msg'=>$_GET['msg'],'msgtype'=>$_GET['msgtype']));
}
?>

<?php echo $this->renderPartial('_formphoto', array('model'=>$photo)); ?>