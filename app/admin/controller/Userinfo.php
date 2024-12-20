<?php

namespace app\admin\controller;

use app\BaseController;
use app\Request;
use app\admin\model\UserInfo as UserInfoModel;
use app\admin\model\city as cityModel;
use JetBrains\PhpStorm\NoReturn;
use think\facade\Session;
use think\facade\View;
use think\response\Json;

class Userinfo extends comm
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
    public function getUser(): string
    {
        $cityModel     = new cityModel();
        $cityList      = $cityModel->getCityParentId('0');
        $cityList      = json_encode($cityList);
        $cityList      = json_decode($cityList,true);
//        print_r($cityList);die();
        $appName = env("APP_NAME");
        return View::fetch("getUser",[
            'appName' => $appName,
            'cityList' => $cityList
        ]);
    }
    public function getUserFind(): Json
    {
        try {
            $id            = Session::get('user')['id'];
            $userInfoModel = new UserInfoModel();
//            $cityModel     = new cityModel();
            $data          = $userInfoModel->getUserInfo($id);
//            print_r($data);die();
//            $city          = $cityModel->getCity($data['base']);
//            $data['base']  = $city['city_name'];
            $keys          = $userInfoModel->columns();
            $keys          = array_column($keys,'Filed');
            foreach ($keys as $key)
            {
                $data[$key] = null;
            }
            return \json($data);
        } catch (\Exception $exception)
        {
            return json(['status' => 'error', 'message' => '用户不存在']);
        }
    }
    public function getCityList(): Json
    {
        $cityModel     = new cityModel();
        $data          = $cityModel->getCityParentId('0');
        return \json($data);
    }







}