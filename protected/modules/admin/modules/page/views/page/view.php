<?php
$this->breadcrumbs=array(
	'Сртаничные разделы сайта'=>array('index'),
	'',
);


?>

<h1>Просмотр страницы: <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'keywords',
		'description',
		'name',
		array('name'=>'text','type'=>'html'),
	),
)); ?>
