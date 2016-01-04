<?php
$this->breadcrumbs=array(
        'Каталоги'=>'/admin/catalog/',
	'О центре'=>'/admin/catalog/default/viewcatalog/id/19',
	'Отзывы'=>array('index'),
	'',
);


?>

<h1>Просмотр отзыва #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
                'name',
		//'email',
		//'phone',
		array('name'=>'question','type'=>'html'),
		//array('name'=>'answer','type'=>'html'),
                //array('name'=>'is_answered','value'=>$model->bool2str('is_answered')),
		array('name'=>'is_viewed','value'=>$model->bool2str('is_viewed')),
		
	),
)); ?>
