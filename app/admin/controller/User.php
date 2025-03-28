<?php

namespace app\admin\controller;

// 导入必要的模型和异常处理类
use app\admin\model\UserInfo;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\facade\Session;
use think\facade\View;
use app\admin\model\User as Useres;
use think\Request;
use think\response\Json;

/**
 * 用户控制器类，负责处理与用户相关的请求
 */
class User extends comm
{
    /**
     * 首页方法，返回渲染后的首页视图
     *
     * @return string 渲染后的视图字符串
     */
    public function index(): string
    {
        $browse = $this->getLog();
        $appName = env("APP_NAME");
        return View::fetch("index",[
            'appName' => $appName,
        ]);
    }

    /**
     * 获取所有用户信息的分页数据
     *
     * @param Request $request 请求对象，用于判断是否为Ajax请求并获取分页参数
     * @return Json 返回用户信息的JSON格式数据
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    public function userPageAll(Request $request): Json
    {
//        $check = $request->checkToken();
//        if (false === $check)
//        {
//            return json(['status' => 'error', 'message' => 'token验证失败']);
//        }
        if ($request->isAjax())
        {
            $page            = $request->param('page', 1);
            $pageSize        = $request->param('pageSize', 10);
            $userModel       = new Useres();
            $list            = $userModel->getUserALL($page, $pageSize);
            $total           = $userModel->getUserALLCount(); // 获取总记录数

            $response   = [
                'data'  => $list,
                'total' => $total
            ];
            return json($response);
        } else {
            return json(['status' => 'error', 'message' => '请求方式错误']);
        }
    }

    /**
     * 获取指定ID的用户信息
     *
     * @param Request $request 请求对象，用于获取用户ID参数
     * @return Json 返回用户信息的JSON格式数据
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    public function getItem(Request $request): Json
    {
//        $check = $request->checkToken();
//        if (false === $check)
//        {
//            return json(['status' => 'error', 'message' => 'token验证失败']);
//        }
        $id           = $request->param('id');
        $userModel    = new Useres();
        $list         = $userModel->findUser($id);
        return json($list);
    }

    /**
     * 更新指定用户的名称
     *
     * @param Request $request 请求对象，用于获取用户ID和新名称参数
     * @return Json 返回更新结果的JSON格式数据
     */
    public function updateItem(Request $request): Json
    {
//        $check = $request->checkToken();
//        if (false === $check)
//        {
//            return json(['status' => 'error', 'message' => 'token验证失败']);
//        }
        $id        = $request->param('id');
        $name      = $request->param('names');
        $userModel = new Useres();
        $list = $userModel->updateName($id,$name);
        if ($list) {
            return json(['status' => 'success', 'message' => '更新成功']);
        } else {
            return json(['status' => 'error', 'message' => '更新失败']);
        }
    }

    /**
     * 删除指定ID的用户
     *
     * @param Request $request 请求对象，用于获取用户ID参数
     * @return Json 返回删除结果的JSON格式数据
     */
    public function deleteUser(Request $request): Json
    {
        $user = Session::get('user');
        if ($user['id'] != '1')
        {
            return json(['status' => 'error', 'message' => '权限不足']);
        }
//        $check = $request->checkToken();
//        if (false === $check)
//        {
//            return json(['status' => 'error', 'message' => 'token验证失败,请刷新页面重试!']);
//        }
        $id = $request->param('id');
        if ($id == 1)
        {
            return json(['status' => 'error', 'message' => '管理员禁止删除']);
        }
        $userModel = new Useres();
        $list = $userModel->deleteUser($id);
        if ($list)
        {
            return json(['status' => 'success', 'message' => '删除成功']);
        }
        else
        {
            return json(['status' => 'error', 'message' => '删除失败']);
        }
    }

    /**
     * 重置指定用户的密码
     *
     * @param Request $request 请求对象，用于获取用户ID参数
     * @return Json 返回密码重置结果的JSON格式数据
     */
    public function upUserPwd(Request $request): Json
    {
//        $check = $request->checkToken();
//        if (false === $check)
//        {
//            return json(['status' => 'error', 'message' => 'token验证失败']);
//        }
        if ($request->isAjax())
        {
            $id = $request->param('id');
            if ($id == 1)
            {
                return json(['status' => 'error', 'message' => '管理员禁止删除']);
            }
            $id = $request->param('id');
            $userModel = new Useres();
            $list = $userModel->updatePwd($id);
            if ($list) {
                return json(['status' => 'success', 'message' => '密码重置成功']);
            } else {
                return json(['status' => 'error', 'message' => '密码重置失败']);
            }
        } else {
            return json(['status' => 'error', 'message' => '请求方式错误']);
        }
    }

