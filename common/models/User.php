<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\web\NotFoundHttpException;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        	[['auth_key', 'password_hash', 'email', 'created_at', 'updated_at', 'status'], 'required'],
           [['created_at', 'updated_at', 'status','remind'], 'integer'],
           [['auth_key'], 'string', 'max' => 255],
           [['username'], 'string', 'max' => 32],
           [['password_hash', 'password_reset_token', 'email'], 'string', 'max' => 128],
           [['username'], 'unique'],
           [['status'], 'exist', 'skipOnError' => true, 'targetClass' => Userstatus::className(), 'targetAttribute' => ['status' => 'id']],
        ];
    }
	
    public function attributeLabels()
    {
    	return [
    			'id' => 'ID',
    			'username' => '用户名',
    			'auth_key' => 'Auth Key',
    			'password_hash' => 'Password Hash',
    			'password_reset_token' => 'Password Reset Token',
    			'email' => 'Email',
    			'status' => '状态',
    			'created_at' => '创建时间',
    			'updated_at' => '修改时间',
				'remind' =>'是否提醒',
    	];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
        ]);
    }
	
	public function getStatus0()
   {
       return $this->hasOne(Userstatus::className(), ['id' => 'status']);
   }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
	
	public function approve()
    {
    	$this->status = 2; //设置状态为已审核
    	return ($this->save()?true:false);
    }
    
    public static function getPengdingUserstatusCount()
    {
    	return User::find()->where(['status'=>1])->count();
    }
	
    public function beforeSave($insert)
    {
    	if(parent::beforeSave($insert))
    	{
    		if($insert)
    		{
    			$this->created_at=time();
    		}
    		return true;
    	}
    	else  return false;
	}
		
    public static function findRecentUserstatus($limit=5)
    {
    	return Userstatus::find()->where(['status'=>2])
		->orderBy('created_at DESC')
    	->limit($limit)
		->all();
    } 
	
}