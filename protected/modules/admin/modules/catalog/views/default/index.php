<?php

if(!empty($_GET['msg']))
{
    echo '<br/>';
    $this->renderPartial('application.modules.admin.views.msg',array('msg'=>$_GET['msg'],'msgtype'=>$_GET['msgtype']));
}


$this->breadcrumbs=array(
	'');

?>

<h1>
    
    Каталоги сайта
    <span title="<?=Yii::t('qtip', '#1')?>" class="qtipm"  ><img src="/images/admin/help.png" height="16" alt="help"></span>
</h1>

 <?
    if(!empty($roots))
    {
        ?>
        <ul class="bordered-list">
            <?
            foreach($roots as $root)
            {
                ?>
                <li>
                    
                    <a href="<?=$this->createUrl('default/viewcatalog',array('id'=>$root->id))?>"><?=$root->name?></a>
                </li>
                <?
            }
            ?>
        </ul>
        <?
    }
    else
    {

        $this->renderPartial('application.modules.admin.views.msg',array('msg'=>'[!] Нет каталогов...','msgtype'=>'note'));

    }

    
?>
   