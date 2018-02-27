<?php

namespace app\controllers;

use Yii;
use app\models\forms\LoginForm;

class UsersController extends \yii\web\Controller
{
    public function actionLogin()
    {
        $model = new LoginForm();

        if($model->load(Yii::$app->request->post()) && $model->login())
        {
            return $this->redirect(['site/index']);
        }
        return $this->render('login',[
            'model' => $model]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(['site/index']);
    }


}
