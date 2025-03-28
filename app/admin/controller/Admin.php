<?php

namespace app\admin\controller;

use app\admin\model\baiduMapLog;
use app\admin\model\product;
use app\admin\model\Browse;
use think\facade\Log;
use think\facade\View;
use app\admin\model\User;
use think\Request;

/**
 * Admin控制器负责处理与管理员相关的操作
 */
class Admin extends comm
{
    /**
     * 显示管理员首页
     *
     * 该方法负责查询总产品数量、总用户数量、今日浏览量等信息，并将其传递给视图进行展示
     * 同时，它还负责获取当前客户端的IP地址并转换为经纬度信息
     *
     * @return string 返回渲染后的视图页面
     */
    public function index(): string
    {
        // 获取总产品数量
        $productModel = new product();
        $totalNum = $productModel->sumProductNum();
        Log::info('获取总产品数量：' . $totalNum);

        // 获取总用户数量
        $userModel = new User();
        $totalUserNum = $userModel->getUserCount();
        Log::info('获取总用户数量：' . $totalUserNum);

        // 获取总产品数量
//        $totalProductCount = $productModel->getProductCount();
        $totalProductCount = "4";
        Log::info('获取总产品数量：' . $totalProductCount);

        // 获取今日浏览量
        $websiteModel = new Browse();
        $webDayCount = $websiteModel->getTodayBrowseCount();
        Log::info('获取今日浏览量：' . $webDayCount);

        // 获取客户端IP地址并转换为经纬度信息
        $data = $this->getIpLocation();
        $x = $data['data']['longitude'];
        $y = $data['data']['latitude'];
        Log::info('获取经纬度：' . $x . ',' . $y);

        // 将数字转换为汉字表示
        $totalNumInChinese = self::numberToChinese($totalNum);
        $totalUserNumInChinese = self::numberToChinese($totalUserNum);
        $totalProductCountInChinese = self::numberToChinese($totalProductCount);
        $totalWebDayCountINCHINESE = self::numberToChinese($webDayCount);

        // 将相关数据分配给视图
        $appName = env("APP_NAME");
        $ak = env('mapAk');
        view::assign('ak', $ak);
        view::assign('appName', $appName);
        view::assign('x', $x);
        View::assign('y', $y);
        view::assign('totalNumInChinese', $totalNumInChinese);
        view::assign('totalUserNumInChinese', $totalUserNumInChinese);
        view::assign('productCountInChinese', $totalProductCountInChinese);
        view::assign('webDayCountINCHINESE', $totalWebDayCountINCHINESE);

        // 渲染并返回视图页面
        return View::fetch('index');
    }

    /**
     * 显示地图页面
     *
     * 该方法负责将地图API的密钥和应用名称分配给视图，以便在地图页面上使用
     *
     * @return string 返回渲染后的地图视图页面
     */
    public function map(): string
    {
        // 获取地图API密钥和应用名称，并分配给视图
        $ak = env('mapAk');
        $appName = env("APP_NAME");
        view::assign('ak', $ak);
        view::assign('appName', $appName);

        // 渲染并返回地图视图页面
        return View::fetch('map');
    }

    /**
     * 获取客户端IP地址的经纬度信息
     *
     * 该方法根据客户端IP地址查询百度地图API，以获取对应的经纬度信息
     * 如果IP地址是本地地址，则返回默认的经纬度信息
     *
     * @return array 包含状态、消息和数据的数组
     */
    public function getIpLocation(): array
    {
        // 获取客户端IP地址
        $ip = $this->getClientIP();

        // 对于本地IP地址，返回默认的经纬度信息
        if ($ip == "::1" || $ip == "127.0.0.1" || $ip == "localhost") {
            return [
                'status' => 'success',
                'message' => '本地IP，使用默认经纬度',
                'data' => [
                    'longitude' => '116.404',
                    'latitude' => '39.915'
                ]
            ];
        }

        // 使用百度地图API查询IP地址对应的经纬度信息
        $ak = 'AVJ4rz5uc7dKlCdMPCcIxhbEEno1sa3u';
        $url = "https://api.map.baidu.com/location/ip?ak={$ak}&ip={$ip}&coor=bd09ll";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);
        $date = date('Y-m-d H:i:s');

        // 如果成功获取经纬度信息，则记录日志并返回成功信息
        if (isset($data['content']['point']['x']) && isset($data['content']['point']['y'])) {
            $dataSet = [
                'ip' => $ip,
                'url' => $url,
                'datas' => json_encode($data),
                'date' => $date
            ];

            $log = new baiduMapLog();
            $log->insertMapLog($dataSet);

            return [
                'status' => 'success',
                'message' => '成功获取经纬度',
                'data' => [
                    'longitude' => $data['content']['point']['x'],
                    'latitude' => $data['content']['point']['y']
                ]
            ];
        } else {
            // 如果获取失败，则返回错误信息
            return [
                'status' => 'error',
                'message' => '无法获取经纬度信息',
                'data' => null
            ];
        }
    }

    /**
     * 获取客户端IP地址
     *
     * 该方法通过检查不同的服务器变量来确定客户端的IP地址
     * 如果无法确定客户端的IP地址，则返回默认值
     *
     * @return string 客户端的IP地址或默认值
     */
    public function getClientIP(): string
    {
        $ip = '';
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ipList = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $ip = trim($ipList[0] ?? '');
        } else {
            $ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
        }
        log::info('获取客户端IP：' . $ip);

        // 验证IP地址格式，若无效则返回默认值
        return filter_var($ip, FILTER_VALIDATE_IP) ? $ip : '0.0.0.0';
    }
}
