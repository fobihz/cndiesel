<?php
$this->breadcrumbs=array(
	'Новости'=>array('index'),
	
	'',
);

?>

<h1>Обновление новости: <?php echo $model->title; ?></h1>
<?
if(!empty($_GET['msg']))
{
    
    $this->renderPartial('application.modules.admin.views.msg',array('msg'=>$_GET['msg'],'msgtype'=>$_GET['msgtype']));
}
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>