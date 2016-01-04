<?php
$this->breadcrumbs=array(
        'Каталоги'=>'/admin/catalog/',
	'О центре'=>'/admin/catalog/default/viewcatalog/id/19',
        ''
);


?>

<table width="99%">
    <tr>
        <td valign="top">
            <h1 class="nomargin">
    Фотогалереи
    <span title="<?=Yii::t('qtip', '#11')?>" class="qtipm"  ><img src="/images/admin/help.png" height="16" alt="help"></span>
</h1>

<?
if(!empty($_GET['msg']))
{
    echo '<br/><br/>';
    $this->renderPartial('application.modules.admin.views.msg',array('msg'=>$_GET['msg'],'msgtype'=>$_GET['msgtype']));
}
?>
<?
Yii::import('ext.phaActiveColumn.*');
?>
<?php $this->widget('ext.CSortableGridView.CSortableGridView', array(
      
        'dataProvider'=>$model->search(),
	'filter' => $model,
        'pager'=>array('class'=>'CListPager'),
        'cssFile'=>'/css/admin/gridview/styles.css',
        'columns' => array(
                               array(
                                   'name'=>'id',
                                   'htmlOptions'=>array('width'=>'3%','align'=>'center'),
                                   'filter'=>false
                                   ),
                               array(
                                   'name'=>'name',                                   
                                   ),


                              /* array(
                                   'name'=>'view',
                                   'value'=>'$data->view2str()',
                                   'htmlOptions'=>array('width'=>'3%'),
                                   'filter'=>false

                                   ),
                               */
                               array(
                                    'class' => 'phaCheckColumn',
                                    'name' => 'view',
                                    'actionUrl' => array('setisview'),
                                    'htmlOptions'=>array('width'=>'6%','align'=>'center'),
                                ),
                               array(
                                   'name'=>'Кол-во фото',
                                   'type'=>'html',
                                   'value'=>'$data->number()',
                                   'htmlOptions'=>array('width'=>'4%','align'=>'center'),
                                   'filter'=>false
                               ),

                               array(
                                   'name'=>'Предпросмотр',
                                   'type'=>'html',
                                   'value'=>'$data->preview()',
                                   'filter'=>false
                                   ),

                              array(
                                   'class' => 'CButtonColumn',
                                   'template' => '{view}&nbsp;&nbsp;{update}&nbsp;&nbsp;{delete}',
                                   'updateButtonImageUrl' => '/css/admin/gridview/update.png',
                                   'deleteButtonImageUrl' => '/css/admin/gridview/delete.png',
                                   'viewButtonImageUrl' => '/css/admin/gridview/view.png',
                                    'htmlOptions'=>array('width'=>'90px'),
                               ),
                           ),
                           'template'=>'{items} {pager}',
)); ?>

<?$this->widget( 'application.extensions.EChosen.EChosen',array('target'=>'select','debug'=>true));?>

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
</td>
      <td width="220" valign="top">
            <h2 class="h2">
                Доступные операции
                <span title="<?=Yii::t('qtip', '#3')?>" class="qtipm"  ><img src="/images/admin/help.png" height="16" alt="help"></span>
            </h2>
            <ul class="bordered-list-buttoms" >
                <li>
                     <table cellpadding="5" style="margin: 0 10px;">

                                <tr>

                                        <form action="<?=Yii::app()->createUrl("/admin/photogallery/photogallery/create/")?>">
                                        <td>
                                            Добавить фотогалерею
                                        </td>

                                        <td>
                                            <?
                                            echo CHtml::submitButton('',array('id'=>'submit-add-item'))
                                            ?>
                                        </td>
                                        </form>

                                </tr>

                      </table>
                </li>
            </ul>
        </td>
    </tr>
</table>