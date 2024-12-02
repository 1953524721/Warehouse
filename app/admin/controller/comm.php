<?php

namespace app\admin\controller;

use app\BaseController;
use think\App;
use think\facade\Session;
use think\response\Redirect;

class comm extends BaseController
{
    public function __construct(App $app)
    {
        $this->app = $app;
        parent::__construct($this->app);

        // 检查用户是否已登录，未登录则重定向到登录页面
        if (!$this->isUserLoggedIn())
        {
            $this->redirectToLogin();
        }
    }
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
    protected function redirectToLogin(): Redirect
    {
        // 获取服务器IP和应用名称，用于构建后续的URL
        $serverIp  = $_SERVER['SERVER_ADDR'];
        $appName   = env('APP_NAME');

        // 构建测试URL，此处简化了实际的URL构建过程
        $url = 'http://'.$serverIp.'/'.$appName.'/public/index.php/admin/Login/login';

        return redirect($url);
    }
}