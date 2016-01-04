<?php
$this->breadcrumbs=array(
        'Каталоги'=>'/admin/catalog/',
	'О центре'=>'/admin/catalog/default/viewcatalog/id/19',
	'Отзывы'=>array('index'),
	'',
);

?>

<h1>Создать отзыв</h1>

<?
if(!empty($_GET['msg']))
{
    echo '<br/><br/>';
    $this->renderPartial('application.modules.admin.views.msg',array('msg'=>$_GET['msg'],'msgtype'=>$_GET['msgtype']));
}
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>