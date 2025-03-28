<?php

namespace app\admin\controller;

use app\admin\model\city;
use app\admin\model\outProductLog;
use app\admin\model\product;
use app\admin\model\User as userModel;
use think\facade\Log;
use think\facade\Session;
use think\facade\View;
use think\Request;
use think\response\Json;
use think\response\Redirect;

class Index extends comm
{
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
            $appName = env("APP_NAME");
            $serverIp  = $_SERVER['SERVER_ADDR'];
            // 获取用户信息，用于在页面中显示
            $user = Session::get('user')['name'];
            Log::write('\033[32m页面加载成功~'.'success\033[0m');
            return View::fetch("index",[
                'user' => $user,
                'appName' => $appName,
                'serverIp' => $serverIp
            ]);
        } else {
            return $this->redirectToLogin();
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
        $browse = $this->getLog();

        $cityModel = new  city();
        $cityList = $cityModel->getCityParentId('0');

        $appName   = env('APP_NAME');
        // 渲染并返回 "add" 视图，同时传递应用名称
        return View::fetch("add",[
            'appName'  => $appName,
            'cityList' => $cityList
        ]);
    }
    public function getUnits(Request $request): array|Json
    {
//        $check = $request->checkToken('__token__');
//        if (false === $check)
//        {
//            return json(['status' => 'error', 'message' => 'token验证失败,请刷新页面重试!']);
//        }
        $unitModel = new \app\admin\model\Unit();
        $unitList = $unitModel->selectAll();
        return [
            'units' => $unitList
        ];
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
//        $check = $request->checkToken('__token__');
//        if (false === $check) {
//            return json(['status' => 'error', 'message' => 'token验证失败,请刷新页面重试!']);
//        } else {


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
        $file       = $request->file('flier');

        // 如果文件上传成功，进行保存并调用模型方法保存产品信息
        if ($file) {
            $saveName = \think\facade\Filesystem::disk('public')->putFile('topic', $file);
            $productionModel = new product();
            $data = $productionModel->createProduct($names, $describe, $models, $brand, $production, $num, $unit, $saveName, $date);

            // 根据产品保存结果，返回相应的JSON响应
            if (!$data) {
                return json(['status' => 'error', 'message' => '添加失败']);
            } else {
                return json(['status' => 'success', 'message' => '添加成功', 'data' => $data]);
            }
        } else {
            // 如果没有文件上传，仍然需要返回一个Json对象
            $productionModel = new product();
            $data = $productionModel->createProduct($names, $describe, $models, $brand, $production, $num, $unit, null, $date);

            // 根据产品保存结果，返回相应的JSON响应
            if (!$data) {
                return json(['status' => 'error', 'message' => '添加失败']);
            } else {
                return json(['status' => 'success', 'message' => '添加成功', 'data' => $data]);
            }
        }
//    }
    }




