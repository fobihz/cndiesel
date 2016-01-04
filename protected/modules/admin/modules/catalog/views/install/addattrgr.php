<?
if($attr_gr->isNewRecord)
{
    ?>
    <h5>Добавление группы атрибутов</h5>
    <?php
}
else
{
    ?>
    <h5>Редактирование группы атрибутов: <?=$attr_gr->name?></h5>
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
    'id'=>'add_attr_gr_form',
    'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
    'focus'=>array($attr_gr,'name'),
    'clientOptions'=>array('validateOnSubmit'=>true),
    'htmlOptions'=>array('class'=>'infieldlabel'),
));

?>
     <table class="bordered-list">
        <tr>
            <td>
                <b><?php echo $form->label($attr_gr,'name'); ?>:</b>
            </td>
            <td>
                <?php echo $form->textField($attr_gr,'name'); ?><br/>
                <?php echo $form->error($attr_gr,'name'); ?>
            </td>
        </tr>
        
        <tr>
            <td colspan="2" align="right">
               <a id="cancelbutton" href="<?=$this->createUrl('install/index')?>"></a>
               <input type="submit" id="savebutton" value="">&nbsp;&nbsp;
            </td>
        </tr>
     </table>

       

<?php $this->endWidget(); ?>
