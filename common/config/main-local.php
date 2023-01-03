<?php

return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=modelodual',
            'username' => 'modelodual',
            'password' => 'abc123$$',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'soporte.dual@valladolid.tecnm.mx',
                'password' => 'Sistema-dual2023$',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
    ],
];
