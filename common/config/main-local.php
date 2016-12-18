<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'pgsql:host=ec2-54-235-112-37.compute-1.amazonaws.com;dbname=ddsiuljdk1irqr',
            'username' => 'zbsezklgjldxgj',
            'password' => 'e6d21956806b6f2e9ba00f6bf71885d64385b56fb2027ee8e0d37c682fe317cc',
            'charset' => 'utf8',
        ],/*
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=scarpadb',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],*/
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
        ],
    ],
];
