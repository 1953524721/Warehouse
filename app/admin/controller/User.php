<?php

namespace app\admin\controller;

use app\admin\model\product;
use app\BaseController;
use think\facade\Log;
use think\facade\View;
use app\admin\model\User as Useres;
use think\Request;
use think\response\Json;

class User extends BaseController
{
    /**
     * 首页方法，返回渲染后的首页视图
     *
     * @return string 渲染后的视图字符串
     */
    public function index(): string
    {
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
     */
    public function userPageAll(Request $request)
    {
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
        }
    }

    /**
     * 获取指定ID的用户信息
     *
     * @param Request $request 请求对象，用于获取用户ID参数
     * @return Json 返回用户信息的JSON格式数据
     */
    public function getItem(Request $request): Json
    {
        $id           = $request->param('id');
        $userModel       = new Useres();
        $list            = $userModel->findUser($id);
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
    public function upUserPwd(Request $request)
    {
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
        }
    }

    /**
     * 更新指定用户的状态
     *
     * @param Request $request 请求对象，用于获取用户ID和新状态参数
     * @return Json 返回状态更新结果的JSON格式数据
     */
    public function updateState(Request $request)
    {
        if ($request->isAjax())
        {
            $id       = $request->param('id');
            $newState = $request->param('state');
    //        return json(['status' => $id, 'message' => $newState]);
    //        die();
            if ($id == 1)
            {
                return json(['status' => 'error', 'message' => '管理员禁止修改状态']);
            }
            $userModel = new Useres();
            $list = $userModel->updateState($id,$newState);
            if ($list) {
                return json(['status' => 'success', 'message' => '状态修改成功']);
            } else {
                return json(['status' => 'error', 'message' => '状态修改失败']);
            }
        }
    }

}