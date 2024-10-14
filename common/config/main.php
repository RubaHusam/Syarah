<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'bootstrap' => [
        'queue',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
       
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'image/upload' => 'image/upload',
            ],
        ],
        // 'cache' => [
        //     'class' => \yii\caching\FileCache::class,
        // ],
        'cache' => [
            'class' => 'yii\redis\Cache',
            'redis' => 'redis',
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => 'localhost',
            'port' => 6379,
            'database' => 0,
        ],
        'queue' => [
            'class' => \yii\queue\db\Queue::class,
            'db' => 'db', // Database connection component
            'tableName' => '{{%queue}}', // Name of the table to store queue data
            'channel' => 'default', // Queue channel
            'mutex' => [
                'class' => \yii\mutex\MysqlMutex::class, // Use appropriate mutex for your DB
            ],
        ],
    ],

];
