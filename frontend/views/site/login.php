<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use kartik\datetime\DateTimePicker;

$this->title = '登录';
$this->params['breadcrumbs'][] = $this->title;

DateTimePickerAsset::register($this);
echo '<label>Start Date/Time</label>';
echo DateTimePicker::widget([
 'name' => 'datetime_10',
 'options' => ['placeholder' => 'Select operating time ...'],
 'convertFormat' => true,
 'pluginOptions' => [
     'format' => 'd-M-Y g:i A',
     'startDate' => '11-Mar-2018 06:18 AM',
     'todayHighlight' => true,
 ]
]);
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>请先填写用户名和密码进行登录：</p>

    <div class="row">
        <div class="col-lg-5">
		<?php $form = ActiveForm::begin([
			'id' => 'form-id',
			'enableAjaxValidation' => true,
			'validationUrl' => Url::toRoute(['validate-form']),
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
