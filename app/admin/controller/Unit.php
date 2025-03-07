<?php

namespace app\admin\controller;

use app\BaseController;
use app\admin\model\Unit as UnitModel;
use think\facade\Log;
use think\Request;
use think\facade\View;

/**
 * Unit控制器类，用于处理与单位管理相关的操作
 */
class Unit extends BaseController
{


    /**
     * 渲染单位管理页面
     *
     * @return string 渲染后的页面内容
     */
    public function unitPage(): string
    {
        // 获取日志信息
        $browse = $this->getLog();

        // 获取服务器IP地址
        $serverIp  = $_SERVER['SERVER_ADDR'];
        // 获取应用名称
        $appName = env("APP_NAME");
        // 渲染单位管理页面并传递应用名称和服务器IP地址
        return View::fetch("unit", [
            'appName' => $appName,
            'serverIp' => $serverIp
        ]);
    }

    /**
     * 获取所有单位信息
     *
     * @param Request $request 请求对象
     * @return \think\response\Json JSON响应
     */
    public function unitPageAll(Request $request): \think\response\Json
    {
        // 验证token
        $check = $request->checkToken('__token__');
        if (false === $check) {
            return json(['status' => 'error', 'message' => 'token验证失败']);
        }
        // 判断是否为Ajax请求
        if ($request->isAjax()) {
            // 获取分页参数
            $page = $request->param('page', 1);
            $pageSize = $request->param('pageSize', 10);
            // 实例化UnitModel模型
            $unitModel = new UnitModel();
            // 获取单位列表
            $list = $unitModel->geUnitALL($page, $pageSize);
            // 获取总记录数
            $total = $unitModel->getTotalUnit();

            $response = [
                'data' => $list,
                'total' => $total
            ];
            // 返回JSON响应
            return json($response);
        }
    }

    /**
     * 更新单位信息
     *
     * @param Request $request 请求对象
     * @return \think\response\Json JSON响应
     */
    public function updateUnit(Request $request): \think\response\Json
    {
        // 验证token
        $check = $request->checkToken('__token__');
        if (false === $check) {
            return json(['status' => 'error', 'message' => 'token验证失败']);
        }
        // 获取请求参数
        $id = $request->param('id');
        $unit_name = $request->param('unit_name');
        $date = date("Y-m-d H:i:s");
        // 判断是否为Ajax请求
        if ($request->isAjax()) {
            // 实例化UnitModel模型
            $unitModel = new UnitModel();
            // 检查单位名称是否已存在
            $nameFnd = $unitModel->getUnitByName($unit_name);
            if ($nameFnd) {
                return json(['status' => 'error', 'message' => '单位已存在']);
            }
            // 更新单位信息
            $list = $unitModel->updateUnit($id, $unit_name, $date);
            if ($list) {
                return json(['status' => 'success', 'message' => '更新成功']);
            } else {
                return json(['status' => 'error', 'message' => '更新失败']);
            }
        }
    }

    /**
     * 删除单位信息
     *
     * @return \think\response\Json JSON响应
     */
    public function deleteUnit(): \think\response\Json
    {
        // 验证token
        $check = $this->request->checkToken('__token__');
        if (false === $check) {
            return json(['status' => 'error', 'message' => 'token验证失败']);
        }
        // 判断是否为Ajax请求
        if ($this->request->isAjax()) {
            // 获取请求参数
            $id = $this->request->param('id');
            // 实例化UnitModel模型
            $unitModel = new UnitModel();
            // 删除单位信息
            $list = $unitModel->deleteUnit($id);
            if ($list) {
                return json(['status' => 'success', 'message' => '删除成功']);
            } else {
                return json(['status' => 'error', 'message' => '删除失败']);
            }
        }
    }

    /**
     * 添加单位信息
     *
     * @return \think\response\Json JSON响应
     */
    public function addUnit()
    {
        // 验证token
        $check = $this->request->checkToken('__token__');
        if (false === $check) {
            return json(['status' => 'error', 'message' => 'token验证失败']);
        }
        // 判断是否为Ajax请求
        if ($this->request->isAjax()) {
            // 获取请求参数
            $unitName = $this->request->param('unit_name');
            // 实例化UnitModel模型
            $unitModel = new UnitModel();
            // 检查单位名称是否已存在
            $find = $unitModel->getUnitByName($unitName);
            if ($find) {
                return json(['status' => 'error', 'message' => '单位已存在']);
            } else {
                // 添加单位信息
                $nameInsert= $unitModel->addUnit($unitName);
                if ($nameInsert) {
                    return json(['status' => 'success', 'message' => '添加成功']);
                } else {
                    // 记录错误日志
                    Log::error("添加单位信息时发生错误: " . $nameInsert);
                    return json(['status' => 'error', 'message' => '添加失败']);
                }
            }
        }
    }
}
