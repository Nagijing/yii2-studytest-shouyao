<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
//use yii\bootstrap\Modal;
use yii\helpers\Url;

$this->title = '兽药销售管理系统';
$this->params['breadcrumbs'][] ='登录';
?>
<div class="drug-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>请先填写用户名和密码进行登录：</p>

    <div class="row">
        <div class="col-lg-5">
		<?php $form = ActiveForm::begin([
			'id' => 'login-form',
			//'enableAjaxValidation' => true,
			//'validationUrl' => Url::toRoute(['validate-form']),
			]); ?>		

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    如果你忘记了密码可以通过点击<?= Html::a('找回密码', ['drug/request-password-reset']) ?>来找回。
                </div>
				
                <?= $form->field($model,'VerifyCode')->widget(yii\captcha\Captcha::className()
                                        ,['captchaAction'=>'drug/captcha',
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
