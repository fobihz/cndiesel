<?php
$this->breadcrumbs=array(
	'Новости'=>array('index'),
	
);


?>

<h1>Просмотр новости: <?php echo $model->title; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'keywords',
		'description',
		'htitle',
		
                array('name'=>'date','value'=>$model->viewDate()),
                array('name'=>'img','value'=>$model->viewImg(),'type'=>'html'),
		'title',
                array('name'=>'shorttext','type'=>'html'),
                array('name'=>'fulltext','type'=>'html'),
		array('name'=>'view','value'=>$model->bool2str('view')),
		
		
	),
)); ?>

<? $this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'a.fancybox',
    'config'=>array('transitionIn'=>'elastic',
                    'transitionOut'=>'elastic',
                    'speedIn'=>600,
                    'speedOut'=>200,
                    'overlayShow'=>true,
                    'overlayColor'=>'#ccc',
                    'opacity'=>true,

                   ),
    )
    );
?>
