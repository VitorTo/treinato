<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    public static function tableName()
    {
        return 'user';
    }
    public function rules()
    {
        return [
            [['status','tipo_user_id'], 'integer'],
            [['dt_create', 'dt_update', 'dt_delete'], 'safe'],
            [['nome'], 'string', 'max' => 255],
            [['authKey', 'accessToken'], 'string', 'max' => 50],
            [['password','username'], 'string', 'max' => 100],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo_user_id' => 'Tipo',
            'nome' => 'Nome',
            'username' => 'Email',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'status' => 'Status',
            'dt_create' => 'Dt Create',
            'dt_update' => 'Dt Update',
            'dt_delete' => 'Dt Delete',
        ];
    }

    public static function find()
    {
        return new UserQuery(get_called_class());
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public function validatePassword($password)
    {
        // return Yii::$app->security->validatePassword($password, $this->password);
        return $password;
    }
}
