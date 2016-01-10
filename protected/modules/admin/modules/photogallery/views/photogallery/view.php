<?php
$this->breadcrumbs=array(
        //'Каталоги'=>'/admin/catalog/',
	//'О центре'=>'/admin/catalog/default/viewcatalog/id/19',
	'Фотогалереи'=>array('index'),
	'',
);

?>

<h1>Просмотр фотогалереи: <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		array('name'=>'text','value'=>$model->text,'type'=>'html'),
                array('name'=>'photos','value'=>$model->preview('all'),'type'=>'html'),
		//'pos',
		array('name'=>'view','value'=>$model->view2str()),
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