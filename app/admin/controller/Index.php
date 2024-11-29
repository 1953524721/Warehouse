<?php

namespace app\admin\controller;

use app\admin\model\product;
use app\BaseController;
use think\App;
use think\facade\Log;
use think\facade\Route;
use think\facade\Session;
use think\facade\View;
use think\Request;
use think\response\Json;
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
    /**
     * 显示添加产品页面
     *
     * 该方法负责渲染并返回添加产品页面，同时传递应用名称到视图
     *
     * @return string 渲染后的页面内容
     */
    public function add(): string
    {
        // 获取应用名称
        $appName   = env('APP_NAME');
        // 渲染并返回 "add" 视图，同时传递应用名称
        return View::fetch("add",[
            'appName' => $appName
        ]);
    }

    /**
     * 处理产品添加请求
     *
     * 该方法接收一个请求对象，提取产品信息并保存到数据库
     * 如果产品成功添加，返回成功信息和数据，否则返回错误信息
     *
     * @param Request $request 用户请求对象，包含产品信息和可能的文件上传
     * @return Json 包含操作结果和数据的JSON响应
     */
    public function addProduct(Request $request): Json
    {
        // 获取表单数据
        $names      = $request->post('name');
        $describe   = $request->post('describe');
        $models     = $request->post('models');
        $brand      = $request->post('brand');
        $num        = $request->post('num');
        $production = $request->post('production');
        $unit       = $request->post('unit');
        $date       = date('Y-m-d H:i:s');

        // 获取上传的文件
        $file = $request->file('flier');

        // 如果文件上传成功，进行保存并调用模型方法保存产品信息
        if ($file) {
            $saveName = \think\facade\Filesystem::putFile( 'topic', $file);
            $productionModel = new product();
            $data = $productionModel->createProduct($names, $describe, $models, $brand, $production, $num,$unit, $saveName,$date);

            // 根据产品保存结果，返回相应的JSON响应
            if (!$data)
            {
                return json(['status' => 'error', 'message' => '添加失败']);
            }
            else
            {
                return json(['status' => 'success', 'message' => '添加成功','data'=>$data]);
            }
        }
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
             $serverIp  = $_SERVER['SERVER_ADDR'];
             // 获取用户信息，用于在页面中显示
             $user = Session::get('user')['name'];
             return View::fetch("index",[
                 'user' => $user,
                 'appName' => $appName,
                 'serverIp' => $serverIp
             ]);
         } else {
             return $this->redirectToLogin();
         }
     }

    public function show(): string
    {
        $appName = env("APP_NAME");
        return View::fetch("show",[
            'appName' => $appName,
        ]);
    }
    public function pageAll(Request $request)
    {
        if ($request->isAjax())
        {
            $page            = $request->param('page', 1);
            $pageSize        = $request->param('pageSize', 10);
            $productionModel = new product();
            $list            = $productionModel->getProductsALL($page, $pageSize);
            $total           = $productionModel->getTotalProducts(); // 获取总记录数

            $response   = [
                'data'  => $list,
                'total' => $total
            ];
            return json($response);
        }
    }
    public function deleteItem(Request $request): Json
    {
        $id = $request->param('id');
//        return $id;die();
        $productionModel = new product();
        $result = $productionModel->destroy($id);
        if ($result)
        {
            return json(['status' => 'success', 'message' => '删除成功']);
        }
        else
        {
            return json(['status' => 'error', 'message' => '删除失败']);
        }
    }
    public function getItem(Request $request): Json
    {
        $id = $request->param('id');
        $productionModel = new product();
        $data = $productionModel->findProduct($id);
        return json($data);
    }
    public function updateItem(Request $request): Json
    {
        // 获取表单数据

        $names      = $request->post('name');
        $id         = $request->post('id');
        $describe   = $request->post('describe');
        $models     = $request->post('models');
        $brand      = $request->post('brand');
        $num        = $request->post('num');
        $production = $request->post('production');
        $unit       = $request->post('unit');
        $date       = date('Y-m-d H:i:s');

        // 获取上传的文件
        $file = $request->file('flier');

        // 如果文件上传成功，进行保存并调用模型方法保存产品信息
        if ($file) {
            $saveName = \think\facade\Filesystem::putFile( 'topic', $file);
            $productionModel = new product();
            $data = $productionModel->updateProduct($id,$names, $describe, $models, $brand, $production, $num,$unit, $saveName,$date);

            // 根据产品保存结果，返回相应的JSON响应
            if (!$data)
            {
                return json(['status' => 'error', 'message' => '更新失败']);
            }
            else
            {
                return json(['status' => 'success', 'message' => '更新失败','data'=>$data]);
            }
        }
        else
        {
            return json(['status' => 'error', 'message' => '添加失败']);
        }
    }

     public function configAll(): void
     {
         echo "当前应用目录：".app_path()."<br>";
         echo "应用基础目录：".base_path()."<br>";
         echo "应用配置目录：".config_path()."<br>";
         echo "web根目录：".public_path()."<br>";
         echo "应用根目录：".root_path()."<br>";
         echo "应用运行时目录：".runtime_path()."<br>";
     }
     public function test(): Json
     {
         $productionModel = new product();
         $list = $productionModel->getProductsALL(1,10);
         $total = $productionModel->getTotalProducts(); // 获取总记录数

         $response = [
             'data' => $list,
             'total' => $total
         ];
         return json($response);
     }
}