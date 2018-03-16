<?php
use yii\helpers\Html;
use common\models\Drug;
?>

<div class="drug">
	<div class="title">
		<h2><a href="<?= $model->url;?>"><?= Html::encode($model->drugname);?></a></h2>
	
