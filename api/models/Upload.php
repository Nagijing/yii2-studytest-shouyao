<?php
namespace backend\models;

use Yii;
use yii\base\Model;
//use yii\web\UploadedFile;
//use kartik\file\FileInput;
class Upload extends Model
{
    /**
     * @var UploadedFile|Null file attribute
     */
    public $file;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['file'], 'file'],
        ];
    }
	
	    public function attributeLabels(){  
        return [  
            'file'=>'文件上传',  
        ];  
    }
}