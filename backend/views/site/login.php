<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '兽药销售管理系统后台';
$this->params['breadcrumbs'][] = '登录';
?>
<div class="site-login">
    <h1>欢迎来到<?= Html::encode($this->title) ?></h1>

    <p>请输入用户名和密码进行登录：</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin([
			'id' => 'login-form',
			]); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                <?= $form->field($model,'VerifyCode')->widget(yii\captcha\Captcha::className()
                                        ,['captchaAction'=>'site/captcha',
                                        'imageOptions'=>['alt'=>'点击换图',
										'title'=>'点击换图', 
										'style'=>'cursor:pointer']]);?>
                <div class="form-group">
                    <?= Html::submitButton('登录', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
