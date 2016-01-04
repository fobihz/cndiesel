<?php
$this->breadcrumbs=array(
	'Страничные разделы сайта'=>array('index'),
	'',
);

?>

<h1>Создание страницы</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>