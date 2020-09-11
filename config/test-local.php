<?php
return yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/console.php'),
    require(__DIR__ . '/console-local.php'),
    require(__DIR__ . '/test.php'),
    [
        'components' => [
            'db' => [
                'dsn' => 'pgsql:host=pgsql-test;port=5432;dbname=billing_test',
                'username' => 'billing_test',
                'password' => 'billing_test',
                'charset' => 'utf8',
            ]
        ],
    ]
);
