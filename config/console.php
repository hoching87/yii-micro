<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$route = require __DIR__ . '/route.php';

$config = [
    'id' => 'micro-app-console',
    'basePath' => dirname(__DIR__),
	'aliases' => [
		'@bower' => '@vendor/bower-asset',
		'@npm'   => '@vendor/npm-asset',
	],
	'components' => [
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => $route,
        ],
    ],
	'params' => $params,
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;