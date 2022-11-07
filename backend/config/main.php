<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'name' => "Sistema Dual",
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'language'=>'es', // Este es el lenguaje en el que querés que muestre las cosas
    'sourceLanguage'=>'en',
    'bootstrap' => ['log'],
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'left-menu', // por defaults es null, cuando no deseas usar el menú 
            // Otros valores opcionales son 'right-menu' and 'top-menu' 
        ]
    ],
    'components' => [

        'formatter' => [

            'dateFormat' => 'dd-MM-yyyy',

            'datetimeFormat' => 'php:d-m-Y H:i',

        ],

        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
        ],
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            //'enablePrettyUrl' => true,
            //'showScriptName' => false,
            'rules' => [
            ],
        ],

        'urlManagerFrontEnd' => [

            'enablePrettyUrl' => false,

			'class' => 'yii\web\UrlManager',

			'showScriptName'=>false,

			'hostInfo' => 'http://localhost/',

			'baseUrl' => 'http://localhost/modelo-dual/frontend/web',
        ],
    ],

    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            //'site/*',
            //'admin/*',
            'site/login',
            'site/signup',
            'site/logout',
            'site/verify-email',
            //'some-controller/some-action',
            // The actions listed here will be allowed to everyone including guests.
            // So, 'admin/*' should not appear here in the production, of course.
            // But in the earlier stages of your development, you may probably want to
            // add a lot of actions here until you finally completed setting up rbac,
            // otherwise you may not even take a first step.
        ]
    ],

    'params' => $params,
];
