<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n";
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'',
);\n";
?>


?>

<h1><?php echo $label; ?></h1>

<?="<?php\n"?>
if(!empty($_GET['msg']))
{
    echo '<br/><br/>';
    $this->renderPartial('application.modules.admin.views.msg',array('msg'=>$_GET['msg'],'msgtype'=>$_GET['msgtype']));
}
?>

<?="<?php"?>
    $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$model->search(),
	'filter' => $model,
        'pager'=>array('class'=>'CListPager'),
        'cssFile'=>'/css/admin/gridview/styles.css',
        'columns' => array(
                              <?
                              foreach($this->tableSchema->columns as $column)
                              {
                               echo $column->name.",";
                              }
                              ?>
                               array(
                                   'class' => 'CButtonColumn',
                                   'template' => '{view}&nbsp;&nbsp;{update}&nbsp;&nbsp;{delete}',
                                   'updateButtonImageUrl' => '/css/admin/gridview/update.png',
                                   'deleteButtonImageUrl' => '/css/admin/gridview/delete.png',
                                   'viewButtonImageUrl' => '/css/admin/gridview/view.png',
                                   'htmlOptions'=>array('width'=>'90px'),
                               ),
                           ),
       'template'=>'{items} {pager}',
    )); ?>


<?="<?php"?>
    $this->widget( 'application.extensions.EChosen.EChosen',array('target'=>'select','debug'=>true));
    ?>
