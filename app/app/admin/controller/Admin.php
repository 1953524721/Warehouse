<?php

namespace app\admin\controller;

use app\admin\model\product;
use app\admin\model\Browse;
use think\facade\Log;
use think\facade\View;
use app\admin\model\User;

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

        // 将阿拉伯数字转换为汉字
        $totalNumInChinese          = self::numberToChinese($totalNum);
        $totalUserNumInChinese      = self::numberToChinese($totalUserNum);
        $totalProductCountInChinese = self::numberToChinese($totalProductCount);
        $totalWebDayCountINCHINESE  = self::numberToChinese($webDayCount);

        view::assign('totalNumInChinese', $totalNumInChinese);
        view::assign('totalUserNumInChinese', $totalUserNumInChinese);
        view::assign('productCountInChinese', $totalProductCountInChinese);
        view::assign('webDayCountINCHINESE', $totalWebDayCountINCHINESE);

        return View::fetch('index');
    }



}