// 显示方法，用于渲染并返回页面，根据用户登录状态决定返回内容
    /**
     * 显示页面内容或重定向
     *
     * 此方法首先检查用户是否已登录如果用户已登录，它将创建一个城市模型实例，
     * 获取所有父级城市列表，然后渲染并返回 "show" 视图如果用户未登录，它将重定向到登录页面
     *
     * @return string|Redirect 返回渲染后的视图或重定向响应
     */
    public function show(): string|Redirect
    {
        $browse = $this->getLog();
        // 检查用户是否已登录
        if ($this->isUserLoggedIn())
        {
            // 创建城市模型实例
            $cityModel = new  city();
            // 获取所有父级城市列表
            $cityList = $cityModel->getCityParentId('0');

            // 获取应用名称
            $appName   = env('APP_NAME');
            // 渲染并返回 "show" 视图，同时传递应用名称和城市列表
            return View::fetch("show",[
                'appName'  => $appName,
                'cityList'=> $cityList
            ]);
        }
        else
        {
            // 如果用户未登录，则重定向到登录页面
            return $this->redirectToLogin();
        }
    }

    /**
     * 搜索商品项
     *
     * 该方法用于处理商品搜索请求，根据用户提供的搜索参数，返回相应的商品列表和总数
     * 同时返回服务器信息
     *
     * @param Request $request 用户请求对象，包含用户提交的搜索参数
     * @return Json 返回包含搜索结果、商品总数和服务器信息的JSON响应
     */
    public function searchItem(Request $request): Json
    {
        // 获取请求参数中的页码，默认为第1页
        $page         = $request->param('page', 1);
        // 获取请求参数中的每页条数，默认为10条
        $pageSize     = $request->param('pageSize', 10);
        // 获取请求参数中的搜索关键词，默认为空字符串
        $name         = $request->param('search','');
        // 获取请求参数中的生产者信息，默认为空字符串
        $productions  = $request->param('productions','');

        // 实例化商品模型，用于后续的商品数据查询
        $productionModel = new product();

        // 调用商品模型的方法获取符合搜索条件的商品列表
        $list  = $productionModel->getProductsALL($page, $pageSize, $name , $productions);

        // 调用商品模型的方法获取商品总数
        $total = $productionModel->getProductsCount($page, $pageSize, $name , $productions);

        // 获取服务器信息
        $servers = $this->servers();

        // 构建响应数组，包含商品列表、商品总数和服务器信息
        $response = [
            'data'  => $list,
            'total' => $total,
            'servers' => $servers,
        ];

        // 返回包含搜索结果的JSON响应
        return json($response);
    }


    /**
     * 删除产品项
     *
     * 本函数负责处理产品项的删除请求，首先验证请求中的token以确保请求的合法性，
     * 然后根据请求中提供的产品ID删除对应的产品信息
     *
     * @param Request $request 用户请求对象，包含删除请求的详细信息，如token和产品ID
     * @return Json 返回一个JSON对象，包含删除操作的状态和消息
     */
    public function deleteItem(Request $request): Json
    {
        $user = Session::get('user');
        if ($user['id'] != '1')
        {
            return json(['status' => 'error', 'message' => '权限不足']);
        }
        // 验证请求中的token
        $check = $request->checkToken();
        if (false === $check)
        {
            // 如果token验证失败，返回错误信息
            return json(['status' => 'error', 'message' => 'token验证失败,请刷新页面重试!']);
        }
        // 获取要删除的产品ID
        $id = $request->param('id');
        // 创建产品模型实例
        $productionModel = new product();
        // 执行删除操作
        $result = $productionModel->destroy($id);
        if ($result)
        {
            Log::debug("删除成功:",$id);
            // 如果删除成功，返回成功信息
            return json(['status' => 'success', 'message' => '删除成功']);
        }
        else
        {
            Log::debug("删除失败:",$id);
            // 如果删除失败，返回错误信息
            return json(['status' => 'error', 'message' => '删除失败']);
        }
    }

