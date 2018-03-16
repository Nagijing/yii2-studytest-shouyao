<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = '兽药销售管理系统';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>恭喜你成功登录</h1>

        <p class="lead">请根据导航执行你需要的操作</p>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>用户管理</h2>

                <p><a class="btn btn-default" href="<?= Url::to(['user/index']);?>">点击进入： &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>药品管理</h2>

                <p><a class="btn btn-default" href="<?= Url::to(['drug/index']);?>">点击进入： &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>订单管理</h2>

                <p><a class="btn btn-default" href="<?= Url::to(['orders/index']);?>">点击进入： &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
