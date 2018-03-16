<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DrugSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="drug-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'drugid') ?>

    <?= $form->field($model, 'drugname') ?>

    <?= $form->field($model, 'price') ?>

    <?= $form->field($model, 'createtime') ?>

    <?php // echo $form->field($model, 'updatetime') ?>

    <?php // echo $form->field($model, 'store_nums') ?>

    <?php // echo $form->field($model, 'is_delid') ?>

    <?php // echo $form->field($model, 'img') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'sellerid') ?>

    <?php // echo $form->field($model, 'role_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
