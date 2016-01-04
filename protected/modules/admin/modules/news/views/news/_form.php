

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-form',
	//'enableAjaxValidation'=>false,
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
		<td align="right"><b><?php echo $form->label($model,'keywords'); ?>:</b></td>
		<td><?php echo $form->textArea($model,'keywords'); ?>
		<?php echo $form->error($model,'keywords'); ?></td>
	</tr>

	<tr>
		<td align="right"><b><?php echo $form->label($model,'description'); ?>:</b></td>
		<td><?php echo $form->textArea($model,'description'); ?>
		<?php echo $form->error($model,'description'); ?></td>
	</tr>

	<tr>
		<td align="right"><b><?php echo $form->label($model,'htitle'); ?>:</b></td>
		<td><?php echo $form->textArea($model,'htitle'); ?>
		<?php echo $form->error($model,'htitle'); ?></td>
	</tr>

       <tr>
          <td colspan="2">
              <h2>
                  Основные параметры
                  
              </h2>
              <hr>
          </td>
        </tr>

	<tr>
		<td align="right"><b><?php echo $form->label($model,'date'); ?></b>:</td>
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
		<td align="right"><b><?php echo $form->label($model,'title'); ?></b>:</td>
		<td><?php echo $form->textField($model,'title',array('size'=>'70')); ?>
		<?php echo $form->error($model,'title'); ?></td>
	</tr>

        <tr>
		<td align="right"><b><?php echo $form->label($model,'img'); ?></b>:</td>
		<td>
                <?
                $this->widget('application.extensions.kcfinder.Ckcfinder',array(
                                            'model'=>$model,
                                            'attribute'=>'img',
                               ));
		?>
                <?php echo $form->error($model,'img'); ?>
                </td>
	</tr>

	<tr>
		<td align="right"><b><?php echo $form->label($model,'shorttext'); ?></b>:</td>
		<td>
                 <?             /*
                                $this->widget('application.extensions.editor.CKkceditor',array(
                                    'model'=>$model,
                                    'attribute'=>'shorttext',
                                    "config"=>array(
                                                     'toolbar' => 'Basic'
                                                     ),
                                    "height"=>'150px',
                                    "width"=>'850px',
                                    "filespath"=>$_SERVER['DOCUMENT_ROOT']."/userfiles/editor/",
                                    "filesurl"=>"/userfiles/editor/",

                                ));*/

                                echo $form->textArea($model,'shorttext',array('rows'=>'6','cols'=>'100'));

                    ?>
		<?php echo $form->error($model,'shorttext'); ?>
                </td>
	</tr>

	<tr>
		<td align="right"><b><?php echo $form->label($model,'fulltext'); ?></b>:</td>
		<td>
                 <?
                                $this->widget('application.extensions.editor.CKkceditor',array(
                                    'model'=>$model,
                                    'attribute'=>'fulltext',
                                    "height"=>'200px',
                                    "width"=>'850px',
                                    "filespath"=>$_SERVER['DOCUMENT_ROOT']."/userfiles/editor/",
                                    "filesurl"=>"/userfiles/editor/",

                                ));


                    ?>
		<?php echo $form->error($model,'fulltext'); ?>
                </td>
	</tr>

	

	<tr>
		<td align="right"><b><?php echo $form->label($model,'view'); ?></b>:</td>
		<td><?php echo $form->checkBox($model,'view'); ?>
		<?php echo $form->error($model,'view'); ?></td>
	</tr>

	<tr>
		<td colspan="2" align="right" >
                    <span title="<?=Yii::t('qtip', '#6')?>" class="qtipm"  ><img src="/images/admin/help.png" height="16" alt="help"></span>
                    <a id="cancelbutton" href="<?=$this->createUrl('index',array('News_page'=>$_GET['News_page']))?>"></a>
                   
                    <input type="submit" name="savebutton" id="savebutton" value="&nbsp;">&nbsp;&nbsp;
                    <input type="submit" name="applybutton" id="applybutton" value="&nbsp;&nbsp;">&nbsp;&nbsp;

                </td>
	</tr>
</table>
<?php $this->endWidget(); ?>
