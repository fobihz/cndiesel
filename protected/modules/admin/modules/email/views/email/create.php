<?php
$this->breadcrumbs=array(
	'E-mails'=>array('index'),
	'',
);

?>

<h1>Добавление e-mail</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>