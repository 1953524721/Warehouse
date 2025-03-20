<?php

namespace app\admin\controller;
use app\admin\model\Browse as BrowseModel;
use think\facade\Log;
use think\facade\Route;

use think\Request;

/**
 * Browse类用于处理浏览相关操作，包括记录浏览信息、获取浏览信息等
 */
class Browse extends comm
{
    /**
     * 创建并记录浏览信息
     *
     * 该方法收集用户的IP地址、浏览时间、浏览器信息和当前URL，然后调用模型方法创建浏览记录
     *
     * @return int|string 返回创建浏览记录的结果，通常是成功与否的标识或错误信息
     */
    public function createBrowse(): int|string
    {
        $browseIp   = $this->getIP();
        $browseTime = date('Y-m-d H:i:s');
        $browseName = $this->getBrowseInfo();
        $browseUrl  = (string)Route::buildUrl();


        $browse = [
            'browse_ip' => $browseIp,
            'browse_time' => $browseTime,
            'browse_name' => $browseName,
            'browse_url' => $browseUrl,
        ];
        return $this->newBrowseModel()->createBrowse($browse);
    }

    /**
     * 创建并返回一个新的BrowseModel实例
     *
     * @return BrowseModel 返回一个新的BrowseModel对象，用于操作浏览相关的数据库记录
     */
    public function newBrowseModel(): BrowseModel
    {
        return new BrowseModel();
    }

    /**
     * 获取客户端IP地址
     *
     * 从$_SERVER数组中获取客户端IP地址，用于记录浏览信息
     *
     * @return mixed 返回客户端IP地址，如果获取失败则返回空字符串或其他默认值
     */
    public function getIP(): mixed
    {
        return $_SERVER['REMOTE_ADDR'];
    }

    /**
     * 获取浏览信息，包括浏览器名称和版本
     *
     * 该方法调用getBrowser和getBrowserVer方法来获取浏览器信息，如果无法识别则返回'unknown'
     *
     * @return string 返回浏览器名称和版本的组合字符串，如果无法识别则返回'unknown'
     */
    public function getBrowseInfo(): string
    {
        $browser = $this->getBrowser();
        $version = $this->getBrowserVer();
        Log::write('\033[32m浏览信息获取成功\033[0m',$browser . $version);
        return $browser === 'unknown' && $version === 'unknown' ? 'unknown' : $browser . $version;
    }

    /**
     * 识别并返回浏览器名称
     *
     * 通过分析用户代理字符串来识别浏览器，如果无法识别则返回'unknown'
     *
     * @return string 返回识别到的浏览器名称，如果无法识别则返回'unknown'
     */
    private function getBrowser(): string
    {
        try {
            $agent = $_SERVER['HTTP_USER_AGENT'] ?? '';

            $browserPatterns = [
                '/\bMSIE\b|Trident.*rv:(\d+\.\d+)/' => "ie",
                '/\bFirefox\/(\d+\.\d+)/' => "firefox",
                '/\bOPR\/(\d+\.\d+)|Opera\/(\d+\.\d+)/' => "opera",
                '/\bChrome\/(\d+\.\d+\.\d+\.\d+)/' => "chrome",
                '/\bSafari\/(\d+\.\d+)(?!.*\bChrome\b)/' => "safari",
            ];

            foreach ($browserPatterns as $pattern => $browser) {
                if (preg_match($pattern, $agent, $matches)) {
                    return $browser;
                }
            }
            return "unknown";
        } catch (\Throwable $th) {
            error_log("Error in getBrowser: " . $th->getMessage());
        }

        return "unknown";
    }

    /**
     * 识别并返回浏览器版本
     *
     * 通过分析用户代理字符串来识别浏览器版本，如果无法识别则返回'unknown'
     *
     * @return string 返回识别到的浏览器版本，如果无法识别则返回'unknown'
     */
    private function getBrowserVer(): string
    {
        try {
            $agent = $_SERVER['HTTP_USER_AGENT'] ?? '';

            $browserPatterns = [
                '/\bMSIE\b|Trident.*rv:(\d+\.\d+)/' => 1,
                '/\bFirefox\/(\d+\.\d+)/' => 1,
                '/\bOPR\/(\d+\.\d+)|Opera\/(\d+\.\d+)/' => 1,
                '/\bChrome\/(\d+\.\d+\.\d+\.\d+)/' => 1,
                '/\bSafari\/(\d+\.\d+)(?!.*\bChrome\b)/' => 1,
            ];

            foreach ($browserPatterns as $pattern => $matchIndex) {
                if (preg_match($pattern, $agent, $matches)) {
                    return $matches[$matchIndex] ?? "unknown";
                }
            }
            return "unknown";
        } catch (\Throwable $th) {
            error_log("Error in getBrowserVer: " . $th->getMessage());
        }

        return "unknown";
    }

    /**
     * 显示浏览信息页面
     *
     * 该方法用于渲染显示浏览信息的页面，实际数据加载可能在视图层或模型层实现
     *
     * @return \think\response\View 返回渲染后的视图对象
     */
    public function showBrowse(): \think\response\View
    {
        $browse = $this->getLog();
        return view('show');
    }

    /**
     * 获取所有浏览信息并以JSON格式返回
     *
     * 该方法接收请求参数以确定分页信息，并调用模型方法获取浏览信息，然后以JSON格式返回
     *
     * @param Request $request 请求对象，用于获取请求参数
     * @return \think\response\Json 返回包含浏览信息和总记录数的JSON响应
     */
    public function showBrowseAll(Request $request): \think\response\Json
    {
        $page         = $request->post('page','1');
        $pageSize     = $request->param('pageSize', 10);
        $browse       = $this->newBrowseModel()->getBrowseInfoAll($page, $pageSize);
        $total        = $this->newBrowseModel()->getBrowseInfoCount();
        $response     = [
            'data'    => $browse,
            'total'   => $total,
        ];
        return json($response);
    }
}
