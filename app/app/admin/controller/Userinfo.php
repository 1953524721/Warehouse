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

/**
 * Userinfo控制器负责处理用户信息相关的操作
 */
class Userinfo extends comm
{
    /**
     * 更新用户信息
     *
     * @param Request $request 请求对象，用于获取用户提交的数据
     * @return \think\response\Json 返回更新结果的JSON格式响应
     */
    public function updateUser(Request $request): \think\response\Json
    {
        // 从请求中获取用户信息相关的参数
        $id              = $request->param('id');
        $name            = $request->param('name');
        $corporate_name  = $request->param('corporate_name');
        $phone           = $request->param('phone');
        $base            = $request->param('base');
        $status          = $request->param('status');
        $belongs         = $request->param('belongs');
        $email           = $request->param('email');

        // 实例化UserInfoModel模型并调用更新方法
        $userInfoModel = new UserInfoModel();
        $result = $userInfoModel->updateUserInfo($id,$name,$corporate_name,$phone,$base,$status,$belongs,$email);

        // 根据更新结果返回不同的响应信息
        if ($result)
        {
            return json(['status' => 'success', 'message' => '更新成功']);
        }
        else
        {
            return json(['status' => 'error', 'message' => '更新失败']);
        }
    }

    /**
     * 获取用户信息页面
     *
     * @return string 返回用户信息页面的HTML内容
     */
    public function getUser(): string
    {
        // 记录日志
        $browse = $this->getLog();

        // 获取城市列表数据
        $cityModel     = new cityModel();
        $cityList      = $cityModel->getCityParentId('0');
        $cityList      = json_encode($cityList);
        $cityList      = json_decode($cityList,true);

        // 获取应用名称
        $appName = env("APP_NAME");

        // 渲染用户信息页面并传递数据
        return View::fetch("getUser",[
            'appName' => $appName,
            'cityList' => $cityList
        ]);
    }

    /**
     * 获取用户信息数据
     *
     * @return Json 返回用户信息的JSON格式响应
     */
    public function getUserFind(): Json
    {
        try {
            // 从会话中获取用户ID
            $id            = Session::get('user')['id'];

            // 实例化UserInfoModel模型并获取用户信息
            $userInfoModel = new UserInfoModel();
            $data          = $userInfoModel->getUserInfo($id);

            // 获取用户信息表的字段列表并初始化某些字段为null
            $keys          = $userInfoModel->columns();
            $keys          = array_column($keys,'Filed');
            foreach ($keys as $key)
            {
                $data[$key] = null;
            }

            // 返回用户信息数据
            return \json($data);
        } catch (\Exception $exception)
        {
            // 如果发生异常，返回错误响应
            return json(['status' => 'error', 'message' => '用户不存在']);
        }
    }

    /**
     * 获取城市列表数据
     *
     * @return Json 返回城市列表的JSON格式响应
     */
    public function getCityList(): Json
    {
        // 实例化cityModel模型并获取城市列表数据
        $cityModel     = new cityModel();
        $data          = $cityModel->getCityParentId('0');

        // 返回城市列表数据
        return \json($data);
    }

}
