<?php
$this->breadcrumbs=array(
	'Страничные разделы сайта'=>array('index'),
	'',
	
);


?>

<h1>Обновление страницы: <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>