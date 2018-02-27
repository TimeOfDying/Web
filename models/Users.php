<?php

namespace app\models;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "Users".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $First_name
 * @property string $Second_name
 * @property string $Last_name
 * @property string $Status
 */
class Users extends \yii\db\ActiveRecord implements IdentityInterface
{

    public static function tableName()
    {
        return 'Users';
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'First_name' => 'First Name',
            'Second_name' => 'Second Name',
            'Last_name' => 'Last Name',
            'Status' => 'Status',
        ];
    }


    public static function findByUsername($username)
    {
        return self::find()->where(['username' => $username])->one();

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
        return $this->auth_key;
    }


    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

}
