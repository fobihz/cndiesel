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
                <div class="logo-1"><a href="/"><img src="/images/logo.jpg" alt="cummins"></a></div>
                <div class="slogan">Оригинальные запчасти и новые двигатели Cummins напрямую от производителя</div>
                <div class="logo-2"><a href="/"><img src="/images/logo-2.png" alt="cummins"></a></div>

            </div>
            <div class="menu">
                <ul>
                    <li><a href="/">Главная</a></li>
                    <li><a href="/news/">Новости</a></li>
                    <li><a href="/products/">Продукция</a>
                        <ul>
                            <li><a href="/doublicates/">Запчасти</a></li>
                            <li><a href="/engines/">Двигатели</a></li>
                            <li><a href="/specials/">Спецтехника</a></li>
                        </ul>
                    </li>
                    <li><a href="/delivery/">Доставка</a></li>
                    <li><a href="/contacts/">Контакты</a></li>
                </ul>
            </div>
            <div class="animation">
                <ul id="pictures-demo">
                    <li>
                        <img src="/images/1.jpg" alt="photo_1">
                    </li>
                    <li>
                        <img src="/images/2.jpg" alt="photo_2">
                    </li>
                    <li>
                        <img src="/images/3.jpg" alt="photo_3">
                    </li>
                    <li>
                        <img src="/images/4.jpg" alt="photo_4">
                    </li>
                    <li>
                        <img src="/images/5.jpg" alt="photo_5">
                    </li>
                    <li>
                        <img src="/images/6.jpg" alt="photo_6">
                    </li>
                </ul>

            </div>
            <div class="content"><?=$content?></div>
            <div class="footer">
                &copy; <?=date('Y'); ?> cummins parts. Все права защищены.
            </div>
        </div>

    </body>
</html>