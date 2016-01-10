<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'ADVANCE.CMS',
    'sourceLanguage' => 'ru_RU',
    'language' => 'ru',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.modules.user.models.*',
        'application.modules.user.components.*',
        'application.modules.rights.models.*',
        'application.modules.rights.components.*',
        'application.modules.admin.modules.page.models.*',
        'application.modules.admin.modules.news.models.*',
        'application.modules.admin.modules.email.models.*',
        'application.modules.admin.modules.catalog.models.*',
        'application.modules.admin.modules.photogallery.models.*',
        'application.modules.admin.modules.faq.models.*',
    ),
    'modules' => array(
        'user' => array(
            'tableUsers' => 'users',
            'tableProfiles' => 'profiles',
            'tableProfileFields' => 'profiles_fields',
            'user_page_size' => 10,
            'returnUrl' => '/admin/'
        ),
        'rights' => array(
            'appLayout' => 'application.modules.admin.views.layouts.adminlayout',
            'install' => true,
        ),
        'admin' => array(
            'modules' => array(
                'catalog',
                'page',
                'email',
                'photogallery',
                'faq',
                'news',
            ),
        ),
    ),
    // application components
    'components' => array(
        'widgetFactory' => array(
            'widgets' => array(
                'CButtonColumn' => array(
                    'updateButtonImageUrl' => '/css/admin/gridview/update.png',
                    'deleteButtonImageUrl' => '/css/admin/gridview/delete.png',
                ),
                'CGridView' => array(
                    'pager' => array('class' => 'CListPager'),
                    'cssFile' => '/css/admin/gridview/styles.css',
                    'template' => '{items} {pager}',
                ),
            ),
        ),
        'user' => array(
            // enable cookie-based authentication
            'class' => 'RWebUser',
            'allowAutoLogin' => true,
            'loginUrl' => array('/user/login'),
        ),
        'authManager' => array(
            'class' => 'RDbAuthManager',
            'defaultRoles' => array('Guest') // дефолтная роль
        ),
        'urlManager' => array(
            'showScriptName' => false,
            'urlFormat' => 'path',
            'rules' => array(
                array('site/index', 'pattern'=>'/', 'defaultParams'=>array('id'=>1)),
                array('site/index', 'pattern'=>'/news/', 'defaultParams'=>array('id'=>2)),
                array('site/index', 'pattern'=>'/products/', 'defaultParams'=>array('id'=>3)),
                array('site/index', 'pattern'=>'/doublicates/', 'defaultParams'=>array('id'=>4)),
                array('site/index', 'pattern'=>'/engines/', 'defaultParams'=>array('id'=>5)),
                array('site/index', 'pattern'=>'/specials/', 'defaultParams'=>array('id'=>6)),
                array('site/index', 'pattern'=>'/delivery/', 'defaultParams'=>array('id'=>7)),
                array('site/index', 'pattern'=>'/contacts/', 'defaultParams'=>array('id'=>8)),
                array('site/catalog', 'pattern'=>'/catalog/<alias:(\w|_|-)+>', 'defaultParams'=>array()),
                array('site/catalog', 'pattern'=>'/catalog/', 'defaultParams'=>array('alias' => 'products')),

                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        'db' => require('db.php'),
        'image' => array(
            'class' => 'application.extensions.image.CImageComponent',
            // GD or ImageMagick
            'driver' => 'GD',
            // ImageMagick setup path
            //'params'=>array('directory'=>'D:/Denver/ImageMagick-6.6.7-Q16'),
        ),
        'errorHandler' => array(
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),
        'clientScript' => array(
            'packages' => array(
                'jquery-1.6' => array(
                    'baseUrl' => '//ajax.googleapis.com/ajax/libs/jquery/1.6/',
                    'js' => array('jquery.min.js'),
                ),
                'jquery-1.10.1' => array(
                    'baseUrl' => '/fancybox/lib/',
                    'js' => array('jquery-1.10.1.min.js'),
                ),
            ),

        ),
    ),

    'params' => array(
        'adminEmail' => 'cumminsparts@mail.ru',
        'domain' => 'cndiesel.ru',
        'company' => 'Cummins parts',
    ),
);