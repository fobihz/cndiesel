

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'photo-form',
	'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
));

?>

	
<table class="bordered-list">


        <tr>
		<td align="right"><b>Изображение:</b></td>
		<td>
                    <a class="fancybox" title="<?=htmlentities($model->title, ENT_QUOTES,'UTF-8')?>" href="/userfiles/large/<?=$model->name?>"><img style="border:1px solid #bbb;"  src="/userfiles/medium/<?=$model->name?>" alt="<?=htmlentities($model->title, ENT_QUOTES,'UTF-8')?>"/></a>
		</td>
	</tr>

        <tr>
		<td align="right"><b><?php echo $form->label($model,'title'); ?>:</b></td>
		<td><?php echo $form->textArea($model,'title'); ?><br/>
		<?php echo $form->error($model,'title'); ?></td>
	</tr>

	
	<tr>
		<td align="right"><b><?php echo $form->label($model,'view'); ?>:</b></td>
		<td><?php echo $form->checkBox($model,'view'); ?><br/>
		<?php echo $form->error($model,'view'); ?></td>
	</tr>


	<tr>
		<td colspan="2" align="right" >

                <a id="cancelbutton" href="<?=$this->createUrl('update',array('id'=>$_GET['phid']))?>"></a>
                <input type="submit" name="savebutton" id="savebutton" value="&nbsp;">&nbsp;&nbsp;
                <input type="submit" name="applybutton" id="applybutton" value="&nbsp;&nbsp;">&nbsp;&nbsp;
         </td>
	</tr>

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