<!DOCTYPE html>
<html>
    <head>
        <title><?php echo CHtml::encode($this->pageTitle); ?> | Cummins parts</title>
        <meta name="description" content="<?php echo CHtml::encode($this->metadescr); ?>" />
        <meta name="keywords" content="<?php echo CHtml::encode($this->metakeys); ?>" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="icon" href="/images/logo-2.png" type="image/x-icon"/>
        <link rel="shortcut icon" href="/images/logo-2.png" type="image/x-icon"/>
        <link rel="stylesheet" type="text/css" href="/css/style.css" />

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
        <script src="/js/slippry/dist/slippry.min.js"></script>
        <link rel="stylesheet" href="/js/slippry/dist/slippry.css">

        <link rel="stylesheet" href="/highslide/highslide.css">
        <script src="/highslide/highslide-with-html.js"></script>

        <script>
            $( document ).ready(function() {
                jQuery('#pictures-demo').slippry({
                    // general elements & wrapper
                    slippryWrapper: '<div class="sy-box pictures-slider" />', // wrapper to wrap everything, including pager
                    // options
                    adaptiveHeight: false, // height of the sliders adapts to current slide
                    captions: false, // Position: overlay, below, custom, false
                    // pager
                    pager: false,
                    // controls
                    controls: true,
                    autoHover: false,
                    // transitions
                    transition: 'kenburns', // fade, horizontal, kenburns, false
                    kenZoom: 105,
                    speed: 4000 // time the transition takes (ms)
                });
            });
        </script>
    </head>
    <body>
        <div class="layout">
            <div class="header">
                <div class="slogan">
                    <div>Оригинальные запчасти и новые двигатели Cummins напрямую от производителя</div>
                    <?
                    $ph = Page::model()->findByAttributes(array('name' => 'Param: телефон в шапке'));
                    ?>
                    <div class="phone"><?=$ph->text?></div>
                </div>
                <div class="logo-1"><a href="/"><img src="/images/logo.jpg" alt="cummins"></a></div>
                <div class="logo-2"><a href="/"><img src="/images/logo-2.png" alt="cummins"></a></div>

            </div>
            <div class="menu">
                <ul>
                    <li><a href="/">Главная</a></li>
                    <li><a href="/news/">Новости</a></li>
                    <li>
                        <a href="/catalog/products/">Продукция</a>
                        <?php
                        $root = Stre::model()->roots()->find();
                        $subcategories = $root->children()->findAllByAttributes(array(
                            'view' => 1,
                        ));
                        if( $subcategories ) { ?>
                            <ul>
                                <? foreach($subcategories as $category ) { ?>
                                    <li><a href="/catalog/<?=$category->alias?>/"><?=$category->name?></a></li>
                                <? } ?>
                            </ul>
                        <? } ?>
                    </li>
                    <li><a href="/delivery/">Доставка</a></li>
                    <li><a href="/contacts/">Контакты</a></li>
                </ul>
            </div>
            <div class="animation">
                <ul id="pictures-demo">
                    <?
                    $criteria = new CDbCriteria();
                    $criteria->condition = "phid = 4 and view = 1";
                    $criteria->order = 'pos';
                    $photos = Photo::model()->findAll($criteria);
                    foreach( $photos as $photo ) {
                        ?><li><img src="/userfiles/original/<?=$photo->name?>" alt="<?=$photo->title?>"></li><?
                    }
                    ?>
                </ul>
            </div>
            <div class="content">
                <? if($this->columns > 1 ) { ?>
                <div class="right-column">
                    <div class="curs">
                        <!--  START: курс2.рф Widget HTML 1.0--><style>table td:hover {background: none;};table td {vertical-align:middel;}table tbody td tr:hover td{background:none}</style><table cellpadding="0" cellspacing="0" style=" border-collapse: inherit;border: 1px solid #444444; width: 270px;text-shadow: none;font-family: Helvetica, Arial, sans-serif ;font-size: 14px;line-height: 1.5; background-color: #ffffff; border-radius: 2px"><thead style="text-align: center; background-color: #444444; color: #ffffff;text-shadow: 0px 0px 0px #B4B4B4;"><tr><td colspan="7" style="padding: 7px 8px 7px 8px; width: inherit; text-align: left;border-top-left-radius:2px;border-top-right-radius: 2px;"><a href="http://xn--2-stbsei.xn--p1ai/" style="text-decoration: none; font-size:19px; color: inherit; font-weight: 500">Курс валют</a><span  style="float:right; height: 23px"><a href="http://xn--2-stbsei.xn--p1ai/" rel="nofollow" style="  margin-top: 2px;display: none" target="_blank"><img title="цб рф на сегодня" style="width: 104px;height: 25px; text-align: left" src="http://xn--2-stbsei.xn--p1ai/images/logo_west.png"></a></span></td></tr></thead><tbody><tr><td colspan="7" style="visibility: visible ;font-size:13px;padding:0 0 10px 0; color: #016A06;text-align:center" id="curentData">20.07.2015</td></tr><tr ><td colspan="2" style="vertical-align: middle; padding: 0 0 7px 0;"><table cellpadding="0" cellspacing="0" style="width: inherit;margin: 0 auto; font-size: 14px; "><tr><td style="vertical-align: middle;width: 40px; display: inline-block"><a title="Курс Доллара"  href="http://курс2.рф/dollar-moscow" target="_blank" style="color:#444444;text-decoration: initial; margin-right: 10px">USD</a></td><td style="vertical-align: middle;width: 29px; display: inline-block""><a title="Курс Доллара"  href="http://курс2.рф/dollar-moscow" target="_blank"><img alt="Курс Доллара к рублю на сегодня" style=" width: 19px;margin-right: 10px" src="http://xn--2-stbsei.xn--p1ai/images/flag2/usd.png"></a></td><td colspan="1" style="vertical-align: middle; width: 50px; padding: 0;color:#444444; " id="USD_td">00.000</td><td colspan="1" style="vertical-align: middle;width:15px;"><span>руб</span><img src="http://xn--2-stbsei.xn--p1ai/images/arr_red.png" id="USD_src"></td></tr></table></td><tr ><td colspan="2" style="vertical-align: middle; padding: 0 0 7px 0;"><table cellpadding="0" cellspacing="0" style="width: inherit;margin: 0 auto; font-size: 14px; "><tr><td style="vertical-align: middle;width: 40px; display: inline-block"><a title="Курс Евро"  href="http://курс2.рф/euro-moscow" target="_blank" style="color:#444444;text-decoration: initial; margin-right: 10px">EUR</a></td><td style="vertical-align: middle;width: 29px; display: inline-block""><a title="Курс Евро"  href="http://курс2.рф/euro-moscow" target="_blank"><img alt="Курс Евро к рублю на сегодня" style=" width: 19px;margin-right: 10px" src="http://xn--2-stbsei.xn--p1ai/images/flag2/eur.png"></a></td><td colspan="1" style="vertical-align: middle; width: 50px; padding: 0;color:#444444; " id="EUR_td">00.000</td><td colspan="1" style="vertical-align: middle;width:15px;"><span>руб</span><img src="http://xn--2-stbsei.xn--p1ai/images/arr_red.png" id="EUR_src"></td></tr></table></td><tr ><td colspan="2" style="vertical-align: middle; padding: 0 0 7px 0;"><table cellpadding="0" cellspacing="0" style="width: inherit;margin: 0 auto; font-size: 14px; "><tr><td style="vertical-align: middle;width: 40px; display: inline-block"><a title="Курс Китайского юаня"  href="http://курс2.рф/yuan-moscow" target="_blank" style="color:#444444;text-decoration: initial; margin-right: 10px">CNY</a></td><td style="vertical-align: middle;width: 29px; display: inline-block""><a title="Курс Китайского юаня"  href="http://курс2.рф/yuan-moscow" target="_blank"><img alt="Курс Китайского юаня к рублю на сегодня" style=" width: 19px;margin-right: 10px" src="http://xn--2-stbsei.xn--p1ai/images/flag2/cny.png"></a></td><td colspan="1" style="vertical-align: middle; width: 50px; padding: 0;color:#444444; " id="CNY_td">00.000</td><td colspan="1" style="vertical-align: middle;width:15px;"><span>руб</span><img src="http://xn--2-stbsei.xn--p1ai/images/arr_red.png" id="CNY_src"></td></tr></table></td></tbody><tfoot><style> table > tfoot > td >a:hover{color: #000000}</style><tr><td colspan="7" style="vertical-align: middle; padding: 0 12px 5px 12px"><a style="display: inline-block;text-decoration: underline;color: #000000; font-size: 12px;" href="http://xn--2-stbsei.xn--p1ai/">конвертер валют</a><a style="float: right;text-decoration: none; display: none;color: #1BA712;text-shadow: 1px 0px 1px rgba(27, 167, 18, 0.37);font-size: 13px;" href="http://westbiz.ru" target="_blank">www.westbiz.ru</a></td></tr></tfoot><script type="text/javascript" src="http://xn--2-stbsei.xn--p1ai/b14/generateCode"></script></table><noscript><strong><a href="http://xn--2-stbsei.xn--p1ai/informer" title="информер курса валют"><h1>http://курс2.рф/informer</h1></a> <a href="http://xn--2-stbsei.xn--j1amh/informer" title="информер курса валют">информер курса валют курс2.укр</a> internet magazin, portal, catalog sait-uri <a href="http://topbiz.md/" target="_blank" title="Portalul TOPBIZ in Chisinau">topbiz.md</a> Bucătării moderne și clasice in Moldova <a href="http://amevita.md/bucatarii-la-comanda/" target="_blank" title="bucătării clasice Amevita">amevita.md</a> la preturi accesibile, <a href="http://paturi.md/dormitoare-moderne-la-comanda-chisinau.html" target="_blank" title="dormitoare Chisinau">dormitoare de la Paturi.md</a>, <a href="http://paturi.md/dormitoare-mobila-la-comanda-chisinau.html" target="_blank" title="mobila la comanda Paturi.md">Paturi.md</a> de la producator de bucatarii, mobilier</strong></noscript><!--  END: topbiz.md Widget HTML 1.0-->
                    </div>
                    <br>
                    <h2 class="popular">Популярное</h2>
                    <?
                    $pages = Stre::model()->findAllByAttributes(array(
                        'view' => 1,
                    ));
                    foreach( $pages as $child ) {
                        if( $child->attr_val('Популярный') ) {
                            $this->renderPartial('_item', array('child' => $child));
                        }
                    }
                    ?>
                </div>
                <div class="left-column">
                    <?=$content?>
                </div>
                <? } else { ?>
                    <?=$content?>
                <? } ?>
                <div class="clear"></div>
            </div>
            <div class="footer">
                &copy; <?=date('Y'); ?> cummins parts. Все права защищены.<br><br>
                <span class="desclimer">
                    Товарный знак Cummins (его словестное и графическое исполнение) принадлежит компании Cummins inc., является её зарегистрированным товарным знаком и представлен на нашем сайте в ознакомительных целях при представлении наших запасных частей.
                    Данный интернет-сайт носит исключительно информационный характер и ни при каких условиях не является публичной офертой, определяемой положениями Статьи 437 (2) Гражданского кодекса РФ.
                </span>
            </div>
        </div>

    </body>
</html>