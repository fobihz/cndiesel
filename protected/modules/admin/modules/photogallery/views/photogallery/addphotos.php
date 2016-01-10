<?php
$this->breadcrumbs=array(
//        'Каталоги'=>'/admin/catalog/',
//        'О центре'=>'/admin/catalog/default/viewcatalog/id/19',
	'Фотогалереи'=>array('index'),
	'Фотографии галереи: '.$model->name=>array('photogallery/update','id'=>$model->id),
        ''
);


?>

<h1>
    Добавление фотографий
    <span title="<?=Yii::t('qtip', '#13')?>" class="qtipm"  >
        <img src="/images/admin/help.png" height="16" alt="help">
    </span>
</h1>

<?
if(!empty($_GET['msg']))
{
    echo '<br/><br/>';
    $this->renderPartial('application.modules.admin.views.msg',array('msg'=>$_GET['msg'],'msgtype'=>$_GET['msgtype']));
}
?>

<?
  $this->widget('ext.HZupload.HZupload');
?>
<form method="post" action="">
    
    <input class="uploadbutton" style="float:left;" type="submit" name="savebutton" id="savebutton" value="&nbsp;">

</form>
<a style="float:none;" id="cancelbutton" href="<?=$this->createUrl('update',array('id'=>$model->id))?>"></a>
 
