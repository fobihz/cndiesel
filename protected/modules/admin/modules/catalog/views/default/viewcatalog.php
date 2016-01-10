<?
if(!empty($_GET['msg']))
{
    echo '<br/>';
    $this->renderPartial('application.modules.admin.views.msg',array('msg'=>$_GET['msg'],'msgtype'=>$_GET['msgtype']));
}

$this->breadcrumbs=array(
	'Каталоги'=>$this->createUrl('default/index'),
        ''
        );

$catalog_name = Stre::model()->roots()->findByPk($id)->name;
?>
<table width="99%">
    <tr>
        <td valign="top">
            <h1 class="nomargin">
                Каталог: <?=$catalog_name?>
                <span title="<?=Yii::t('qtip', '#2')?>" class="qtipm"  ><img src="/images/admin/help.png" height="16" alt="help"></span>
            </h1>
            <?
            Yii::import('ext.phaActiveColumn.*');
            ?>
            <?php
            $this->widget('ext.QTreeGridView.CQTreeGridView',
                    array(
                           'id' => 'category-grid',
                           'dataProvider' => $model->search(),
                           'filter' => $model,
                           'ajaxUpdate' => false,
                           'pager'=>array('class'=>'CListPager'),
                           'cssFile'=>'/css/admin/gridview/styles.css',

                           'columns' => array(
                               array(
                                   'name'=>'name',
                                   //'filter'=>false
                                   ),
                               array(
                                   'name'=>'alias',
                                   //'filter'=>false
                                   ),
                               /*array(
                                   'name'=>'view',
                                   'value'=>'$data->viewLink()',
                                   //'filter'=>false
                                   ),*/
                               array(
                                    'class' => 'phaCheckColumn',
                                    'name' => 'view',
                                    'actionUrl' => array('setisview'),
                                    'htmlOptions'=>array('width'=>'6%','align'=>'center'),
                                ),

                               array(
                                   'name'=>'type',
                                   'value'=>'$data->type->name',
                                    'filter'=>false
                               )
                               ,
                               array(
                                   'class' => 'CButtonColumn',
                                   'template' => '{update}&nbsp;&nbsp;{delete}',
                                   'updateButtonUrl' =>'Yii::app()->controller->createUrl("update",array("id"=>$data->primaryKey,"pid"=>$_GET["id"],"Stre_page"=>$_GET["Stre_page"]))',
                                   'updateButtonUrl' =>'$data->updateurl()',
                                   'deleteButtonUrl' =>'$data->deleteurl()',
                                   'updateButtonImageUrl' => '/css/admin/gridview/update.png',
                                   'deleteButtonImageUrl' => '/css/admin/gridview/delete.png',
                               ),
                           ),
                           'template'=>'{items} {pager}',
                      ));
            ?>
        </td>
        <td width="180" valign="top">
            <h2 class="h2">
                Доступные операции
                <span title="<?=Yii::t('qtip', '#3')?>" class="qtipm"  ><img src="/images/admin/help.png" height="16" alt="help"></span>
            </h2>
            <ul class="bordered-list-buttoms" >
                <li>
                       
                      
                            <table cellpadding="5" style="margin: 0 10px;">
                               <tr>
                                    <?
                                   $form = $this->beginWidget('CActiveForm', array(
                                        'id'=>'add_item',
                                        'method'=>'post',
                                        'action'=>$this->createUrl('default/additem',array('pid'=>$id,'Stre_page'=>$Stre_page)),
                                        'enableAjaxValidation'=>false,
                                        'enableClientValidation'=>false,
                                        'htmlOptions'=>array('class'=>'infieldlabel'),
                                    ));
                                    ?>
                                    <td>
                                        Добавить
                                    </td>
                                    <td>
                                        <?=$form->dropdownList($model,'type_id',  Type::selectDataOnName($catalog_name),array('style'=>'width:200px;'));?>
                                        <?=$form->error($model,'type_id');?>
                                    </td>
                                    <td>
                                        <?
                                        echo CHtml::submitButton('',array('id'=>'submit-add-item'))
                                        ?>
                                    </td>
                                     <?
                                    $this->endWidget();
                                    ?>
                                </tr>

                                <tr>
                                    <?
                                    echo CHtml::beginForm($this->createUrl('default/changenumonpage',array('pid'=>$id)))
                                    ?>
                                    <td>
                                        Элементов на стр.
                                    </td>
                                    <td>
                                        <?
                                        if(isset(Yii::app()->request->cookies['cat_num_on_page']) ) {
                                            $num_on_page = Yii::app()->request->cookies['cat_num_on_page']->value;
                                        }
                                        if(empty($num_on_page)) $num_on_page = 50;
                                        ?>
                                        <?=Chtml::dropDownList('numonpage', $num_on_page, array('10'=>10,'50'=>50,'100'=>100,'200'=>200,'1000000'=>'Все'),array('style'=>'width:200px;'))?>
                                    </td>
                                    <td>
                                        <?
                                        echo CHtml::submitButton('',array('id'=>'submit-change-num'))
                                        ?>
                                    </td>
                                     <?
                                    echo Chtml::endForm();
                                    ?>
                                </tr>


                            </table>
                           
                    
                                 
                   
                </li>
                
            </ul>
        </td>
    </tr>
</table>
<?$this->widget( 'application.extensions.EChosen.EChosen',array('target'=>'select','debug'=>true));?>