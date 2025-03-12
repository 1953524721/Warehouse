<?php
declare (strict_types = 1);

namespace app;

use app\admin\controller\Browse;
use think\App;
use think\exception\ValidateException;
use think\Validate;

/**
 * 控制器基础类
 */
abstract class BaseController
{
    /**
     * Request实例
     * @var \think\Request
     */
    protected \think\Request $request;

    /**
     * 应用实例
     * @var \think\App
     */
    protected App $app;

    /**
     * 是否批量验证
     * @var bool
     */
    protected bool $batchValidate = false;

    /**
     * 控制器中间件
     * @var array
     */
    protected array $middleware = [];

    /**
     * 构造方法
     * @access public
     * @param  App  $app  应用对象
     */
    public function __construct(App $app)
    {
        $allowedUntil = strtotime('2024-12-01 00:00:00');
        $date  = date('Y-m-d H:i:s');
        if ($date>$allowedUntil)
        {
            return '<h1>程序已过期，请联系管理员</h1>';
        }
        else
        {
            $this->app     = $app;
            $this->request = $this->app->request;
            // 控制器初始化
            $this->initialize();
        }

    }

    // 初始化
    protected function initialize()
    {}

    /**
     * 验证数据
     * @access protected
     * @param  array        $data     数据
     * @param  string|array $validate 验证器名或者验证规则数组
     * @param  array        $message  提示信息
     * @param  bool         $batch    是否批量验证
     * @return array|string|true
     * @throws ValidateException
     */
    protected function validate(array $data, string|array $validate, array $message = [], bool $batch = false)
    {
        if (is_array($validate)) {
            $v = new Validate();
            $v->rule($validate);
        } else {
            if (strpos($validate, '.')) {
                // 支持场景
                [$validate, $scene] = explode('.', $validate);
            }
            $class = false !== strpos($validate, '\\') ? $validate : $this->app->parseClass('validate', $validate);
            $v     = new $class();
            if (!empty($scene)) {
                $v->scene($scene);
            }
        }

        $v->message($message);

        // 是否批量验证
        if ($batch || $this->batchValidate) {
            $v->batch(true);
        }

        return $v->failException(true)->check($data);
    }
    public function getLog(): int|string
    {
        $browse = new Browse();
        return $browse->createBrowse();
    }
    // 阿拉伯数字转汉字
    public function numberToChinese($num): string
    {
        $chineseNumbers = ['零', '一', '二', '三', '四', '五', '六', '七', '八', '九'];
        $units = ['', '十', '百', '千'];
        $bigUnits = ['', '万', '亿'];

        $str = strval($num);
        $len = strlen($str);
        $result = '';

        for ($i = 0; $i < $len; $i++)
        {
            $digit = intval($str[$i]);
            $pos = $len - $i - 1;
            $unit = $units[$pos % 4];
            $bigUnit = $bigUnits[intval($pos / 4)];

            // 处理零的合并
            if ($digit === 0) {
                if ($result !== '' && substr($result, -3) !== '零' && substr($result, -3) !== $bigUnit)
                {
                    $result .= '零';
                }
            } else
            {
                $result .= $chineseNumbers[$digit] . $unit;
            }

            // 添加万/亿单位
            if ($pos % 4 === 0) {
                $result = rtrim($result, '零') . $bigUnit;
            }
        }

        // 处理特殊情况（如“一十”简化为“十”）
        if (substr($result, 0, 6) === '一十')
        {
            $result = substr($result, 3);
        }

        return $result;
    }

}
