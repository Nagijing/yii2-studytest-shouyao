<?php

namespace common\models;

use Yii;
use yii\helpers\Html;
use yii\web\UploadedFile;

/**
 * This is the model class for table "drug".
 *
 * @property string $id
 * @property string $drugid
 * @property string $drugname
 * @property string $price
 * @property string $createtime
 * @property string $updatetime
 * @property string $store_nums
 * @property string $is_delid
 * @property string $img
 * @property string $content
 * @property string $sellerid
 * @property string $role_id
 *
 * @property CategoryExtend[] $categoryExtends
 * @property Comment[] $comments
 * @property DrugSellname $seller
 * @property DrugIsDel $isDel
 * @property DrugPhotoRelation[] $drugPhotoRelations
 * @property OrdersDrug[] $ordersDrugs
 */
class Drug extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'drug';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
		    [['drugid','drugname', 'price', 'store_nums', 'content'], 'required'],
            [['drugid', 'createtime', 'updatetime', 'store_nums', 'is_delid', 'sellerid', 'role_id'], 'integer'],
            [['price'], 'number'],
            [['drugname','content'], 'string', 'max' => 128],
            [['img'], 'string', 'max' => 255],
            [['sellerid'], 'exist', 'skipOnError' => true, 'targetClass' => Drugsellname::className(), 'targetAttribute' => ['sellerid' => 'id']],
            [['is_delid'], 'exist', 'skipOnError' => true, 'targetClass' => Drugisdel::className(), 'targetAttribute' => ['is_delid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'drugid' => '药品ID',
            'drugname' => '药品名称',
            'price' => '价格',
            'createtime' => '创建时间',
            'updatetime' => '修改时间',
            'store_nums' => '库存',
            'is_delid' => '状态',
            'img' => '图片',
            'content' => '描述',
            'sellerid' => '卖家名称',
            'role_id' => '角色ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryExtends()
    {
        return $this->hasMany(CategoryExtend::className(), ['drug_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['drugid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeller()
    {
        return $this->hasOne(Drugsellname::className(), ['id' => 'sellerid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIsDel()
    {
        return $this->hasOne(Drugisdel::className(), ['id' => 'is_delid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDrugPhotoRelations()
    {
        return $this->hasMany(DrugPhotoRelation::className(), ['drugid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdersDrugs()
    {
        return $this->hasMany(OrdersDrug::className(), ['drugid' => 'id']);
    }
	
	public function beforeSave($insert)
	{			
		if(parent::beforeSave($insert))
		{
			if($insert)
			{
				$this -> createtime = time(); 
				$this -> updatetime = time(); 
			}
			else
			{
			    $this -> updatetime = time(); 
			}
  		    return true;
		}
		else
	    {
		return false;
	             }
	}
	
    public function getUrl()
    {
    	return Yii::$app->urlManager->createUrl(
    			[
				'drug/modal',                 //将drug中的id
				'id'=>$this->id,             //
				'title'=>$this->drugname,//drug中的drugname调用到drug/modal，modal视图
				]);
    }
	

}
