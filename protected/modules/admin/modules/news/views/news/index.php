<?php
$this->breadcrumbs=array(
	'',
);

?>

<table width="99%">
    <tr>
        <td valign="top">
            <h1 class="nomargin">
                Новости
                <span title="<?=Yii::t('qtip', '#14')?>" class="qtipm"  ><img src="/images/admin/help.png" height="16" alt="help"></span>
            </h1>
            <?
            if(!empty($_GET['msg']))
            {

                $this->renderPartial('application.modules.admin.views.msg',array('msg'=>$_GET['msg'],'msgtype'=>$_GET['msgtype']));
            }
     
            Yii::import('ext.phaActiveColumn.*');
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
                                           ),
                                            array(
                                               'name'=>'img',
                                               'value'=>'$data->viewImg()',
                                               'htmlOptions'=>array('width'=>'120px','align'=>'center'),
                                               'type'=>'html'
                                           ),
                                           array(
                                               'name'=>'title',
                                               'htmlOptions'=>array('width'=>'300px'),
                                               //'filter'=>false
                                               ),

                                          array(
                                               'name'=>'shorttext',
                                               'filter'=>false,
                                               'type'=>'html'
                                               //'filter'=>false
                                               ),
                                            array(
                                                'class' => 'phaCheckColumn',
                                                'name' => 'view',
                                                'actionUrl' => array('check'),
                                                'htmlOptions'=>array('width'=>'6%','align'=>'center'),
                                            ),


                                           array(
                                               'class' => 'CButtonColumn',
                                               'template' => '{view}&nbsp;&nbsp;{update}&nbsp;&nbsp;{delete}',
                                               'updateButtonImageUrl' => '/css/admin/gridview/update.png',
                                               'updateButtonUrl' =>'Yii::app()->controller->createUrl("update",array("id"=>$data->primaryKey,"News_page"=>$_GET["News_page"]))',

                                               'deleteButtonImageUrl' => '/css/admin/gridview/delete.png',
                                               'viewButtonImageUrl' => '/css/admin/gridview/view.png',
                                                'htmlOptions'=>array('width'=>'90px'),
                                           ),
                                       ),
                                       'template'=>'{items} {pager}',
            )); ?>


            <?$this->widget( 'application.extensions.EChosen.EChosen',array('target'=>'select','debug'=>true));?>
             </td>
                 <td width="20"></td>
                 <td width="180" valign="top">
                        <h2 class="h2">
                            Доступные операции

                        </h2>
                        <ul class="bordered-list-buttoms" >
                            <li>

                                  <a href="<?=$this->createUrl('news/create',array('News_page'=>$_GET['News_page']))?>" >
                                    <table cellspacing="5">
                                        <tr>
                                            <td valign="center">
                                                <img  src="/images/admin/news_subscribe.png" alt="добавить новость">
                                            </td>
                                            <td valign="center"> добавить<br/> новость </td>
                                        </tr>
                                    </table>
                                </a>




                            </li>

                        </ul>
                    </td>


            </tr>
</table>

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