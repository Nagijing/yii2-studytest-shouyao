<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
	'language'=> 'zh-CN',
	'defaultRoute'=>'site/index',
    'modules' => [],
    'components' => [
    	'request'=>[
				'enableCookieValidation' => true,
				'enableCsrfValidation' => true,
    			'cookieValidationKey'=>'sdfjjksloeedf78789judf',
    			'csrfParam'=>'_adminCSRF',
        ],
        'user' => [
            'identityClass' => 'common\models\Admin',
            'enableAutoLogin' => true,
        ],
    	'session'=>[
    			'name'=>'NAGISABACKEND',
    			'savePath'=>sys_get_temp_dir(),
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
        
       /**'urlManager' => [
            'enablePrettyUrl' => true,//打开url美化
            'showScriptName' => false,//展示文件名
        	'suffix'=>'.html',//后缀
            'rules' => [
            '<controller:\w+>/<id:\d+>'=>'<controller>/index',
            'drugs'=>'durg/index',
            ],
        ],**/
        
    ],
    'params' => $params,
];
