<?php
if(!empty($_GET['msg']))
{
    echo '<br/><br/>';
    $this->renderPartial('application.modules.admin.views.msg',array('msg'=>$_GET['msg'],'msgtype'=>$_GET['msgtype']));
}
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'page-form',
	'enableAjaxValidation'=>true,
        'enableClientValidation'=>true,
        'focus'=>array($model,'name'),
        'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

<table class="bordered-list">


      <tr>
          <td colspan="2">
              <h2>
                  SEO параметры
                  <span title="<?=Yii::t('qtip', '#10')?>" class="qtipm"  ><img src="/images/admin/help.png" height="16" alt="help"></span>
              </h2>
              <hr>
          </td>
      </tr>

	

	<tr>
		<td align="right"><b><?php echo $form->label($model,'title'); ?>:</b></td>
		<td><?php echo $form->textArea($model,'title'); ?><br/>
		<?php echo $form->error($model,'title'); ?></td>
	<tr>

	<tr>
		<td align="right"><b><?php echo $form->label($model,'keywords'); ?>:</b></td>
		<td><?php echo $form->textArea($model,'keywords'); ?><br/>
		<?php echo $form->error($model,'keywords'); ?></td>
	</tr>

	<tr>
		<td align="right"><b><?php echo $form->label($model,'description'); ?>:</b></td>
		<td><?php echo $form->textArea($model,'description'); ?><br/>
		<?php echo $form->error($model,'description'); ?></td>
	</tr>

         <tr>
              <td colspan="2">
                  <h2>Основные параметры</h2>
                  <hr>
              </td>
         </tr>

	<tr>
		<td align="right"><b><?php echo $form->label($model,'name'); ?>:</b></td>
		<td><?php echo $form->textField($model,'name'); ?><br/>
		<?php echo $form->error($model,'name'); ?></td>
	</tr>

	<tr>
		<td align="right"><b><?php echo $form->label($model,'text'); ?>:</b></td>
		<td>
                    <?
//                    echo $_SERVER['DOCUMENT_ROOT']."/userfiles/editor/";
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
         <td colspan="2" align="right" >
                <span title="<?=Yii::t('qtip', '#6')?>" class="qtipm"  ><img src="/images/admin/help.png" height="16" alt="help"></span>
                <a id="cancelbutton" href="<?=$this->createUrl('page/index')?>"></a>
                <input type="submit" name="savebutton" id="savebutton" value="&nbsp;">&nbsp;&nbsp;
                <input type="submit" name="applybutton" id="applybutton" value="&nbsp;&nbsp;">&nbsp;&nbsp;
         </td>
     </tr>
</table>

<?php $this->endWidget(); ?>

