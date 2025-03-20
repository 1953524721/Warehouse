<?php

namespace app\admin\controller;

use app\admin\model\product;
use app\BaseController;
use app\Request;
use think\facade\Db;
use think\facade\Filesystem;
use think\facade\Log;
use think\facade\Session;
use think\facade\View;
use app\admin\model\Website as WebsiteModel;
use app\admin\controller\Index as IndexController;

/**
 * 网站信息控制器
 */
class Website extends comm
{
    /**
     * 获取网站信息
     *
     * @return \think\response\Json|string 返回网站信息的视图或错误信息的JSON响应
     */
    public function websiteInfo(): \think\response\Json|string
    {
        $browse = $this->getLog();
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

    /**
     * 保存网站信息
     *
     * @param Request $request 用户请求对象
     * @return \think\response\Json 返回保存结果的JSON响应
     */
    public function saveWebsite(Request $request): \think\response\Json
    {
        // 检查 CSRF token
        if (false === $request->checkToken('__token__')) {
            return json(['status' => 'error', 'message' => 'token验证失败']);
        }

        // 检查是否为 AJAX 请求
        if (!$request->isAjax()) {
            return json(['status' => 'error', 'message' => '仅支持 AJAX 请求']);
        }

        // 获取并验证请求参数
        $name = $request->param('name');
        $value = $request->param('value');

        if (empty($name) || empty($value)) {
            return json(['status' => 'error', 'message' => '参数不能为空']);
        }

        // 使用正则表达式或其他方式进一步验证 name 和 value 的格式
        if (!preg_match('/^[a-zA-Z0-9_]+$/', $name)) {
            return json(['status' => 'error', 'message' => '名称格式不正确']);
        }

        try {
            // 使用事务确保数据一致性
            (new \think\Db)->startTrans();
            $websiteModel = new WebsiteModel();
            $data = $websiteModel->updateWebsite($name, $value);

            if ($data) {
                (new \think\Db)->commit();
                return json(['status' => 'success', 'message' => '保存成功']);
            } else {
                (new \think\Db)->rollback();
                return json(['status' => 'error', 'message' => '保存失败']);
            }
        } catch (\Exception $e) {
            (new \think\Db)->rollback();
            return json(['status' => 'error', 'message' => '服务器内部错误: ' . $e->getMessage()]);
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

    /**
     * 显示网站基础信息
     *
     * 该方法收集并显示数据库版本、操作系统信息、服务器类型、数据库字符集、Web服务器类型和PHP版本等信息
     *
     * @return string 返回包含网站基础信息的视图
     */
    public function infos(): string
    {
        $browse = $this->getLog();
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
    public function selectLogo(): string
    {
        $browse = $this->getLog();
        $model = new WebsiteModel();
        $logoImg = $model->getLogo();
//        print_r($logoImg['value']);
        $appName = env("APP_NAME");
        $server = new IndexController();
        $serverName = $server->servers();


        // 将信息传递给视图
        View::assign('logoImg', $logoImg['value']);
        View::assign('appName', $appName);
        View::assign('serverName', $serverName);
        return View::fetch('logo');
    }
    public function saveLogo(Request $request): \think\response\Json
    {
        $name = 'LOGO';
        $file = $request->file('logoImg');

        if ($file && $file->isValid()) {
            // 确保目录存在且可写
            $uploadPath = public_path('storage/topic/logo');
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            if (!is_writable($uploadPath)) {
                return json(['status' => 'error', 'message' => '目录无写入权限']);
            }

            // 使用 public 磁盘保存文件
            try {
                $saveName = \think\facade\Filesystem::disk('public') // 显式指定磁盘
                    ->putFile('topic/logo', $file); // 相对路径
            } catch (\Exception $e) {
                Log::error('文件上传失败: ' . $e->getMessage());
                return json(['status' => 'error', 'message' => '文件上传失败']);
            }

            // 更新数据库
            $saveModel = new WebsiteModel();
            $data = $saveModel->updateWebsite($name, $saveName);

            if ($data) {
                return json(['status' => 'success', 'message' => '更新成功', 'path' => $saveName]);
            } else {
                return json(['status' => 'error', 'message' => '数据库更新失败']);
            }
        } else {
            return json(['status' => 'error', 'message' => '无效的文件']);
        }
    }






}
