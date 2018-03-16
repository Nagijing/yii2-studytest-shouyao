<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
//use frontend\components\TagsCloudWidget;
//use frontend\components\RctReplyWidget;

use yii\helpers\HtmlPurifier;
//use common\models\Comment;
use yii\helpers\Url;


?>
<div class='drug'>

      <div class="content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>欢迎来到</strong> 兽药销售管理系统</h1>
                            <div class="description">
                            	<p>
	                            	               请点击下面的按钮来进行登录或注册</br> 
	                            	如果忘记帐号密码请点击 <a href="<?= Url::to(['drug/index']);?>"><strong>找回密码</strong></a>即可。
                            	</p>
                            </div>
                            <div class="top-big-link">
                            	<a class="btn btn-link-1 launch-modal" href="<?= Url::to(['drug/index']);?>" data-modal-id="modal-register">登录/注册</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- MODAL -->
        <div class="modal fade" id="modal-register" tabindex="-1" role="dialog" aria-labelledby="modal-register-label" aria-hidden="true">
        	<div class="modal-dialog">
        		<div class="modal-content">
        			
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">
        					<span aria-hidden="true">&times;</span><span class="sr-only">关闭</span>
        				</button>
        				<h3 class="modal-title" id="modal-register-label">立即注册！</h3>
        				<p>请按顺序填写你的帐号密码邮箱</p>
        			</div>
        			
        			<div class="modal-body">
        				
	                    <form role="form" action="" method="post" class="registration-form">
	                    	<div class="form-group">
	                    		<label class="sr-only" for="form-first-name">帐号</label>
	                        	<input type="text" name="form-first-name" placeholder="请填写帐号..." class="form-first-name form-control" id="form-first-name">
	                        </div>
	                        <div class="form-group">
	                        	<label class="sr-only" for="form-last-name">密码</label>
	                        	<input type="text" name="form-last-name" placeholder="请填写密码..." class="form-last-name form-control" id="form-last-name">
	                        </div>
	                        <div class="form-group">
	                        	<label class="sr-only" for="form-email">再输一次密码</label>
	                        	<input type="text" name="form-email" placeholder="请再输一次密码..." class="form-email form-control" id="form-email">
	                        </div>
	                        <div class="form-group">
	                        	<label class="sr-only" for="form-about-yourself">邮箱</label>
	                        	<input type="text" name="form-about-yourself" placeholder="请输入邮箱..." 
	                        				class="form-about-yourself form-control" id="form-about-yourself">
	                        </div>
	                        <button type="submit" class="btn" href="<?= Url::to(['drug/signup']);?>">注册</button>
	                    </form>
	                    
        			</div>
        			
        		</div>
        	</div>
        </div>
