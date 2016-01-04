

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'photogallery-form',
	'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
        
        'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>
<?
Yii::import('ext.phaActiveColumn.*');
?>
<table class="bordered-list">
	

        <tr>
            <td colspan="2">
                
                <h2>Общие параметры</h2>
                <hr>
                
            </td>
        </tr>

	<tr>
		<td align="right"><b><?php echo $form->label($model,'name'); ?>:</b></td>
		<td><?php echo $form->textField($model,'name'); ?><br>
		<?php echo $form->error($model,'name'); ?></td>
	</tr>

	<tr>
		<td align="right"><b><?php echo $form->label($model,'text'); ?>:</b></td>
		<td>
                 <?
                                $this->widget('application.extensions.editor.CKkceditor',array(
                                    'model'=>$model,
                                    'attribute'=>'text',
                                    "height"=>'200px',
                                    "width"=>'850px',
                                    "filespath"=>$_SERVER['DOCUMENT_ROOT']."/userfiles/editor/",
                                    "filesurl"=>"/userfiles/editor/",

                                ));


                 ?><br/>
                <?php echo $form->error($model,'text'); ?></td>
	</tr>

	<tr>
		<td align="right"><b><?php echo $form->label($model,'view'); ?>:</b></td>
		<td><?php echo $form->checkBox($model,'view'); ?>
		<?php echo $form->error($model,'view'); ?></td>
	</tr>
        <?
        if(!$model->isNewRecord)
        {
        ?>
        <tr>
            <td colspan="2">
                
                <h2>
                    Фотографии
                    <span title="<?=Yii::t('qtip', '#12')?>" class="qtipm"  ><img src="/images/admin/help.png" height="16" alt="help"></span>
                </h2>
                <hr>
                
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <a href="<?=$this->createUrl('addphotos',array('phid'=>$model->id))?>">
                    <img src="/images/admin/addphotos.png" alt="Добавить фото"><br>
                    Добавить фото
                </a>
               
                <?php 
                
                
                    $this->widget('ext.CSortableGridView.CSortableGridView', array(
                        'cond_attr'=>'phid',
                        'dataProvider'=>$photo->search(),
                        'filter' => $photo,
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
                                                        'type'=>'html',
                                                        'value'=>'$data->name2img()',
                                                        'filter'=>false
                                                        
                                                       ),
                                                   array(
                                                       'name'=>'title',
                                                       'filter'=>false

                                                        ),
                                                  

                                                        

                                               array(
                                                    'class' => 'phaCheckColumn',
                                                    'name' => 'view',
                                                    'actionUrl' => array('setisviewphoto'),
                                                    'htmlOptions'=>array('width'=>'6%','align'=>'center'),
                                                ),

                                              array(
                                                   'class' => 'CButtonColumn',
                                                   'template' => '{update}&nbsp;&nbsp;{delete}',
                                                   'updateButtonImageUrl' => '/css/admin/gridview/update.png',
                                                   'updateButtonUrl' => 'Yii::app()->controller->createUrl("updatephoto",array("id"=>$data->primaryKey,"phid"=>$_GET["id"]))',
                                                   'deleteButtonImageUrl' => '/css/admin/gridview/delete.png',
                                                   'deleteButtonUrl' => 'Yii::app()->controller->createUrl("deletephoto",array("id"=>$data->primaryKey,"phid"=>$_GET["id"]))',
                                                   'viewButtonImageUrl' => '/css/admin/gridview/view.png',
                                                    'htmlOptions'=>array('width'=>'90px'),
                                               ),
                                           ),
                                           'template'=>'{items} {pager}',
                    ));
                
               ?>

            </td>
        </tr>
        <?
        }
        ?>
	<td colspan="2" align="right" >
                <span title="<?=Yii::t('qtip', '#6')?>" class="qtipm"  ><img src="/images/admin/help.png" height="16" alt="help"></span>
                <a id="cancelbutton" href="<?=$this->createUrl('index')?>"></a>
                <input type="submit" name="savebutton" id="savebutton" value="&nbsp;">&nbsp;&nbsp;
                <input type="submit" name="applybutton" id="applybutton" value="&nbsp;&nbsp;">&nbsp;&nbsp;
         </td>
</table>


<?php $this->endWidget(); ?>
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