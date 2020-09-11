<?php

return [
//    'class' => 'yii\db\Connection',
//    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
//    'username' => 'root',
//    'password' => '',
//    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=localhost;port=5456;dbname=currencyinfo',
    'username' => 'currencyinfo',
    'password' => 'currencyinfo',
    'charset' => 'utf8',
];
