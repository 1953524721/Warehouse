<?php

namespace app\admin\model;

use think\db\exception\DbException;
use think\facade\Db;
use think\facade\Log;
use think\Model;

class Browse extends Model
{
    protected $table = 'browse_info';

    public function createBrowse($browse): int|string
    {
        $browse = $this->sanitizeInput($browse);
        try {
            return $this->insert($browse);
        } catch (\Exception $e) {
            // 记录日志或进行其他错误处理
            error_log("保存浏览记录时发生错误: " . $e->getMessage());
            throw new \RuntimeException("保存浏览记录时发生错误", 0, $e);
        }
    }

    protected function sanitizeInput(array $input): array
    {
        // 实现输入验证和清理逻辑
        foreach ($input as $key => $value) {
            // 示例：去除HTML标签，限制字符串长度等
            $input[$key] = htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
            // 可以根据具体需求添加更多验证和清理规则
        }
        return $input;
    }
    public function getBrowseInfoAll($page, $pageSize): array|\think\Collection
    {
      return  Db::name($this->table)->page($page, $pageSize)->order('browse_id', 'desc')->select();
    }
    public function getBrowseInfoCount(): int
    {
      return  Db::name($this->table)->select()->count();
    }
    /**
     * 统计今天的浏览量
     *
     * @return int 今天的浏览量
     */
    public function getTodayBrowseCount(): int
    {
        try {
            // 获取今天的开始时间和结束时间
            $todayStart = date('Y-m-d 00:00:00');
            $todayEnd = date('Y-m-d 23:59:59');

            // 查询今天的浏览量
            return Db::name($this->table)
                ->where('browse_time', '>=', $todayStart)
                ->where('browse_time', '<=', $todayEnd)
                ->count();
        } catch (DbException $e) {
            Log::error("统计今天的浏览量时发生错误: " . $e->getMessage());
            return 0; // 或者根据需求返回其他值
        }
    }
}