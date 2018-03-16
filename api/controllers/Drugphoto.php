<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "drug_photo".
 *
 * @property string $id
 * @property string $img
 */
class Drugphoto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'drug_photo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'img'], 'required'],
            [['id'], 'integer'],
            [['img'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img' => 'Img',
        ];
    }
}
