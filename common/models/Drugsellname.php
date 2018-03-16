<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "drug_sellname".
 *
 * @property string $id
 * @property string $name
 * @property string $position
 *
 * @property Drug[] $drugs
 */
class Drugsellname extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'drug_sellname';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'position'], 'required'],
            [['position'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'position' => 'Position',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDrugs()
    {
        return $this->hasMany(Drug::className(), ['sellerid' => 'id']);
    }
}
