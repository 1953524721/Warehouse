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
    public function index(): string
    {
        $appName = env("APP_NAME");
        return View::fetch("index",[
            'appName' => $appName,
        ]);
    }
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
    public function getItem(Request $request): Json
    {
        $id           = $request->param('id');
        $userModel       = new Useres();
        $list            = $userModel->findUser($id);
        return json($list);
    }
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
    public function updateState(Request $request)
    {
        if ($request->isAjax())
        {
            $id       = $request->param('id');
            $newState = $request->param('state');
//            return json(['status' => $id, 'message' => $newState]);
//            die();
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