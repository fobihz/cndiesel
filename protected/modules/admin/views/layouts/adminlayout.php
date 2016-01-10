<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <title>AdvanceCMS | web-студия ADVANCE</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" type="text/css" href="/css/admin/style.css"/>
    <link rel="shortcut icon" href="/images/admin/favicon.ico"/>

</head>
<body>
<div id="wrapper">

    <div id="header">
        <div id="header-left"></div>
        <div id="header-right">

            <table cellpadding="5" align="right">
                <tr>
                    <td align="center">
                        <img src="/images/admin/user_1.png" alt="пользователь"/> <br/><?= Yii::app()->user->name; ?>
                    </td>
                    <td align="center">
                        <a href="/"> <img src="/images/admin/go-home.png" alt="выйти"/><br/>на сайт</a>
                    </td>
                    <td align="center">
                        <a href="/user/logout"> <img src="/images/admin/exit_1.png" alt="выйти"/><br/>выйти</a>
                    </td>
                </tr>
            </table>


        </div>
        <div id="header-center"></div>
    </div>
    <div id="mmenu">
        <ul>
            <li><a href="/admin/page/"><img height="50" src="/images/admin/pages.png" alt="страницы"/><br/>страницы сайта</a>
            </li>
            <li><a href="/admin/catalog/default/viewcatalog/id/50/"><img height="50" src="/images/admin/catalog.png" alt="каталоги"/><br/>продукция</a></li>
            <li><a href="/admin/photogallery/photogallery/update/id/4/"><img height="50" src="/images/admin/photogallery.png" alt="слайдер" /><br/>слайдер</a></li>

            <!--<li><a href="/admin/camps/camps"><img height="50" src="/images/admin/camp.png" alt="лагеря"/><br/>лагеря</a>
            </li>

            <li><a href="#"><img height="50" src="/images/admin/lists.png" alt="списки страниц" /><br/>списки страниц</a></li>
            <li><a href="/admin/catalog/"><img height="50" src="/images/admin/catalog.png" alt="каталоги" /><br/>каталоги</a></li>
            <li><a href="/admin/photogallery/"><img height="50" src="/images/admin/photogallery.png" alt="каталоги" /><br/>фотогалереи</a></li>
             <li><a href="/admin/faq/"><img height="50" src="/images/admin/faq.png" alt="каталоги" /><br/>вопрос-ответ</a></li>
            <li><a href="/user/"><img height="50" src="/images/admin/siteusers2.png" alt="каталоги" /><br/>пользователи</a></li>
            <li><a href="/admin/email/"><img height="50" src="/images/admin/emails.png" alt="каталоги" /><br/>e-mails</a></li>
            -->
        </ul>


    </div>
    <div id="content">
        <? $this->widget('zii.widgets.CBreadcrumbs', array('homeLink' => "<a href='/admin/'>Админка</a>",
            'links' => $this->breadcrumbs,
        )); ?>
        <?= $content ?>

        <br/><br/>
    </div>
    <div id="footer">
        Создание сайта © web-студия <span><a href="http://www.advance-nsk.ru">ADVANCE</a></span>, <?= date('Y'); ?>г.
    </div>
</div>
</body>
</html>
<?
$this->widget('application.extensions.qtip.Qtip',
    array(
        "selector" => ".qtipm[title]",
        "options" => "{
                                        position: {
                                            my: 'bottom left',
                                            at: 'top right',
                                            viewport: $(window),
                                            adjust: {
                                                method: 'flip'
                                            }
                                        }
                                    }"
    )
);
?>