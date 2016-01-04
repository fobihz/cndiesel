

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'faq-form',
	//'enableAjaxValidation'=>true,
        //'enableClientValidation'=>true,
        //'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

<table class="bordered-list">
      <tr>
                <tr>
                    <td align="right"><b><?php echo $form->label($model,'date'); ?>:</b></td>
                    <td>
                        <?php
                        $this->widget('application.extensions.timepicker.timepicker', array(
                            'model'=>$model,
                            'name'=>'date',
                        ));
                        ?>
                    <?php echo $form->error($model,'date'); ?></td>
                </tr>
                <tr>
                    <td align="right"><b><?php echo $form->label($model,'name'); ?>:</b></td>
                    <td><?php echo $form->textField($model,'name'); ?>
                    <?php echo $form->error($model,'name'); ?></td>
                </tr>

                <!--<tr>
                        <td align="right"><b><?php echo $form->label($model,'email'); ?>:</b></td>
                        <td><?php echo $form->textField($model,'email'); ?>
                        <?php echo $form->error($model,'email'); ?></td>
                </tr>

                <tr>
                        <td align="right"><b><?php echo $form->label($model,'phone'); ?>:</b></td>
                        <td><?php echo $form->textField($model,'phone'); ?>
                        <?php echo $form->error($model,'phone'); ?></td>
                </tr>-->

		<td align="right"><b><?php echo $form->label($model,'question'); ?>:</b></td>
		<td>
                <?
                                $this->widget('application.extensions.editor.CKkceditor',array(
                                    'model'=>$model,
                                    'attribute'=>'question',
                                    "config"=>array(
                                                     //'toolbar' => 'Basic'
                                                     ),
                                    "height"=>'170px',
                                    "width"=>'800px',
                                    "filespath"=>$_SERVER['DOCUMENT_ROOT']."/userfiles/editor/",
                                    "filesurl"=>"/userfiles/editor/",

                                ));


                    ?>
		<br/>
                <?php echo $form->error($model,'question'); ?>
                </td>
	</tr>

	<!--<tr>
		<td align="right"><b><?php echo $form->label($model,'answer'); ?>:</b></td>
		<td>
                <?
                                $this->widget('application.extensions.editor.CKkceditor',array(
                                    'model'=>$model,
                                    'attribute'=>'answer',
                                    "config"=>array(
                                                     'toolbar' => 'Basic'
                                                     ),
                                    "height"=>'170px',
                                    "width"=>'800px',
                                    "filespath"=>$_SERVER['DOCUMENT_ROOT']."/userfiles/editor/",
                                    "filesurl"=>"/userfiles/editor/",

                                ));


                    ?>
                    <br/>
		<?php echo $form->error($model,'answer'); ?></td>
	</tr>

	

	<tr>
		<td align="right"><b><?php echo $form->label($model,'is_answered'); ?>:</b></td>
		<td><?php echo $form->checkBox($model,'is_answered'); ?>
		<?php echo $form->error($model,'is_answered'); ?></td>
	</tr>-->

	<tr>
		<td align="right"><b><?php echo $form->label($model,'is_viewed'); ?>:</b></td>
		<td><?php echo $form->checkBox($model,'is_viewed'); ?>
		<?php echo $form->error($model,'is_viewed'); ?></td>
	</tr>

	<tr>
		<td colspan="2" align="right" >
                    <!--<span title="<?=Yii::t('qtip', '#6')?>" class="qtipm"  ><img src="/images/admin/help.png" height="16" alt="help"></span>-->
                    <a id="cancelbutton" href="<?=$this->createUrl('faq/index',array('Faq_page'=>$_GET['Faq_page']))?>"></a>
                    <!--<input type="submit" name="mailbutton" id="mailbutton" value="&nbsp;&nbsp;">&nbsp;&nbsp;-->
                    <input type="submit" name="savebutton" id="savebutton" value="&nbsp;">&nbsp;&nbsp;
                    <input type="submit" name="applybutton" id="applybutton" value="&nbsp;&nbsp;">&nbsp;&nbsp;
                    
                </td>
	</tr>
</table>
<?php $this->endWidget(); ?>

