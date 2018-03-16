<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Drug */

$this->title = '修改药品信息：' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '药品管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => '药品信息', 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改药品信息';
?>
<div class="drug-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
