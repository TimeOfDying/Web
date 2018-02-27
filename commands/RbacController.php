<?php
/**
 * Created by PhpStorm.
 * User: debianyii
 * Date: 27.02.18
 * Time: 13:06
 */

namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit() {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        $admin = $auth->createRole('admin');
        $operator = $auth->createRole('operator');
        $terminal = $auth->createRole('terminal');

        $auth->add($admin);
        $auth->add($operator);
        $auth->add($terminal);

        // Разрешения админа
        $viewAdminPage = $auth->createPermission('viewAdminPage');
        $viewAdminPage->description = 'Страница администратора';
        $operatorControl = $auth->createPermission('operatorControl');
        $operatorControl->description = 'Управление операторами';
        $placesControl = $auth->createPermission('placesControl');
        $placesControl->description = 'Управление окнами';

        // Разрешения оператора
        $viewOperatorPage = $auth->createPermission('viewOperatorPage');
        $viewOperatorPage->description='Страница оператора';

        // Разрешения терминала
        $viewTerminalPage = $auth->createPermission('$viewTerminalPage');
        $viewTerminalPage->description='Страница терминала';

        $auth->add($viewAdminPage);
        $auth->add($operatorControl);
        $auth->add($placesControl);
        $auth->add($viewOperatorPage);
        $auth->add($viewTerminalPage);


        //оператора
        $auth->addChild($operator,$viewOperatorPage);

        //терминал
        $auth->addChild($terminal,$viewTerminalPage);

        //админ
        $auth->addChild($admin, $operator);
        $auth->addChild($admin, $terminal);
        $auth->addChild($admin, $viewAdminPage);
        $auth->addChild($admin, $operatorControl);
        $auth->addChild($admin, $placesControl);


        $auth->assign($admin, 1);
        $auth->assign($operator, 2);
        $auth->assign($operator, 4);
        $auth->assign($terminal, 3);

    }
}