<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'Syarah',
    'basePath' => dirname(__DIR__),
    'defaultRoute' => 'car-listing/index',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'storefront\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-bbbgsa',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-storefront', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the storefront
            'name' => 'advanced-storefront',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
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
            ],
        ],
        
    ],
    'params' => $params,
];
