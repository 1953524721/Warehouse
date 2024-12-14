<?php

namespace app\admin\controller;

use app\BaseController;
use app\Request;
use think\facade\View;
use app\admin\model\Website as WebsiteModel;

class Website extends BaseController
{
    public function websiteInfo(): string
    {
        $websiteModel  = new WebsiteModel();
        $website       = $websiteModel->getWebsite();
        $appName = env("APP_NAME");
        return View::fetch('websiteInfo',[
            'appName' => $appName,
            'website' => $website
        ]);
    }
    public function saveWebsite(Request $request)
    {
        $check = $request->checkToken('__token__');
        if (false === $check )
        {
            return json(['status' => 'error', 'message' => 'token验证失败']);

        }
        if ($request -> isAjax())
        {
            $name  = $request -> param('name');
            $value = $request -> param('value');
            $websiteModel = new WebsiteModel();
            $data = $websiteModel->updateWebsite($name,$value);
            if ($data)
            {
                return json(['status' => 'success', 'message' => '保存成功']);
            }else{
                return json(['status' => 'error', 'message' => '保存失败']);
            }

        }
    }

}