    /**
     * 更新指定用户的状态
     *
     * @param Request $request 请求对象，用于获取用户ID和新状态参数
     * @return Json 返回状态更新结果的JSON格式数据
     */
    public function updateState(Request $request): Json
    {
        if ($request->isAjax())
        {
            $id       = $request->param('id');
            $newState = $request->param('state');
    //        return json(['status' => $id, 'message' => $newState]);
            $date = date("Y-m-d H:i:s");
    //        die();
            if ($id == 1)
            {
                return json(['status' => 'error', 'message' => '管理员禁止修改状态']);
            }
            $userModel = new Useres();
            $list = $userModel->updateState($id,$newState,$date);
            if ($list) {
                return json(['status' => 'success', 'message' => '状态修改成功']);
            } else {
                return json(['status' => 'error', 'message' => '状态修改失败']);
            }
        }
        else {
            return json(['status' => 'error', 'message' => '请求方式错误']);
        }
    }

    /**
     * 显示添加用户页面
     *
     * @return string 渲染后的视图字符串
     */
    public function addUser(): string
    {
        $browse = $this->getLog();
        $appName = env("APP_NAME");
        return View::fetch("add",[
            'appName' => $appName,
        ]);
    }

    /**
     * 处理添加用户表单提交
     *
     * @param Request $request 请求对象，用于获取用户ID和新状态参数
     * @return Json 返回添加结果的JSON格式数据
     */
    public function addUserPost(Request $request): Json
    {
//        $check = $request->checkToken();
//        if (false === $check)
//        {
//            return json(['status' => 'error', 'message' => 'token验证失败']);
//        }
        if ($request->isAjax())
        {
            $name      = $request->param('username');
            $pwd       = $request->param('password');
            $date      = date("Y-m-d H:i:s");
            $userModel = new Useres();
            $nameAdd   = $userModel->findUserName($name);
            if ($nameAdd)
            {
                return json(['status' => 'error', 'message' => '用户已存在']);
            }
            $list = $userModel->addUser($name,$pwd,$date);
            if ($list) {
                return json(['status' => 'success', 'message' => '添加成功']);
            } else {
                return json(['status' => 'error', 'message' => '添加失败']);
            }
        }
        else {
            return json(['status' => 'error', 'message' => '请求方式错误']);
        }
    }

    /**
     * 用户注销方法
     *
     * @return Json 返回注销结果的JSON格式数据
     */
    public function logout(): Json
    {
        Session::delete('user');
        return  json(['status' => 'success', 'message' => '注销成功']);
    }

    /**
     * 搜索指定用户名的用户信息
     *
     * @param Request $request 请求对象，用于获取搜索关键词及分页参数
     * @return Json 返回搜索结果的JSON格式数据
     */
    public function searchItem(Request $request): Json
    {
        if ($request->isAjax())
        {
            $name            = $request->param('search');
            $page            = $request->param('page', 1);
            $pageSize        = $request->param('pageSize', 10);
            $userModel       = new Useres();
            $list            = $userModel->finduserNameALL($page, $pageSize,$name);
            $total           = $userModel->finduserNameALLCount($name); // 获取总记录数
            $response   = [
                'data'  => $list,
                'total' => $total
            ];
            return json($response);
        }
        else{
            return json(['status' => 'error', 'message' => '请求方式错误']);
        }
    }

    /**
     * 测试方法，用于获取用户信息
     *
     * @param Request $request 请求对象
     */
    public function test(Request $request): void
    {
        $userInfoModel = new UserInfo();
        $id = Session::get('user')['id'];
        $data = $userInfoModel->getUserInfo($id);
        if(empty($data))
        {
            $keys = $userInfoModel->columns();
            $keys = array_column($keys,'Feild');
            foreach ($keys as $key)
            {
                $data[$key] = null;
            }
        }
        print_r($data);
    }
}
