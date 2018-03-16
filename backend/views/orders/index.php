<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '订单信息';
$this->params['breadcrumbs'][] = '订单管理';
?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'order_no',
            'userid',
            'orderstatus',
            'paystatus',
            // 'acceptname',
            // 'postcode',
            // 'telphone',
            // 'country',
            // 'province',
            // 'city',
            // 'area',
            // 'address',
            // 'mobile',
            // 'amount',
            // 'is_send',
            // 'ordertime',
            // 'completiontime',
            // 'if_del',
            // 'allamount',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
