<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Drugisdel;
use common\models\Drugsellname;

/* @var $this yii\web\View */
/* @var $model common\models\Drug */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="drug-form">

    <?php $form = ActiveForm::begin([
	]); ?>

    <?= $form->field($model, 'drugid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'drugname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'store_nums')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_delid')->dropDownList(Drugisdel::find()
						->select(['is_del','id'])
             		    ->orderBy('position')
						->indexBy('id')
						->column(),
    		   ['prompt'=>'请选择']);	?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sellerid')->dropDownList(Drugsellname::find()
						->select(['name','id'])
             		    ->orderBy('position')
						->indexBy('id')
						->column(),
    		   ['prompt'=>'请选择']); ?>
			   
    <div class="form-group">
	
        <?= Html::submitButton($model->isNewRecord ? '创建' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
