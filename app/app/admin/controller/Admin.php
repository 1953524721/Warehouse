<?php

namespace app\admin\controller;

use app\admin\model\baiduMapLog;
use app\admin\model\product;
use app\admin\model\Browse;
use think\facade\Log;
use think\facade\View;
use app\admin\model\User;
use think\Request;

class Admin extends comm
{
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

        $websiteModel = new Browse();
        $webDayCount = $websiteModel->getTodayBrowseCount();
        Log::info('获取今日浏览量：' . $webDayCount);

        $data = $this->getIpLocation();
        $x = $data['data']['longitude'];
        $y = $data['data']['latitude'];
        Log::info('获取经纬度：' . $x . ',' . $y);


        // 将阿拉伯数字转换为汉字
        $totalNumInChinese = self::numberToChinese($totalNum);
        $totalUserNumInChinese = self::numberToChinese($totalUserNum);
        $totalProductCountInChinese = self::numberToChinese($totalProductCount);
        $totalWebDayCountINCHINESE = self::numberToChinese($webDayCount);
        $appName = env("APP_NAME");
        $ak = env('mapAk');
        view::assign('ak', $ak);
        view::assign('appName', $appName);
        view::assign('x', $x);View::assign('y', $y);
        view::assign('totalNumInChinese', $totalNumInChinese);
        view::assign('totalUserNumInChinese', $totalUserNumInChinese);
        view::assign('productCountInChinese', $totalProductCountInChinese);
        view::assign('webDayCountINCHINESE', $totalWebDayCountINCHINESE);

        return View::fetch('index');
    }

    public function map(): string
    {
        $ak = env('mapAk');
        $appName = env("APP_NAME");
        view::assign('ak', $ak);
        view::assign('appName', $appName);
        return View::fetch('map');
    }

    public function getIpLocation(): array
    {
        $ip = $this->getClientIP();

        if ($ip == "::1" || $ip == "127.0.0.1" || $ip == "localhost") {
            // 默认经纬度
            return [
                'status' => 'success',
                'message' => '本地IP，使用默认经纬度',
                'data' => [
                    'longitude' => '116.404',
                    'latitude' => '39.915'
                ]
            ];
        }

        $ak = 'AVJ4rz5uc7dKlCdMPCcIxhbEEno1sa3u';
        $url = "https://api.map.baidu.com/location/ip?ak={$ak}&ip={$ip}&coor=bd09ll";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);
        $date = date('Y-m-d H:i:s');

        // 确保 $data 包含必要的字段
        if (isset($data['content']['point']['x']) && isset($data['content']['point']['y'])) {
            $dataSet = [
                'ip' => $ip,
                'url' => $url,
                'datas' => json_encode($data), // 将数组转换为 JSON 字符串
                'date' => $date
            ];

            $log = new baiduMapLog();
            $log->insertMapLog($dataSet);

            // 成功获取经纬度
            return [
                'status' => 'success',
                'message' => '成功获取经纬度',
                'data' => [
                    'longitude' => $data['content']['point']['x'],
                    'latitude' => $data['content']['point']['y']
                ]
            ];
        } else {
            // 获取失败
            return [
                'status' => 'error',
                'message' => '无法获取经纬度信息',
                'data' => null
            ];
        }
    }


    public function getClientIP() {
        $ip = '';
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            // 将逗号分隔的 IP 列表转换为数组，并取第一个 IP 地址
            $ipList = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            // 确保数组不为空并清理空白字符
            $ip = trim($ipList[0] ?? '');
        } else {
            $ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
        }
        log::info('获取客户端IP：' . $ip);
        // 验证 IP 地址格式，若无效则返回默认值
        return filter_var($ip, FILTER_VALIDATE_IP) ? $ip : '0.0.0.0';

    }


}