// 获取产品信息的方法，根据请求参数返回相应的产品数据
    public function getItem(Request $request): Json
    {
        // 验证请求中的token
        $check = $request->checkToken();
        if (false === $check)
        {
            // 如果token验证失败，返回错误信息
            return json(['status' => 'error', 'message' => 'token验证失败,请刷新页面重试!,']);
        }
        // 获取要查询的产品ID
        $id = $request->param('id');
        // 创建产品模型实例
        $productionModel = new product();
        // 获取产品数据
        $data = $productionModel->findProduct($id);
        $data['servers'] = $this->servers();
        Log::debug("获取成功:" . $data);
        // 返回产品数据
        return json($data);
    }
    /**
     * 更新商品信息
     *
     * 该方法用于处理商品信息的更新请求。它首先验证请求中的token，然后获取商品信息和上传文件，
     * 并调用产品模型的更新方法来更新商品数据。根据更新结果或文件上传情况，返回相应的JSON响应。
     *
     * @param Request $request 用户请求对象，包含用户提交的商品信息和文件
     * @return Json 返回更新结果的JSON响应
     */
    public function updateItem(Request $request): Json
    {
        // 验证请求中的token
        $check = $request->checkToken();
        if (false === $check)
        {
            // 如果token验证失败，返回错误信息
            return json(['status' => 'error', 'message' => 'token验证失败,请刷新页面重试!']);
        }

        // 获取表单数据
        $names      = $request->post('names');
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
        if ($file) {
            // 检查文件上传是否成功
            if ($file->isValid()) {
                // 保存上传的文件
                $saveName = \think\facade\Filesystem::putFile('topic', $file);
                // 创建产品模型实例
                $productionModel = new product();
                // 更新产品数据
                $data = $productionModel->updateProduct($id, $names, $describe, $models, $brand, $production, $num, $unit, $saveName, $date);
                // 返回更新结果
                if ($data) {
                    Log::debug("更新成功:" . $id);
                    return json(['status' => 'success', 'message' => '更新成功']);
                } else {
                    Log::debug("更新失败:" . $id);
                    return json(['status' => 'error', 'message' => '更新失败']);
                }
            } else {
                // 文件上传失败
                Log::error('File upload failed:', ['file' => $file, 'errors' => $file->getError()]);
                return json(['status' => 'error', 'message' => '文件上传失败']);
            }
        } else {
            // 没有文件上传
            return json(['status' => 'error', 'message' => '没有文件上传']);
        }
    }



    // 出库产品的方法，处理出库操作

    /**
     * @param Request $request
     * @return Json|void
     */
    public function outstockItem(Request $request)
    {
        try {
            if ($request->isAjax()) {
                // 验证请求中的token
                $check = $request->checkToken('__token__');
                if (false === $check) {
                    // 如果token验证失败，返回错误信息
                    return json(['status' => 'error', 'message' => 'token验证失败,请刷新页面重试!']);
                }

                // 获取出库参数
                $id = $request->param('id');
                $quantity = $request->param('quantity');
                $username = $request->param('username');
                $password = $request->post('password');

                // 参数验证
                if (empty($id) || empty($quantity) || empty($username) || empty($password)) {
                    return json(['status' => 'error', 'message' => '缺少必要参数']);
                }

                if (!is_numeric($id) || !is_numeric($quantity) || $quantity <= 0) {
                    return json(['status' => 'error', 'message' => '参数格式不正确']);
                }

                // 密码处理
                //$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                // 获取用户模型实例
                $userModel = $this->userModel();

                // 验证用户身份
                $userdata = $userModel->getUser($username, $password);
                if ($userdata)
                {
                    // 创建产品模型实例
                    $productionModel = new Product();

                    // 执行出库操作
                    $data = $productionModel->outstockProduct($id, $quantity);

                    //出库记录
                    $outProductModel = new outProductLog();

                    $outProduction = [
                        'product_id' => $id,
                        'num'        => $quantity,
                        'authorizer' => $username,
                        'date'       => date('Y-m-d H:i:s')
                    ];
                    $outProductModel->addOutProduct($outProduction);
                    Log::debug("出库成功:".$id);
                    Log::debug("出库数量:".$quantity);
                    // 返回出库结果
                    return json($data);
                } else {
                    // 如果用户身份验证失败，返回错误信息
                    return json(['status' => 'error', 'message' => '用户名或密码错误']);
                }
            }
        } catch (\PDOException $e) {
            // 数据库相关异常
            return json(['status' => 'error', 'message' => '数据库操作失败: ' . $e->getMessage()]);
        } catch (\Exception $e) {
            // 其他异常
            return json(['status' => 'error', 'message' => '系统错误: ' . $e->getMessage()]);
        }
    }


    public function outBound()
    {
        $browse = $this->getLog();
        // 检查用户是否已登录
        if ($this->isUserLoggedIn())
        {
            return view('outBound');
        }
        else
        {
            // 如果用户未登录，则重定向到登录页面
            return $this->redirectToLogin();
        }
    }
    public function outBoundAll(Request $request): Json
    {
        $outProductModel = new outProductLog();
        $page         = $request->post('page','1');
        $pageSize     = $request->param('pageSize', 10);
        $browse = $outProductModel->getProductAll($page, $pageSize);
        $total  = $outProductModel->getProductAllCount();
        $response = [
            'data'  => $browse,
            'total' => $total,
        ];
        return json($response);



    }
















    // 获取用户模型实例的方法
    public function userModel(): userModel
    {
        return new userModel();
    }
    public function servers(): string
    {
        if (str_contains($_SERVER['SERVER_SOFTWARE'], 'Apache'))
        {
            return 'A';
        } else {
            return 'N';
        }
    }
}