<?php

namespace app\admin\controller;

use app\BaseController;
use think\App;
use think\facade\Session;
use think\Request;
use think\response\Redirect;

class comm extends BaseController
{
    /**
     * 构造函数，初始化用户验证
     *
     */
    public function __construct()
    {

        parent::__construct(app());

        // 检查用户是否已登录，未登录则重定向到登录页面
        if (!$this->isUserLoggedIn()) {
            $this->redirectToLogin();
        }
    }

    /**
     * 检查用户是否已登录
     *
     * @return bool 如果用户已登录，返回true；否则返回false
     */
    protected function isUserLoggedIn(): bool
    {
        try {
            // 使用Session检查用户登录状态
            return Session::has('user');
        } catch (\Exception $exception) {
            // 记录异常
            \think\facade\Log::error("Session check failed: " . $exception->getMessage());
            return false;
        }
    }



    /**
     * 重定向用户到登录页面
     *
     * @return Redirect 生成重定向到登录页面的响应
     */
    protected function redirectToLogin(): Redirect
    {
        $url = url('admin/Login/login');
        return redirect($url);
    }


}