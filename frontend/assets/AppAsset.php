<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
		//'assets/bootstrap/css/bootstrap.min.css',
		//'assets/css/form-elements.css',
		//'assets/css/style.css',
    ];
    public $js = [
	//'assets/js/jquery-1.11.1.min.js',
	//'assets/bootstrap/js/bootstrap.js',
	//'assets/js/jquery.backstretch.min.js',
	//'assets/js/scripts.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
	
	  /**定义按需加载JS方法，注意加载顺序在最后  
    public static function addScript($view, $jsfile) {  
        $view->registerJsFile($jsfile, [AppAsset::className(), 'depends' => 'frontend\assets\AppAsset']);  
    }  
      
   //定义按需加载css方法，注意加载顺序在最后  
    public static function addCss($view, $cssfile) {  
        $view->registerCssFile($cssfile, [AppAsset::className(), 'depends' => 'frontend\assets\AppAsset']);  
    }    
***/
}
