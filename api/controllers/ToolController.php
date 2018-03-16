<?php
namespace backend\controllers;

use yii;
use yii\web\Controller;
use backend\models\Upload;
use yii\web\UploadedFile;
class ToolController extends Controller
{
    /**
     *    文件上传
     *  我们这里上传成功后把图片的地址进行返回
     */
   public function actionIndex()
   {
       return $this->render('index');
   }
   
   
    public function actionUpdates ()
    {
		//$this->layout = false;
        $model = new Upload();
        $uploadSuccessPath = "";
        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, "file");
            //文件上传存放的目录
            $dir = "../../uploads/".date("Ymd");
            if (!is_dir($dir)){
			mkdir($dir);}
            if ($model->validate()) {
                //文件名
                $fileName = date("HiiHsHis").$model->file->baseName . "." . $model->file->extension;
                $dir = $dir."/". $fileName;
                $model->file->saveAs($dir);
                $uploadSuccessPath = "/uploads/".date("Ymd")."/".$fileName;
            }
        }
        return $this->render("updates", [
            "model" => $model,
            "uploadSuccessPath" => $uploadSuccessPath,
        ]);
    }
}