<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/5
 * Time: 11:12
 */
$c = [
    'default_route' => [
        "group" => "home",
        "controller" => "index",
        "action" => "index"
    ],

    'db' => [
        'dsn' => 'mysql:dbname=classicstyle;host=localhost:3306',
        'username' => 'root',
        'password' => '888',
        'option' => array(PDO::ATTR_PERSISTENT => TRUE, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_ORACLE_NULLS => true)
    ]
];