<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'bootstrap' => [
        'queue',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => \yii\caching\FileCache::class,
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
