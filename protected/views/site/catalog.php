<?php
/**
 * Created by PhpStorm.
 * User: nasedkin
 * Date: 05.01.16
 * Time: 18:00
 *
 * @var Stre $page
 */


$ancestors = $page->ancestors()->findAllByAttributes(array(
    'view' => 1,
));

if( $ancestors ) {
    ?><span class="breadcrumbs"><?
    foreach( $ancestors as $breadcrumb) { ?>
        <a href="/catalog/<?=$breadcrumb->alias?>/"><?=$breadcrumb->name?></a> &raquo;
    <? }
    ?></span><?
}

?>
<h1><?=$page->name?></h1>

<?
$criteria = new CDbCriteria();
$criteria->condition = "view = 1";
$count    = $page->children()->count($criteria);
$pages    = new CPagination($count);

// results per page
$pages->pageSize = 12;
$pages->applyLimit($criteria);
$pages->pageVar = 'p';

$children = $page->children()->findAll($criteria);

if( $children ) {
    echo $page->attr_val('Текст');
    foreach( $children as $child ) {
        $this->renderPartial('_item', array('child' => $child));
    }
    $this->widget('CLinkPager', array(
        'pages'  => $pages,
        'header' => false,
        'firstPageLabel'=>'<<',  //fill in the following as you want
        'prevPageLabel' =>'<',
        'nextPageLabel' =>'>',
        'lastPageLabel' =>'>>',
        'cssFile' => '/css/pager.css',
    ));
} else {
    $photoName  = $page->attr_val('Изображение');
    $photo      = $photoName ? '/userfiles/medium/' . $photoName : '/images/no_photo.gif';
    $largePhoto = $photoName ? '/userfiles/original/' . $photoName : '/images/no_photo.gif';
    ?>
    <script type="text/javascript">
        hs.graphicsDir = '/highslide/graphics/';
        hs.outlineType = 'rounded-white';
        hs.wrapperClassName = 'draggable-header';
    </script>
    <div class="page-item" href="/catalog/<?=$page->alias?>/" >
        <a href="<?=$largePhoto?>" onclick="return hs.expand(this)" class="page-item-img"><img src="<?=$photo?>"></a>
    </div>
    <div class="page-text">
        <? $price = $page->attr_val('Цена');
        if( $price ) { ?>
            Цена: <span class="page-price"><?=$page->attr_val('Цена')?></span>
        <? } ?>
        <?=$page->attr_val('Текст');?>
        <br>
        <? $this->renderPartial('_order'); ?>
        <br>
    </div>
<? }