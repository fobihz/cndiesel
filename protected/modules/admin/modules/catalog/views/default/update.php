<?
if(!empty($_GET['msg']))
{
    echo '<br/><br/>';
    $this->renderPartial('application.modules.admin.views.msg',array('msg'=>$_GET['msg'],'msgtype'=>$_GET['msgtype']));
}
?>

<h5>Редактирование элемента: <?=$model->name?></h5><?

$this->breadcrumbs=array(
	'Каталоги' => array('default/index'),
        $root->name => array('default/viewcatalog','id'=>$_GET['pid']),
        ''
);

$form = $this->beginWidget('CActiveForm', array(
    'id'=>'add_catalog',
    'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
    'focus'=>array($model,'name'),
    'clientOptions'=>array('validateOnSubmit'=>true),
    'htmlOptions'=>array('class'=>'infieldlabel'),
));

?>
 <table class="bordered-list">


      <tr>
          <td colspan="2">
              <h2>SEO параметры</h2>
              <hr>
          </td>
      </tr>

      <tr>
        <td align="right" ><b><?php echo $form->label($model,'alias'); ?>:</b></td>
        <td><?php echo $form->textField($model,'alias',array('style'=>'width:200px;','class'=>'url')); ?>
             <span title="<?=Yii::t('qtip', '#4')?>" class="qtipm"  ><img src="/images/admin/help.png" height="16" alt="help"></span>
            <br>
        <?php echo $form->error($model,'alias'); ?></td>
     </tr>

     <tr>
        <td align="right" ><b><?php echo $form->label($model,'title'); ?>:</b></td>
        <td><?php echo $form->textArea($model,'title',array('style'=>'width:200px;')); ?><br>
        <?php echo $form->error($model,'title'); ?></td>
     </tr>

     <tr>
        <td align="right" ><b><?php echo $form->label($model,'keywords'); ?>:</b></td>
        <td><?php echo $form->textArea($model,'keywords',array('style'=>'width:200px;')); ?><br>
        <?php echo $form->error($model,'keywords'); ?></td>
     </tr>

      <tr>
        <td align="right" ><b><?php echo $form->label($model,'description'); ?>:</b></td>
        <td><?php echo $form->textArea($model,'description',array('style'=>'width:200px;')); ?><br>
        <?php echo $form->error($model,'description'); ?></td>
     </tr>

     <tr>
          <td colspan="2">
              <h2>Основные параметры</h2>
              <hr>
          </td>
     </tr>

     <tr>
        <td align="right" ><b><?php echo $form->label($model,'name'); ?>:</b></td>
        <td><?php echo $form->textField($model,'name',array('style'=>'width:200px;','class'=>'str')); ?><br>
        <?php echo $form->error($model,'name'); ?></td>
     </tr>  

     

     <?
     $this->renderPartial('_attrs',array('model'=>$model));
     ?>

     <tr>
        <td align="right" ><b><?php echo $form->label($model,'view'); ?>:</b></td>
        <td><?php echo $form->checkbox($model,'view'); ?><br>
        <?php echo $form->error($model,'view'); ?></td>
     </tr>

     <tr>
         <td colspan="2" align="right" >
                <span title="<?=Yii::t('qtip', '#6')?>" class="qtipm"  ><img src="/images/admin/help.png" height="16" alt="help"></span>
                <a id="cancelbutton" href="<?=$this->createUrl('default/viewcatalog',array('id'=>$_GET['pid'],'Stre_page'=>$Stre_page))?>"></a>
                <input type="submit" name="savebutton" id="savebutton" value="&nbsp;">&nbsp;&nbsp;
                <input type="submit" name="applybutton" id="applybutton" value="&nbsp;&nbsp;">&nbsp;&nbsp;
         </td>
     </tr>



</table>
<?=$form->hiddenField($model,'type_id');?>

<?php $this->endWidget(); ?>

<?$this->widget( 'application.extensions.EChosen.EChosen',array('target'=>'select','debug'=>true));?>
