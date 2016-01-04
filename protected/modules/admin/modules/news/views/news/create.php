<?php
$this->breadcrumbs=array(
	'Новости'=>array('index'),
	'',
);


?>

<h1>Создание новости</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>