<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use frontend\components\TagsCloudWidget;
use frontend\components\RctReplyWidget;
use common\models\Drug;
use yii\caching\DbDependency;
use yii\caching\yii\caching;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '兽药销售管理系统';
?>
<div class='drug-index'>

      <div class="content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>欢迎来到</strong> 兽药销售管理系统</h1>
							<?= ListView::widget([
							'id' =>'drugList',
                            'dataProvider' => $dataProvider,
							'itemView' => '_listitem',
							'layout' => '{items} {pager}',
							'pager' => [
							'maxButtonCount' =>10,
							'nextPageLabel' => yii::t('app','下一页'),
							'prevPageLabel' => yii::t('app','上一页'),
							],
							])?>

                        </div>
                    </div>
                </div>
            </div>
            
        </div>
       