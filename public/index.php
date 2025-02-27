<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2019 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]
namespace think;

require __DIR__ . '/../vendor/autoload.php';

$date = date('Y-m-d H:i:s');
if ($date>='2025-12-30 13:13:35')
{
    echo '<h1>程序已过期，请联系管理员</h1>';
}
else
{
    // 执行HTTP应用并响应
    $http = (new App())->http;

    $response = $http->run();

    $response->send();

    $http->end($response);

}
