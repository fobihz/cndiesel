<?php
/**
 * Created by PhpStorm.
 * User: nasedkin
 * Date: 09.01.16
 * Time: 16:50
 * @var Stre $child
 */
$photo = $child->attr_val('Изображение');
$photo = $photo ? '/userfiles/medium/' . $photo : '/images/no_photo.gif';
?>
<script type="text/javascript">
    hs.graphicsDir = '/highslide/graphics/';
    hs.outlineType = 'rounded-white';
    hs.wrapperClassName = 'draggable-header';
</script>
<div class="catalog-item" >
    <div class="catalog-item-img"><a href="/catalog/<?=$child->alias?>/"><img title="<?=$child->name?>" alt="<?=$child->name?>" src="<?=$photo?>"></a></div>
    <a class="catalog-item-name" href="/catalog/<?=$child->alias?>/" class="catalog-item-name"><?=$child->name?></a>
    <div class="catalog-item-price"><?=$child->attr_val('Цена')?></div>
    <a href="/site/form/" onclick="return hs.htmlExpand(this, { objectType: 'iframe', width: 600, height:310 });" class="catalog-item-order button">Заказать</a>
</div>