<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Userstatus;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户信息';
$this->params['breadcrumbs'][] = '用户管理';
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

           ['attribute'=>'id',
            'contentOptions'=>['width'=>'30px'],
             ],
            'username',
            'email:email',
            [
            'attribute'=>'status',
            'value'=>'status0.name',
            'filter'=>Userstatus::find()
            		  ->select(['name','id'])
            		  ->orderBy('position')
            		  ->indexBy('id')
            		  ->column(),
            'contentOptions'=>
            		function($model)
            		{
            			return ($model->status==1)?['class'=>'bg-danger']:[];
            		}
            ],
           ['attribute'=>'created_at',
            'format'=>['date','php:Y-m-d H:i:s'],
             ],
	       ['attribute'=>'updated_at',
            'format'=>['date','php:Y-m-d H:i:s'],
             ],
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            // 'status',
            // 'created_at',
            // 'updated_at',

           [
            'class' => 'yii\grid\ActionColumn',
            'template'=>'{update} {delete} {approve}',
            'buttons'=>
            	[
            	'approve'=>function($url,$model,$key)
            			{
            				$options=[
            					'title'=>Yii::t('yii', '审核'),
            					'aria-label'=>Yii::t('yii','审核'),
            					'data-confirm'=>Yii::t('yii','你确定审核通过这个用户吗？'),
            					'data-method'=>'post',
            					'data-pjax'=>'0',
            						];
            				return Html::a('<span class="glyphicon glyphicon-check"></span>',$url,$options);
            				
            			},
            	],	
            		

            		
            ],
        ],
    ]); ?>
</div>
