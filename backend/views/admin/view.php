<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Adminuser */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => '管理员管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adminuser-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'name',
            'email:email',
			
        ],
    ]) ?>
	
	    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>
	
	    <p>
        <?= Html::a('返回上一页', ['index', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

</div>
