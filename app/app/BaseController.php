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
        // 定义单位
        $units = ['', '万', '亿'];
        $result = '';

        // 将数字分割为每4位一组
        $numStr = strval($num);
        $length = strlen($numStr);
        $groupCount = ceil($length / 4); // 计算分组数量

        // 遍历每一组
        for ($i = 0; $i < $groupCount; $i++) {
            $start = max($length - ($i + 1) * 4, 0); // 计算起始位置
            $end = $length - $i * 4; // 计算结束位置
            $group = substr($numStr, $start, $end - $start); // 截取当前组
            $group = intval($group); // 转换为整数

            // 如果当前组不为0，则添加到结果中
            if ($group !== 0) {
                $result = $group . $units[$i] . $result;
            }
        }

        return $result;
    }


}
