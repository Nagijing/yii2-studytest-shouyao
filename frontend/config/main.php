<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'bootstrap' => ['log'],
	'defaultRoute'=>'drug/index',
	'language' => 'zh-CN',
    'components' => [
    	'request'=>[
				'enableCookieValidation' => true,
				'enableCsrfValidation' => true,
    			'cookieValidationKey'=>'nagisa',
    			'csrfParam'=>'_userCSRF',
                    ],				
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
			'enableSession'=>false
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
		


       'urlManager' => [
            'enablePrettyUrl' => true,//打开url美化
            'showScriptName' => false,//展示文件名
        	'suffix'=>'.html',//后缀
            'rules' => [
            '<controller:\w+>/<id:\d+>'=>'<controller>/index',
            'drug'=>'durg/index',
            ],
        ],
    ],
    'params' => $params,
];
