<?php
$this->breadcrumbs=array(
	'Каталоги' => array('default/index'),
        'Установка' 
);


if(!empty($_GET['msg']))
{
    echo '<br/>';
    $this->renderPartial('application.modules.admin.views.msg',array('msg'=>$_GET['msg'],'msgtype'=>$_GET['msgtype']));
}
?>


<table width="99%">
    <tr>
        <td valign="top">
            <h1>Каталоги сайта</h1>
            <?
            if(!empty($roots))
            {
                ?>
                <table class="list">
                    <tr class="title">
                        <td>#</td>
                        <td>Наименование</td>
                        <td>Алиас</td>
                        <td>Гр. атрибутов</td>
                        <td>Отобр.</td>
                        <td>Ред.</td>
                        <td>Уд.</td>
                    </tr>
                    <?
                    foreach($roots as $root)
                    {
                        ?>
                        <tr>
                            <td><?=$root->id?></td>
                            <td><?=$root->name?></td>
                            <td><?=$root->alias?></td>
                            <td><?=$root->type->name?></td>
                            <td>
                                <?
                                    if($root->view) echo 'Да';
                                    else echo 'Нет';

                                ?>
                            </td>
                            <td><a href="<?=$this->createUrl('install/addcatalog',array('id'=>$root->id))?>"><img height="18" src="/images/admin/edit.png" alt="редактировать каталог"></a></td>
                            <td><a onclick="return confirm('Вы действительно хотите удалить каталог?');" href="<?=$this->createUrl('install/deletecatalog',array('id'=>$root->id))?>"><img height="16" src="/images/admin/delete.png" alt="удалить каталог"></a></td>

                        </tr>
                        <?
                    }
                    ?>
                </table>
                <?
            }
            else
            {

                $this->renderPartial('application.modules.admin.views.msg',array('msg'=>'[!] Нет каталогов...','msgtype'=>'note'));

            }
            ?>
            <h1>Группы аттрибутов</h1>
            <?
            if(!empty($types))
            {

                ?>
                
                <table class="list">
                    <tr class="title">
                        
                        <td>#</td>
                        <td>Наименование группы</td>
                        <td>Ред.</td>
                        <td>Уд.</td>
                    </tr>
                    <?
                    foreach($types as $type)
                    {
                        ?>
                        <tr>
                            <td><?=$type->id?></td>
                            <td><?=$type->name?></td>
                            <td><a href="<?=$this->createUrl('install/addattrgr',array('id'=>$type->id))?>"><img height="18" src="/images/admin/edit.png" alt="редактировать группу атрибутов"></a></td>
                            <td><a onclick="return confirm('Вы действительно хотите удалить группу атрибутов?');" href="<?=$this->createUrl('install/deleteattrgr',array('id'=>$type->id))?>"><img height="16" src="/images/admin/delete.png" alt="удалить группу атрибутов"></a></td>
                        </tr>
                        <?
                    }
                    ?>
                </table>
                <?
            }
            else
            {
                
                $this->renderPartial('application.modules.admin.views.msg',array('msg'=>'[!] Нет групп атрибутов...','msgtype'=>'note'));

            }
            ?>
            <h1>Аттрибуты</h1>
             <?
            if(!empty($attrs))
            {

                ?>
                
                <table class="list">
                    <tr class="title">

                        <td>#</td>
                        <td>Наименование</td>
                        <td>Группа</td>
                        <td>CMS-тип</td>
                        <td>Поз.</td>
                        <td>Ред.</td>
                        <td>Уд.</td>
                    </tr>
                    <?
                    foreach($attrs as $attr)
                    {
                        ?>
                        <tr>
                            <td><?=$attr->id?></td>
                            <td><?=$attr->name?></td>
                            <td><?=$attr->type->name?></td>
                            <td><?=$attr->mytype->name?></td>
                            <td>
                                   <?
                                    $form = $this->beginWidget('CActiveForm', array(
                                        'action'=>$this->createUrl('install/attrpos',array('id'=>$attr->id)),
                                        'id'=>'attrpos_'.$attr->id,
                                        'enableAjaxValidation'=>true,
                                        'enableClientValidation'=>true,
                                        'focus'=>array($attr,'name'),
                                        'clientOptions'=>array('validateOnSubmit'=>true),
                                        'htmlOptions'=>array('class'=>'infieldlabel'),
                                    ));
                                    echo $form->textField($attr,'pos',array('size'=>5));
                                    echo "<br>";
                                    echo $form->error($attr,'pos');
                                    
                                    $this->endWidget();
                                    ?>
                                 
                               
                            </td>
                            <td><a href="<?=$this->createUrl('install/addattr',array('id'=>$attr->id))?>"><img height="18" src="/images/admin/edit.png" alt="редактировать атрибут"></a></td>

                            <td><a onclick="return confirm('Вы действительно хотите удалить атрибут?');" href="<?=$this->createUrl('install/deleteattr',array('id'=>$attr->id))?>"><img height="16" src="/images/admin/delete.png" alt="удалить атрибут"></a></td>
                        </tr>
                        <?
                    }
                    ?>
                </table>
                <?
            }
            else
            {
                
                $this->renderPartial('application.modules.admin.views.msg',array('msg'=>'[!] Нет атрибутов...','msgtype'=>'note'));

            }
            ?>

        </td>
        <td width="180" valign="top">
            <h2 class="h2">Доступные операции</h2>
            <ul class="bordered-list-buttoms" >
                <li>
                    <a href="<?=$this->createUrl('install/addcatalog')?>" >
                        <table cellspacing="5">
                            <tr>
                                <td valign="center">
                                    <img height="40" src="/images/admin/addcatalog.png" alt="добавить каталог">
                                </td>
                                <td valign="bottom"> добавить каталог </td>
                            </tr>
                        </table>
                    </a>
                </li>
                <li>
                    <a rel="fancybox" href="<?=$this->createUrl('install/addattrgr')?>">
                         <table cellspacing="5">
                            <tr>
                                <td valign="center">
                                    <img height="43" src="/images/admin/addattrgroup.png" alt="добавить группу атрибутов">
                                </td>
                                <td valign="bottom"> добавить группу атрибутов </td>
                            </tr>
                        </table>
                    </a>
                </li>
                <li>
                    <a href="<?=$this->createUrl('install/addattr')?>">
                        <table cellspacing="5">
                            <tr>
                                <td valign="center">
                                    <img height="43" src="/images/admin/addattr.png" alt="добавить атрибут">
                                </td>
                                <td valign="top"> добавить атрибут </td>
                            </tr>
                        </table>
                    </a>
                </li>
            </ul>
        </td>
    </tr>
</table>