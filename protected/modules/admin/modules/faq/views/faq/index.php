<?php
$this->breadcrumbs=array(
        'Каталоги'=>'/admin/catalog/',
	'О центре'=>'/admin/catalog/default/viewcatalog/id/19',
	'',
);


?>
<?
Yii::import('ext.phaActiveColumn.*');
?>
<h1>Отзывы</h1>

<?
if(!empty($_GET['msg']))
{
    echo '<br/><br/>';
    $this->renderPartial('application.modules.admin.views.msg',array('msg'=>$_GET['msg'],'msgtype'=>$_GET['msgtype']));
}
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$model->search(),
	'filter' => $model,
        'pager'=>array('class'=>'CListPager'),

        'columns' => array(
                               array(
                                   'name'=>'id',
                                   'htmlOptions'=>array('width'=>'3%','align'=>'center'),
                                   'filter'=>false
                                   ),
                               array(
                                   'name'=>'date',
                                   'value'=>'$data->viewDate()',
                                   'htmlOptions'=>array('width'=>'120px','align'=>'center'),
                                   //'type'=>'datetime',
                                  


                                   ),
                               array(
                                   'name'=>'name',

                                   
                                   ),
                              array(
                                   'name'=>'question',
                                   'type'=>'html',
                                   //'value'=>'$data->preview()',
                                   'filter'=>false
                                   ),
                                /*array(
                                    'class' => 'phaCheckColumn',
                                    'name' => 'is_answered',
                                    'actionUrl' => array('isanswer'),
                                    'htmlOptions'=>array('width'=>'6%','align'=>'center'),
                                ),*/

                                array(
                                    'class' => 'phaCheckColumn',
                                    'name' => 'is_viewed',
                                    'actionUrl' => array('isview'),
                                    'htmlOptions'=>array('width'=>'6%','align'=>'center'),
                                ),


                               array(
                                   'class' => 'CButtonColumn',
                                   'template' => '{view}&nbsp;&nbsp;{update}&nbsp;&nbsp;{delete}',
                                   'updateButtonImageUrl' => '/css/admin/gridview/update.png',
                                   'updateButtonUrl' =>'Yii::app()->controller->createUrl("update",array("id"=>$data->primaryKey,"Faq_page"=>$_GET["Faq_page"]))',
                                   'deleteButtonImageUrl' => '/css/admin/gridview/delete.png',
                                   'viewButtonImageUrl' => '/css/admin/gridview/view.png',
                                    'htmlOptions'=>array('width'=>'90px'),
                               ),
                           ),
                           'template'=>'{items} {pager}',
)); ?>
<?$this->widget( 'application.extensions.EChosen.EChosen',array('target'=>'select','debug'=>true));?>