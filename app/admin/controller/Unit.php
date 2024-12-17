<?php

namespace app\admin\controller;

use app\BaseController;
use app\admin\model\Unit as UnitModel;
use think\Request;
use think\facade\View;

class Unit extends BaseController
{
    public function unitPage(): string
    {

        $serverIp  = $_SERVER['SERVER_ADDR'];
        $appName = env("APP_NAME");
        return View::fetch("unit",[
            'appName' => $appName,
            'serverIp' => $serverIp
        ]);

    }
    public function unitPageAll(Request $request)
    {
        $check = $request->checkToken('__token__');
        if (false === $check )
        {
            return json(['status' => 'error', 'message' => 'token验证失败']);

        }
        if ($request->isAjax())
        {
            $page            = $request->param('page', 1);
            $pageSize        = $request->param('pageSize', 10);
            $unitModel       = new UnitModel();
            $list            = $unitModel->geUnitALL($page, $pageSize);
            $total           = $unitModel->getTotalUnit(); // 获取总记录数

            $response   = [
                'data'  => $list,
                'total' => $total
            ];
            return json($response);
        }
    }
    public function updateUnit(Request $request)
    {
        $check = $request->checkToken('__token__');
        if (false === $check )
        {
            return json(['status' => 'error', 'message' => 'token验证失败']);

        }
        $id        = $request->param('id');
        $unit_name = $request->param('unit_name');
        $date      = date("Y-m-d H:i:s");
        if ($request->isAjax())
        {
            $unitModel   = new UnitModel();
            $nameFnd     = $unitModel->getUnitByName($unit_name);
            if ($nameFnd)
            {
                return json(['status' => 'error', 'message' => '单位已存在']);
            }
            $list        = $unitModel->updateUnit($id, $unit_name,$date);
            if ($list) {
                return json(['status' => 'success', 'message' => '更新成功']);
            } else {
                return json(['status' => 'error', 'message' => '更新失败']);
            }
        }
    }
    public function deleteUnit(Request $request)
    {
        $check = $request->checkToken('__token__');
        if (false === $check) {
            return json(['status' => 'error', 'message' => 'token验证失败']);

        }
        if ($request->isAjax()) {
            $id = $this->request->param('id');
            $unitModel = new UnitModel();
            $list = $unitModel->deleteUnit($id);
            if ($list) {
                return json(['status' => 'success', 'message' => '删除成功']);
            } else {
                return json(['status' => 'error', 'message' => '删除失败']);
            }
        }
    }
    public function addUnit(Request $request)
    {
        $check = $request->checkToken('__token__');
        if (false === $check) {
            return json(['status' => 'error', 'message' => 'token验证失败']);

        }
        if ($request->isAjax()) {
            $unitName  = $this->request->param('unit_name');
            $unitModel = new UnitModel();
            $nameFnd   = $unitModel->addUnit($unitName);
            if ($nameFnd) {
                return json(['status' => 'success', 'message' => '添加成功']);
            }
            else {
                return json(['status' => 'error', 'message' => '添加失败']);
            }
        }

    }
}