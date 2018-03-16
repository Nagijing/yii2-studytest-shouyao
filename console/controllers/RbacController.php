<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // 添加 "createDrug" 权限
        $createDrug = $auth->createPermission('createDrug');
        $createDrug->description = '新增药品信息';
        $auth->add($createDrug);

        // 添加 "updateDrug" 权限
        $updateDrug = $auth->createPermission('updateDrug');
        $updateDrug->description = '修改药品信息';
        $auth->add($updateDrug);

        // 添加 "deleteDrug" 权限
        $deleteDrug = $auth->createPermission('deleteDrug');
        $deleteDrug->description = '删除药品信息';
        $auth->add($deleteDrug);
           

        // 添加 "postadmin" 角色并赋予 "updateDrug" “deleteDrug” “createDrug”
        $drugAdmin = $auth->createRole('drugAdmin');
        $drugAdmin->description = '药品管理员';
        $auth->add($drugAdmin);
        $auth->addChild($drugAdmin, $updateDrug);
        $auth->addChild($drugAdmin, $createDrug);
        $auth->addChild($drugAdmin, $deleteDrug);
        
        // 添加 "drugOperator" 角色并赋予  “deleteDrug” 
        $drugOperator = $auth->createRole('drugOperator');
        $drugOperator->description = '药品信息操作员';
        $auth->add($drugOperator);
        $auth->addChild($drugOperator, $deleteDrug);
        

        // 添加 "admin" 角色并赋予所有其他角色拥有的权限
        $admin = $auth->createRole('admin');
        $drugOperator->description = '系统管理员';
        $auth->add($admin);
        $auth->addChild($admin, $drugAdmin);
        $auth->addChild($admin, $drugOperator);
        
        

        // 为用户指派角色。其中 1 和 2 是由 IdentityInterface::getId() 返回的id （译者注：user表的id）
        // 通常在你的 User 模型中实现这个函数。
        $auth->assign($admin, 1);
        $auth->assign($drugAdmin, 2);
        $auth->assign($drugOperator, 3);
    }
}