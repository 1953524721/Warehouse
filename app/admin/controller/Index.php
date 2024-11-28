<?php

namespace app\admin\controller;

use app\BaseController;
use think\App;
use think\facade\Session;
use think\facade\View;
use think\response\Redirect;

class Index extends BaseController
{
     /**
      * 构造函数，初始化用户验证
      *
      * @param App $app 应用实例，用于访问应用级别的服务和配置
      */
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
    public function show(): string
    {
        $appName   = env('APP_NAME');
        return View::fetch("show",[
            'appName' => $appName
        ]);
    }
     /**
      * 重定向用户到登录页面
      *
      * @return Redirect 生成重定向到登录页面的响应
      */
     protected function redirectToLogin(): Redirect
     {
         // 获取服务器IP和应用名称，用于构建后续的URL
         $serverIp  = $_SERVER['SERVER_ADDR'];
         $appName   = env('APP_NAME');

         // 构建测试URL，此处简化了实际的URL构建过程
         $url = 'http://'.$serverIp.'/'.$appName.'/public/index.php/admin/Login/login';

         return redirect($url);
     }

     /**
      * 处理用户请求的入口方法
      *
      * @return string|Redirect 根据用户登录状态返回欢迎信息或重定向到登录页面
      */
     public function index(): string|Redirect
     {
         // 根据用户是否登录，返回相应的响应
         if ($this->isUserLoggedIn())
         {
             //return '您好！这是一个[index]示例应用';
             $appName = env("APP_NAME");
             // 获取用户信息，用于在页面中显示
             $user = Session::get('user')['name'];
             return View::fetch("index",[
                 'user' => $user,
                 'appName' => $appName
             ]);
         } else {
             return $this->redirectToLogin();
         }
     }
    public function test(): mixed
    {
        return env("APP_NAME");
    }
}