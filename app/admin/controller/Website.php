<?php

namespace app\admin\controller;

use app\BaseController;
use app\Request;
use think\facade\Db;
use think\facade\Session;
use think\facade\View;
use app\admin\model\Website as WebsiteModel;

class Website extends comm
{
    public function websiteInfo(): \think\response\Json|string
    {
        try {
            if (!$this->isUserLoggedIn())
            {
                return json(['status' => 'error', 'message' => "未知异常"]);
            }
            $websiteModel  = new WebsiteModel();
            $website       = $websiteModel->getWebsite();
            $appName = env("APP_NAME");
            return View::fetch('websiteInfo',[
                'appName' => $appName,
                'website' => $website
            ]);
        } catch (\Exception $exception)
        {
            return json(['status' => 'error', 'message' => $exception->getMessage()]);
        }
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
    /**
     * 检查用户是否已登录
     *
     * @return bool 如果用户已登录，返回true；否则返回false
     */
    protected function isUserLoggedIn(): bool
    {
        try {
            // 使用Session检查用户登录状态
            return Session::has('user');
        } catch (\Exception $exception) {
            // 记录异常
            \think\facade\Log::error("Session check failed: " . $exception->getMessage());
            return false;
        }
    }
    public function infos(): string
    {
        // 获取数据库版本信息
        $dbVersion = Db::query("SELECT VERSION() AS version");
        $version = $dbVersion[0]['version'];

        // 获取操作系统信息
        $uname = php_uname();

        // 判断服务器类型是否为 MariaDB
        $serverType = str_contains($version, 'MariaDB') ? 'MariaDB' : 'MySQL';

        // 获取数据库字符集信息
        $charsetResult = Db::query("SHOW VARIABLES LIKE 'character_set_database'");
        $collationResult = Db::query("SHOW VARIABLES LIKE 'collation_database'");

        $charset = $charsetResult[0]['Value'];
        $collation = $collationResult[0]['Value'];

        // 获取 Web 服务器类型
        $webServerType = '';
        if (str_contains($_SERVER['SERVER_SOFTWARE'], 'Apache')) {
            $webServerType = 'Apache';
        } elseif (str_contains($_SERVER['SERVER_SOFTWARE'], 'Nginx')) {
            $webServerType = 'Nginx';
        } else {
            $webServerType = 'Unknown';
        }

        // 获取 PHP 版本
        $phpVersion = phpversion();

        // 将信息传递给视图
        View::assign('uname', $uname);
        View::assign('version', $version);
        View::assign('serverType', $serverType);
        View::assign('charset', $charset);
        View::assign('collation', $collation);
        View::assign('webServerType', $webServerType);
        View::assign('phpVersion', $phpVersion);

        return View::fetch('infos');
    }


}