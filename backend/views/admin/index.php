<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '管理员管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
		    'id',
            'username',
            'name',
            'email:email',
			['attribute' => 'createtime',
			'format' => ['date','php:Y-m-d H:i:s'],
			],
			['attribute' => 'last_time',
			'format' => ['date','php:Y-m-d H:i:s'],
			],
			 //'password',
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',

            ['class' => 'yii\grid\ActionColumn',
            		'template'=>'{view} {update} {resetpwd} {privilege} {delete}',
            		'buttons'=>[
            				'resetpwd'=>function($url,$model,$key)
            				{
            					$options=[
            							'title'=>Yii::t('yii','重置密码'),
            							'aria-label'=>Yii::t('yii','重置密码'),
            							'data-pjax'=>'0',
            							];
            					return Html::a('<span class="glyphicon glyphicon-lock"></span>',$url,$options);
            				},
            				
            				'privilege'=>function($url,$model,$key)
            				{
            					$options=[
            							'title'=>Yii::t('yii','权限'),
            							'aria-label'=>Yii::t('yii','权限'),
            							'data-pjax'=>'0',
            					];
            					return Html::a('<span class="glyphicon glyphicon-user"></span>',$url,$options);
            				},
            				
    ],
    ],
        ],
    ]); ?>
	
	    <p>
        <?= Html::a('新建管理员', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	
	    <p>
        <?= Html::a('返回首页', ['index'], ['class' => 'btn btn-primary']) ?>
    </p>
</div>
