<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$route = require __DIR__ . '/route.php';

$config = [
    'id' => 'micro-app',
    'basePath' => dirname(__DIR__),
	'aliases' => [
		'@bower' => '@vendor/bower-asset',
		'@npm'   => '@vendor/npm-asset',
	],
	'components' => [
		'request' => [
			// !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
			'cookieValidationKey' => 'yMeP77sAVkPGlbMDho_4OqJHIse-Nogy',
		],
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