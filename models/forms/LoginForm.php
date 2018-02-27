<?php

namespace app\models\forms;


use Yii;
use yii\base\Model;
use app\models\Users;

class LoginForm extends Model
{
    public $username;
    public $password;



    public function rules()
    {
        return [

            [['username', 'password'], 'required'],
            ['username','trim'],
            ['password', 'validatePassword'],
        ];
    }

    public function login()
    {
        if($this->validate())
        {
            $user=Users::findByUsername($this->username);
            return Yii::$app->user->login($user);
            return true;
        }
        return false;
    }

    public function validatePassword($attribute, $params)
    {
        $user=Users::findByUsername($this->username);

        if($user)
        {
            if(($this->password==$user->password) == false)
            {
                $this->addError($attribute, 'incorrect password');

            }
        }

    }

}
