<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Drugisdel;


/* @var $this yii\web\View */
/* @var $searchModel common\models\DrugSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '药品管理';
$this->params['breadcrumbs'][] = '药品信息';
?>
<div class="drug-index">

    <h1><?= Html::encode($this->title) ?></h1>
	
    <p>
        <?= Html::a('创建新的药品信息', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['attribute'=>'id',
            'contentOptions'=>['width'=>'30px'],
            ],
            'drugid',
            'drugname',			
            ['attribute'=>'is_delid',
            'value'=>'isDel.is_del',
            'filter'=>Drugisdel::find()
            		->select(['is_del','id'])
            		->orderBy('position')
            		->indexBy('id')
            		->column(),
   			 ],
             'price',
			 
 			['attribute' => 'updatetime',
			'format' => ['date','php:Y-m-d H:i:s'],
			],
			
            //'createtime',
            // 'updatetime',
            // 'store_nums',
            // 'is_delid',
            // 'img',
            // 'content:ntext',
            // 'sellerid',
            // 'role_id',
           [ 'class' => 'yii\grid\ActionColumn',],
           /**** ['class' => 'yii\grid\ActionColumn',
			'template'=>'{view} {update} {delete} {create}',
			'buttons'=>[
            				'create'=>function($url,$model,$key)
            				{
								$options=[
            							'title'=>Yii::t('yii','创建'),
            							'aria-label'=>Yii::t('yii','创建'),
            							'data-pjax'=>'0',
            							];
            					return Html::a('<span class="glyphicon glyphicon-plus"></span>',$url,$options);
            				},
			],     添加创建小按钮
			],****/
        ],
    ]); ?>
	
</div>
