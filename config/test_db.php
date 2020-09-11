<?php
$db = require __DIR__ . '/db.php';
// test database! Important not to run tests on production or development databases
//$db['dsn'] = 'mysql:host=localhost;dbname=yii2_basic_tests';
$db['dsn'] = ['pgsql:host=localhost;port=5456;dbname=currencyinfo',
    'username' => 'currencyinfo',
    'password' => 'currencyinfo',
    'charset' => 'utf8',];

return $db;

