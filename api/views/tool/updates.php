<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Upload;
use kartik\file\FileInput;
//use backend\assets\AppAsset;

//AppAsset::register($this);
//AppAsset::addScript($this,'@app/kartik-v/bootstrap-fileinput/js/fileinput.min.js');
//AppAsset::addCss($this,'@app/kartik-v/bootstrap-fileinput/css/fileinput.min.css');
?>
<?php $form = ActiveForm::begin([
    'options' => ['enctype'=>'multipart/form-data'],
]); ?>
<?= $form->field($model, "file")->widget(FileInput::classname(), [
    'options' => ['multiple' => true], 
    'pluginOptions' => [
        // 需要预览的文件格式
        'previewFileType' => 'image',
        // 预览的文件
        //'initialPreview' => ['图片1', '图片2', '图片3'],
        // 需要展示的图片设置，比如图片的宽度等
        'initialPreviewConfig' => ['width' => '120px'],
        // 是否展示预览图
        'initialPreviewAsData' => true,
        // 异步上传的接口地址设置
        //'uploadUrl' => Url::toRoute(['/goods/async-image']),
        // 异步上传需要携带的其他参数，比如商品id等
        //'uploadExtraData' => [
         //   'goods_id' => $id,
        //],
        'uploadAsync' => true,
        // 最少上传的文件个数限制
        //'minFileCount' => 1,
        // 最多上传的文件个数限制
       // 'maxFileCount' => 10,
        // 是否显示移除按钮，指input上面的移除按钮，非具体图片上的移除按钮
        'showRemove' => true,
        // 是否显示上传按钮，指input上面的上传按钮，非具体图片上的上传按钮
        'showUpload' => true,
        //是否显示[选择]按钮,指input上面的[选择]按钮,非具体图片上的上传按钮
        'showBrowse' => true,
        // 展示图片区域是否可点击选择多文件
        'browseOnZoneClick' => true,
        // 如果要设置具体图片上的移除、上传和展示按钮，需要设置该选项
        'fileActionSettings' => [
            // 设置具体图片的查看属性为false,默认为true
            'showZoom' => false,
            // 设置具体图片的上传属性为true,默认为true
            'showUpload' => true,
            // 设置具体图片的移除属性为true,默认为true
            'showRemove' => true,
        ],
		],
	]);?>

<?php ActiveForm::end(); ?>
<?php $this->endBody() ?>