<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Drug */

$this->title = '创建新的药品';
$this->params['breadcrumbs'][] = ['label' => '药品管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="drug-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
