<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '登录';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>请先填写用户名和密码进行登录：</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $validationUrl = ['validate-form'];
			      if(!$model->isNewRecord){
					  $validationUrl['id'] = $model->id;
				  }
				  
				  $form = ActiveForm::begin([
			'id' => 'login-form',
			'enableAjaxValidation' => true,
			'validationUrl' => $validationUrl,
			]); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    如果你忘记了密码可以通过点击<?= Html::a('找回密码', ['site/request-password-reset']) ?>来找回。
                </div>

                <div class="form-group">
                    <?= Html::submitButton('登录', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
