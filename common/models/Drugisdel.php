<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "drug_is_del".
 *
 * @property string $id
 * @property string $is_del
 * @property integer $position
 *
 * @property Drug[] $drugs
 */
class Drugisdel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'drug_is_del';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_del', 'position'], 'required'],
            [['position'], 'integer'],
            [['is_del'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'is_del' => 'Is Del',
            'position' => 'Position',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDrugs()
    {
        return $this->hasMany(Drug::className(), ['is_delid' => 'id']);
    }
}
