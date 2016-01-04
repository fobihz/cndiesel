

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'email-form',
	'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
        'focus'=>array($model,'email'),
        'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	

	

<table class="bordered-list">


      <tr>
		<td align="right"><b><?php echo $form->label($model,'email'); ?>:</b></td>
		<td><?php echo $form->textField($model,'email'); ?><br/>
		<?php echo $form->error($model,'email'); ?></td>
	</tr>

	<tr>
		<td align="right"><b><?php echo $form->label($model,'used'); ?>:</b></td>
		<td><?php echo $form->checkBox($model,'used'); ?><br/>
		<?php echo $form->error($model,'used'); ?></td>
	</tr>

	<tr>
             <td colspan="2" align="right" >

                    <a id="cancelbutton" href="<?=$this->createUrl('email/index')?>"></a>
                    <input type="submit" name="savebutton" id="savebutton" value="&nbsp;">
            
             </td>
        </tr>
</table>
<?php $this->endWidget(); ?>

<!-- form -->