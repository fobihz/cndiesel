<?
if($attr->isNewRecord)
{
    ?>
    <h5>Добавление атрибута</h5>
    <?php
}
else
{
    ?>
    <h5>Редактирование атрибута: <?=$attr->name?></h5>
    <?
}
?>

<?php

$this->breadcrumbs=array(
	'Каталоги' => array('default/index'),
        'Установка' => array('install/index'),
        ''
);

$form = $this->beginWidget('CActiveForm', array(
    'id'=>'add_attr_form',
    'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
    'focus'=>array($attr,'name'),
    'clientOptions'=>array('validateOnSubmit'=>true),
    'htmlOptions'=>array('class'=>'infieldlabel'),
));

?>
 <table class="bordered-list">
     <tr>
        <td align="right" ><b><?php echo $form->label($attr,'name'); ?>:</b></td>
        <td><?php echo $form->textField($attr,'name'); ?><br>
        <?php echo $form->error($attr,'name'); ?></td>
     </tr>
       
     <tr>
        <td align="right" ><b><?php echo $form->label($attr,'type_id'); ?>:</b></td>
        <td><?php echo $form->listBox($attr,'type_id',  Type::selectData(),array('size'=>1)); ?><br>
        <?php echo $form->error($attr,'type_id'); ?></td>
     </tr>

     <tr>
        <td align="right" ><b><?php echo $form->label($attr,'mytype_id'); ?>:</b></td>
        <td><?php echo $form->listBox($attr,'mytype_id',  Mytype::selectData(),array('size'=>1)); ?><br>
        <?php echo $form->error($attr,'mytype_id'); ?></td>
     </tr>

     <tr>
        <td align="right" ><b><?php echo $form->label($attr,'pos'); ?>:</b></td>
        <td><?php echo $form->textField($attr,'pos',array('size'=>5)); ?><br>
        <?php echo $form->error($attr,'pos'); ?></td>
     </tr>
        

     <tr> 
         <td colspan="2" align="right" >
                <a id="cancelbutton" href="<?=$this->createUrl('install/index')?>"></a>
                <input type="submit" id="savebutton" value="">&nbsp;&nbsp;
         </td>
     </tr>
</table>

       

<?php $this->endWidget(); ?>
