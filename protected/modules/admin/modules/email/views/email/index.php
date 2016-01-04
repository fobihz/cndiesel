<?php
$this->breadcrumbs=array(
	'',
);

if(!empty($_GET['msg']))
{
    echo '<br/>';
    $this->renderPartial('application.modules.admin.views.msg',array('msg'=>$_GET['msg'],'msgtype'=>$_GET['msgtype']));
}
?>



<table width="99%">
    <tr>
        <td valign="top">
            <h1 class="nomargin">
                E-mails
                <span title="<?=Yii::t('qtip', '#8')?>" class="qtipm"  ><img src="/images/admin/help.png" height="16" alt="help"></span>
            </h1>
<?
Yii::import('ext.phaActiveColumn.*');
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$model->search(),
        'filter'=>$model,

        'pager'=>array('class'=>'CListPager'),

        'columns' => array(
                               array(
                                   'name'=>'id',
                                   'htmlOptions'=>array('width'=>'3%','align'=>'center'),
                                   'filter'=>false
                                   ),
                               array(
                                   'name'=>'email',

                                   //'filter'=>false
                                   ),
                                /*array(
                                   'name'=>'used',
                                    'value'=>'$data->used2str()',

                                   //'filter'=>false
                                   ),*/
                                array(
                                     'class' => 'phaCheckColumn',
                                        'name' => 'used',
                                        'actionUrl' => array('setisused'),
                                    'htmlOptions'=>array('width'=>'6%','align'=>'center'),
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

     </td>
     <td width="20"></td>
     <td width="180" valign="top">
            <h2 class="h2">
                Доступные операции
               
            </h2>
            <ul class="bordered-list-buttoms" >
                <li>
                       
                      <a href="<?=$this->createUrl('email/create')?>" >
                        <table cellspacing="5">
                            <tr>
                                <td valign="center">
                                    <img  src="/images/admin/email_add.png" alt="добавить e-mail">
                                </td>
                                <td valign="bottom"> добавить<br/> e-mail </td>
                            </tr>
                        </table>
                    </a>
                           
                    
                                 
                   
                </li>
                
            </ul>
        </td>


   </tr>
</table>
