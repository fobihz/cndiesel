<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>


<?php echo "<?php \$form=\$this->beginWidget('CActiveForm', array(
	'id'=>'".$this->class2id($this->modelClass)."-form',
	'enableAjaxValidation'=>true,
)); ?>\n"; ?>

	

	
<table class="bordered-list">
<?php
foreach($this->tableSchema->columns as $column)
{
	if($column->autoIncrement)
		continue;
?>
	<tr>
		<td align="right"><b><?php echo "<?php echo ".$this->generateActiveLabel($this->modelClass,$column)."; ?>\n"; ?>:</b></td>
		<td><?php echo "<?php echo ".$this->generateActiveField($this->modelClass,$column)."; ?>\n"; ?>
		<?php echo "<?php echo \$form->error(\$model,'{$column->name}'); ?>\n"; ?></td>
	</tr>

<?php
}
?>
        <tr>
		<td colspan="2" align="right" >
                    <span title="<?="<?"?>Yii::t('qtip', '#6')?>" class="qtipm"  ><img src="/images/admin/help.png" height="16" alt="help"></span>
                    <a id="cancelbutton" href="<?="<?="?>$this->createUrl('index')?>"></a>

                    <input type="submit" name="savebutton" id="savebutton" value="&nbsp;">&nbsp;&nbsp;
                    <input type="submit" name="applybutton" id="applybutton" value="&nbsp;&nbsp;">&nbsp;&nbsp;

                </td>
	</tr>
	
</table>
<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

