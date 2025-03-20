<?php
declare (strict_types = 1);

namespace app\admin\controller;

use app\BaseController;
use think\captcha\facade\Captcha;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\Request;
use think\facade\View;
use app\admin\model\User;
use think\response\Json;
use think\facade\Session;
use app\admin\model\Website;
use app\admin\controller\Index as IndexController;

class Login extends BaseController
{
    /**
     * 登录功能的视图展示方法
     *
     * 该方法用于渲染并返回登录页面的视图它没有接收任何参数，
     * 并且返回一个字符串类型的数据，通常用于在Web应用中显示登录界面
     *
     * @return string 返回登录页面的HTML内容
     */
    public function login(): string
    {
        $browse = $this->getLog();
        $siteModel = new Website();
        $IndexController = new IndexController(app());
        $logoImg = $siteModel->getLogo();
        $servers   = $IndexController->servers();
        $icp = $siteModel->getWebsite();
        $appName = env("APP_NAME");
        return View::fetch("login",[
            'appName' => $appName,
            'icp' => $icp,
            'servers' => $servers,
            'logoImg' => $logoImg['value'],
        ]);
    }

    /**
     * 处理用户登录请求
     *
     * 该方法接收一个登录请求，验证用户提供的用户名和密码，并根据验证结果返回相应的响应
     * 如果用户名和密码匹配，将用户信息存入会话并返回登录成功的信息；
     * 否则，返回登录失败的信息
     *
     * @param Request $request 用户登录请求对象，包含用户名和密码
     * @return Json 返回一个JSON对象，包含登录状态和消息
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    public function loginDo(Request $request): Json
    {
        $check = $request->checkToken('__token__');
        if (false === $check)
        {
            return json(['status' => 'error', 'message' => 'token验证失败']);
        }
        $captcha  =   $request->post('captcha');
        if (!captcha_check($captcha))
        {
            return json(['status' => 'error', 'message' => '验证码错误']);
        }
        // 获取用户提交的用户名和密码
        $name =     $request->post('name');
        $pwd  =     $request->post('pwd');
        // 创建User模型实例，用于处理用户数据
        $userModel = new User();

        // 调用User模型的getUser方法，验证用户名和密码
        $user = $userModel->getUser($name, $pwd);
//        print_r(json_encode($user));
        if (empty($user))
        {
            return json(['status' => 'error', 'message' => '用户名或密码错误']);
        }
        if ($user['state']=='0'){
            return json(['status' => 'error', 'message' => '用户被禁用']);
        }
        else if ($user['state']=='1')
        {
            // 如果用户信息匹配，将用户信息存入会话
            Session::set('user', $user);
            // 返回登录成功的JSON响应，包括成功消息和测试URL
            return json(['status' => 'success', 'message' => '登录成功,即将跳转']);
        }
        else
        {
            // 如果用户信息不匹配，返回登录失败的JSON响应，包括错误消息
            return json(['status' => 'error', 'message' => '用户名或密码错误']);
        }
    }

    public function test(): void
    {
        $IndexController = new IndexController(app());
        $servers   = $IndexController->servers();
        print_r($servers);
    }
}
