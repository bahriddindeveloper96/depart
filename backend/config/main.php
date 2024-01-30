<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'language' => 'uz',
    'modules' => [
        
        'gridview' => [
        'class' => 'kartik\grid\Module',],
    	'gii' => [
	    'class' => 'yii\gii\Module',
	    'allowedIPs' => ['127.0.0.1', '::1', '192.168.1.*', 'XXX.XXX.XXX.XXX']
	]
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'baseUrl' => '/admin',
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
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'ko\'rsatma/taqiqlash/' => 'caution/embargo/index',
                'ko\'rsatma/bartaraf_etish/' => 'caution/prevention/index',
                'ko\'rsatma/taqiqlash/<id:\d+>' => 'caution/embargo/view',
                'ko\'rsatma/bartaraf_etish/<id:\d+>' => 'caution/prevention/view',
                'ko\'rsatma/taqiqlash/tahrirlash/<id:\d+>' => 'caution/embargo/update',
                'ko\'rsatma/bartaraf_etish/tahrirlash/<id:\d+>' => 'caution/prevention/update',
                
            ],
        ],

    ],
    'params' => $params,
];
