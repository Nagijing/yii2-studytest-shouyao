<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property string $id
 * @property string $order_no
 * @property string $userid
 * @property integer $orderstatus
 * @property integer $paystatus
 * @property string $acceptname
 * @property string $postcode
 * @property string $telphone
 * @property integer $country
 * @property integer $province
 * @property integer $city
 * @property integer $area
 * @property string $address
 * @property string $mobile
 * @property string $amount
 * @property integer $is_send
 * @property string $ordertime
 * @property string $completiontime
 * @property integer $if_del
 * @property string $allamount
 *
 * @property OrdersDrug[] $ordersDrugs
 * @property OrdersLog[] $ordersLogs
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_no', 'userid', 'acceptname'], 'required'],
            [['userid', 'orderstatus', 'paystatus', 'country', 'province', 'city', 'area', 'is_send', 'if_del'], 'integer'],
            [['amount', 'allamount'], 'number'],
            [['ordertime', 'completiontime'], 'safe'],
            [['order_no', 'acceptname', 'telphone', 'mobile'], 'string', 'max' => 20],
            [['postcode'], 'string', 'max' => 6],
            [['address'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_no' => '订单编号',
            'userid' => '用户ID',
            'orderstatus' => '订单状态',
            'paystatus' => '支付状态',
            'acceptname' => '收货人姓名',
            'postcode' => 'Postcode',
            'telphone' => 'Telphone',
            'country' => 'Country',
            'province' => 'Province',
            'city' => 'City',
            'area' => 'Area',
            'address' => '收货地址',
            'mobile' => '手机号',
            'amount' => '应付商品总金额',
            'is_send' => '发货状态',
            'ordertime' => '下单时间',
            'completiontime' => '订单完成时间',
            'if_del' => '是否删除',
            'allamount' => '订单总金额',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdersDrugs()
    {
        return $this->hasMany(OrdersDrug::className(), ['orderid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdersLogs()
    {
        return $this->hasMany(OrdersLog::className(), ['orderid' => 'id']);
    }
}
