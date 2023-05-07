<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$route = require __DIR__ . '/route.php';

$config = [
    'id' => 'micro-app',
    'basePath' => dirname(__DIR__),
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
    // configuration adjustments for 'dev' environment
    // $config['bootstrap'][] = 'debug';
    // $config['modules']['debug'] = [
    //     'class' => 'yii\debug\Module',
    //     // uncomment the following to add your IP if you are not connecting from localhost.
    //     //'allowedIPs' => ['127.0.0.1', '::1'],
    // ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;