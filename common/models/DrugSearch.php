<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Drug;

/**
 * DrugSearch represents the model behind the search form about `common\models\Drug`.
 */
class DrugSearch extends Drug
{
	public function attributes()
	{
		return array_merge(parent::attributes(),['sellerName']);
	}
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'drugid', 'createtime', 'store_nums', 'is_delid', 'sellerid', 'role_id'], 'integer'],
            [['drugname', 'img', 'content','sellerName'], 'safe'],
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
		
        $query = Drug::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        	'pagination' => ['pageSize'=>12],
        	'sort'=>[
        			'defaultOrder'=>[
				            'id'=>SORT_ASC,      //SORT_DESC倒序  			
        			],
        			'attributes'=>['id'],
        	],
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
            'drugid' => $this->drugid,
            'price' => $this->price,
            'createtime' => $this->createtime,
            'updatetime' => $this->updatetime,
            'store_nums' => $this->store_nums,
            'is_delid' => $this->is_delid,
            'sellerid' => $this->sellerid,
            'role_id' => $this->role_id,
        ]);

        $query->andFilterWhere(['like', 'drugname', $this->drugname])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'content', $this->content]);
			
        $query->join('INNER JOIN','Drug_sellname','drug.sellerid = Drug_sellname.id');
        $query->andFilterWhere(['like','Drug_sellname.name',$this->sellerName]);
        
        $dataProvider->sort->attributes['sellerName'] = 
        [
        	'asc'=>['Drug_sellname.name'=>SORT_ASC],
        	'desc'=>['Drug_sellname.name'=>SORT_DESC],
        ];

        return $dataProvider;
    }
}
