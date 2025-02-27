<?php

namespace app\admin\controller;
use app\admin\model\Browse as BrowseModel;
use think\facade\Route;
use think\Request;

class Browse extends comm
{
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

    public function newBrowseModel(): BrowseModel
    {
        return new BrowseModel();
    }

    public function getIP(): mixed
    {
        // 从$_SERVER数组中获取客户端IP地址
        return $_SERVER['REMOTE_ADDR'];
    }

    public function getBrowseInfo(): string
    {

        $browser = $this->getBrowser();
        $version = $this->getBrowserVer();
        return $browser === 'unknown' && $version === 'unknown' ? 'unknown' : $browser . $version;
    }

    private function getBrowser(): string
    {
        try {
            $agent = $_SERVER['HTTP_USER_AGENT'] ?? '';

            // 使用更精确的正则表达式来识别浏览器
            $browserPatterns = [
                '/\bMSIE\b|Trident.*rv:(\d+\.\d+)/' => "ie", // 包括 IE11
                '/\bFirefox\/(\d+\.\d+)/' => "firefox",
                '/\bOPR\/(\d+\.\d+)|Opera\/(\d+\.\d+)/' => "opera", // 包括 Opera 和 Opera GX
                '/\bChrome\/(\d+\.\d+\.\d+\.\d+)/' => "chrome", // 包括 Chrome 及其衍生浏览器
                '/\bSafari\/(\d+\.\d+)(?!.*\bChrome\b)/' => "safari", // 排除 Chrome 的 Safari
            ];

            foreach ($browserPatterns as $pattern => $browser) {
                if (preg_match($pattern, $agent, $matches)) {
                    return $browser;
                }
            }
            return "unknown"; // 默认返回值，如果无法识别
        } catch (\Throwable $th) {
            // 记录异常日志（如果有日志系统）
            error_log("Error in getBrowser: " . $th->getMessage());
        }

        return "unknown"; // 默认返回值，覆盖所有冗余情况
    }

    private function getBrowserVer(): string
    {
        try {
            $agent = $_SERVER['HTTP_USER_AGENT'] ?? '';

            // 使用更精确的正则表达式来识别浏览器版本
            $browserPatterns = [
                '/\bMSIE\b|Trident.*rv:(\d+\.\d+)/' => 1, // 包括 IE11
                '/\bFirefox\/(\d+\.\d+)/' => 1,
                '/\bOPR\/(\d+\.\d+)|Opera\/(\d+\.\d+)/' => 1, // 包括 Opera 和 Opera GX
                '/\bChrome\/(\d+\.\d+\.\d+\.\d+)/' => 1, // 包括 Chrome 及其衍生浏览器
                '/\bSafari\/(\d+\.\d+)(?!.*\bChrome\b)/' => 1, // 排除 Chrome 的 Safari
            ];

            foreach ($browserPatterns as $pattern => $matchIndex) {
                if (preg_match($pattern, $agent, $matches)) {
                    return $matches[$matchIndex] ?? "unknown";
                }
            }
            return "unknown"; // 默认返回值，如果无法识别
        } catch (\Throwable $th) {
            // 记录异常日志（如果有日志系统）
            error_log("Error in getBrowserVer: " . $th->getMessage());
        }

        return "unknown"; // 默认返回值，覆盖所有冗余情况
    }

    public function showBrowse(): \think\response\View
    {
        $browse = $this->getLog();
        return view('show');
    }

    public function showBrowseAll(Request $request): \think\response\Json
    {
        $page         = $request->post('page','1');
        $pageSize     = $request->param('pageSize', 10);
        $browse = $this->newBrowseModel()->getBrowseInfoAll($page, $pageSize);
        $total  = $this->newBrowseModel()->getBrowseInfoCount();
        $response = [
            'data'  => $browse,
            'total' => $total,
        ];
        return json($response);
    }
}
