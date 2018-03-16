<?php  
  
/* @var $this yii\web\View */  
  
use backend\models\ImgMultUpload;  
use kartik\file\FileInput;  
use yii\helpers\Html;  
use yii\bootstrap\ActiveForm;  
use yii\helpers\Url;  
  
$this->title = 'test';  
  
?>  
  
<?php $form = ActiveForm::begin([  
    'layout' => 'horizontal',  
    'enableAjaxValidation' => false,  
    'method' => 'post',  
    'options' => ['enctype' => 'multipart/form-data'],  
    'fieldConfig' => [  
        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{endWrapper}",  
        'horizontalCssClasses' => [  
            'label' => 'col-lg-2',  
            'wrapper' => 'col-lg-6',  
            'error' => 'col-lg-3',  
            'hint' => '',  
        ],  
    ]  
]); ?>  
  
<?= ImgMultUpload::widget(['label' => '产品图片', 'imgarr' => [  
    '1987acba6a8d4ea394356080f626e1ad.jpg',  
    'bafc12233dc14acfb4cba448b8f0d947.jpg'  
], 'imagedir' => '/uploads/temp/']); ?>  
<?php  
ActiveForm::end();  
?> 