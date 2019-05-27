<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);



return [
    'id' => 'app-frontend',
     'language' => 'fa-IR',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
         'urlManager' => [
        'class' => 'yii\web\UrlManager',
        // Hide index.php
        'showScriptName' => false,
        // Use pretty URLs
        'enablePrettyUrl' => true, 
        'baseUrl' => '/',
        'rules' => [
                    
 '<post:\w+>/view/<id:\d+>' => 'post/view',
 '<post:\w+>/view/<id:[\w-]+>' => 'post/view',
 'post/category'=>'post/category',
 'خرید-ssl'=>'site/ssl',
 'هاست-آلمان'=>'site/german-hosting',
 'هاست-آمریکا'=>'site/usa-hosting',
 'سرور-مجازی-آلمان'=>'site/german-vps',
 'هاست-ابری'=>'site/usa-hosting',
 'کانفیگ-سرور'=>'site/usa-hosting',
 

        ],
    ],
        
        
        'request' => [
            'baseUrl' => '/',
        ],
 
        
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        
        'jdate' => [
    'class' => 'jDate\DateTime'
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
        
	'assetManager' => [
    'bundles' => [
        'yii\web\JqueryAsset' => [
            'js'=>[]
        ],
        'yii\bootstrap\BootstrapPluginAsset' => [
            'js'=>[]
        ],
        'yii\bootstrap\BootstrapAsset' => [
            'css' => [],
        ],

    ],
],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
