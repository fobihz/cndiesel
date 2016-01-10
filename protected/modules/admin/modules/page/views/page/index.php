<?php
$this->breadcrumbs=array(
	'',
);


?>

<h1 class="nomargin">
    Страничные разделы сайта
     <span title="<?=Yii::t('qtip', '#9')?>" class="qtipm"  ><img src="/images/admin/help.png" height="16" alt="help"></span>
</h1>

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
                                   'htmlOptions'=>array('width'=>'2%'),
                                   'filter'=>false
                                   ),
                               array(
                                   'name'=>'name',
                                   
                                   //'filter'=>false
                                   ),


                               array(
                                   'class' => 'CButtonColumn',
                                   'template' => '{view}&nbsp;&nbsp;{update}',
                                   'updateButtonImageUrl' => '/css/admin/gridview/update.png',
                                   //'deleteButtonImageUrl' => '/css/admin/gridview/delete.png',
                                   'viewButtonImageUrl' => '/css/admin/gridview/view.png',
                                   'htmlOptions'=>array('width'=>'90px'),
                               ),
                           ),
                           'template'=>'{items} {pager}',
)); ?>


<?$this->widget( 'application.extensions.EChosen.EChosen',array('target'=>'select','debug'=>true));?>