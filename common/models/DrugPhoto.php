<?php

namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;

/**
 * This is the model class for table "drug_photo".
 *
 * @property string $photo_id
 * @property string $img
 *
 * @property DrugPhotoRelation[] $drugPhotoRelations
 */
class DrugPhoto extends Model
{
	public $file;
    /**
     * @inheritdoc
     */

    public function rules()
    {
        return [
            [['file'], 'file'],
        ];
    }


}
