<?php
return[
    'components' =>[
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'pgsql:host=localhost;port=5456;dbname=cipgsql',
            'username' => 'currencyinfo',
            'password' => 'currencyinfo',
            'charset' => 'utf8',
        ],
    ]
];