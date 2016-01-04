<?php
$this->breadcrumbs=array(
	'Каталоги' => array('default/index'),
        'Установка' => array('install/index'),
        ''
);

if($root->isNewRecord)
{
    ?>
    <h5>Добавление каталога</h5>
    <?php
}
else
{
    ?>
    <h5>Редактирование каталога: <?=$root->name?></h5>
    <?
}

$form = $this->beginWidget('CActiveForm', array(
    'id'=>'add_catalog',
    'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
    'focus'=>array($root,'name'),
    'clientOptions'=>array('validateOnSubmit'=>true),
    'htmlOptions'=>array('class'=>'infieldlabel'),
));

?>
 <table class="bordered-list">
     <tr>
        <td align="right" ><b><?php echo $form->label($root,'name'); ?>:</b></td>
        <td><?php echo $form->textField($root,'name'); ?><br>
        <?php echo $form->error($root,'name'); ?></td>
     </tr>

     <tr>
        <td align="right" ><b><?php echo $form->label($root,'alias'); ?>:</b></td>
        <td><?php echo $form->textField($root,'alias'); ?><br>
        <?php echo $form->error($root,'alias'); ?></td>
     </tr>
       
     <tr>
        <td align="right" ><b><?php echo $form->label($root,'type_id'); ?>:</b></td>
        <td><?php echo $form->listBox($root,'type_id',  Type::selectData(),array('size'=>1)); ?><br>
        <?php echo $form->error($root,'type_id'); ?></td>
     </tr>

     <tr>
        <td align="right" ><b><?php echo $form->label($root,'view'); ?>:</b></td>
        <td><?php echo $form->checkbox($root,'view'); ?><br>
        <?php echo $form->error($root,'view'); ?></td>
     </tr>

     <tr> 
         <td colspan="2" align="right" >
                <a id="cancelbutton" href="<?=$this->createUrl('install/index')?>"></a>
                <input type="submit" id="savebutton" value="">&nbsp;&nbsp;
         </td>
     </tr>
</table>

      

<?php $this->endWidget(); ?>
