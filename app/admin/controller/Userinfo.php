<?php

namespace app\admin\controller;

use app\BaseController;
use app\Request;
use app\admin\model\UserInfo as UserInfoModel;

class Userinfo extends BaseController
{
    public function updateUser(Request $request): \think\response\Json
    {
        $id              = $request->param('id');
        $name            = $request->param('name');
        $corporate_name  = $request->param('corporate_name');
        $phone           = $request->param('phone');
        $base            = $request->param('base');
        $status          = $request->param('status');
        $belongs         = $request->param('belongs');
        $email           = $request->param('email');

        $userInfoModel = new UserInfoModel();
        $result = $userInfoModel->updateUserInfo($id,$name,$corporate_name,$phone,$base,$status,$belongs,$email);
        if ($result)
        {
            return json(['status' => 'success', 'message' => '更新成功']);
        }
        else
        {
            return json(['status' => 'error', 'message' => '更新失败']);
        }
    }







}