<?php
$this->breadcrumbs=array(
	'E-mails'=>array('index'),
	'',
);

?>

<h1>Редактирование e-mail: <?php echo $model->email; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>