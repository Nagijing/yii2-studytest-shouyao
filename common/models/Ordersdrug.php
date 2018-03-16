<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "orders_drug".
 *
 * @property string $id
 * @property string $orderid
 * @property string $drugid
 * @property string $drugname
 * @property string $img
 * @property string $drug_price
 * @property string $drug_nums
 * @property string $drug_array
 * @property string $is_send
 * @property string $is_free
 *
 * @property Orders $order
 * @property Drug $drug
 */
class Ordersdrug extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders_drug';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orderid', 'drugid', 'drug_nums', 'is_send', 'is_free'], 'integer'],
            [['drugname', 'drug_nums', 'drug_array', 'is_send', 'is_free'], 'required'],
            [['drug_price'], 'number'],
            [['drug_array'], 'string'],
            [['drugname', 'img'], 'string', 'max' => 255],
            [['orderid'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['orderid' => 'id']],
            [['drugid'], 'exist', 'skipOnError' => true, 'targetClass' => Drug::className(), 'targetAttribute' => ['drugid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'orderid' => 'Orderid',
            'drugid' => 'Drugid',
            'drugname' => 'Drugname',
            'img' => 'Img',
            'drug_price' => 'Drug Price',
            'drug_nums' => 'Drug Nums',
            'drug_array' => 'Drug Array',
            'is_send' => 'Is Send',
            'is_free' => 'Is Free',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Orders::className(), ['id' => 'orderid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDrug()
    {
        return $this->hasOne(Drug::className(), ['id' => 'drugid']);
    }
}
