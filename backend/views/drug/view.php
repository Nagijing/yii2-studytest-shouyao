<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Drug */

$this->title = '药品信息：'.$model->id;
$this->params['breadcrumbs'][] = ['label' => '药品管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = '药品信息';
?>
<div class="drug-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'drugid',
            'drugname',
            'price',
        	[
        	'attribute' => 'createtime',
        	'value'=>date("Y-m-d H:i:s",$model->createtime),
    		],
        	[
        	'attribute' => 'updatetime',
        	'value' => date("Y-m-d H:i:s",$model->updatetime),
    		],
            'store_nums',
            //'is_delid',
			['attribute' => 'is_delid',
			'value' => $model -> isDel ->is_del,
			],
            'img',
            'content:ntext',
            //'sellerid',
			['attribute' => 'sellerid',
			'value' => $model -> seller ->name,
			],
            //'role_id',
        ],
    ]) ?>
	
	 <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '你真的要删除这条内容吗？',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
