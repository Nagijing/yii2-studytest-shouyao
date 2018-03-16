<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Orders;

/**
 * OrdersSearch represents the model behind the search form about `common\models\Orders`.
 */
class OrdersSearch extends Orders
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'userid', 'orderstatus', 'paystatus', 'country', 'province', 'city', 'area', 'is_send', 'if_del'], 'integer'],
            [['order_no', 'acceptname', 'postcode', 'telphone', 'address', 'mobile', 'ordertime', 'completiontime'], 'safe'],
            [['amount', 'allamount'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Orders::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'userid' => $this->userid,
            'orderstatus' => $this->orderstatus,
            'paystatus' => $this->paystatus,
            'country' => $this->country,
            'province' => $this->province,
            'city' => $this->city,
            'area' => $this->area,
            'amount' => $this->amount,
            'is_send' => $this->is_send,
            'ordertime' => $this->ordertime,
            'completiontime' => $this->completiontime,
            'if_del' => $this->if_del,
            'allamount' => $this->allamount,
        ]);

        $query->andFilterWhere(['like', 'order_no', $this->order_no])
            ->andFilterWhere(['like', 'acceptname', $this->acceptname])
            ->andFilterWhere(['like', 'postcode', $this->postcode])
            ->andFilterWhere(['like', 'telphone', $this->telphone])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'mobile', $this->mobile]);

        return $dataProvider;
    }
}
