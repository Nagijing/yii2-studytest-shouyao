<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Admin;

/* @var $this yii\web\View */
/* @var $model common\models\Adminuser */

$model = Admin::findOne($id);

$this->title = '权限设置: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => '管理员管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $id]];
$this->params['breadcrumbs'][] = '权限设置';
?>

<div class="admin-update">

    <h1><?= Html::encode($this->title) ?></h1>


    <div class="admin-privilege-form">

    <?php $form = ActiveForm::begin(); ?>

	<?= Html::checkboxList('newPri',$AuthAssignmentArray,$allPrivilegesArray);?>

    <div class="form-group">
        <?= Html::submitButton('设置') ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>



</div>




