<?php
$this->breadcrumbs=array(
	'E-mails'=>array('index'),
	'',
);


?>

<h1>Просмотр email: <?php echo $model->email; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'email',
		'used'=>array(
                                   'name'=>'used',
                                    'value'=>$model->used2str(),

                                   
                                   ),
	),
)); ?>
