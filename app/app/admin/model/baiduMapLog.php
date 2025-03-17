<?php

namespace app\admin\model;

use think\facade\Log;
use think\Model;
use think\facade\Db;

class baiduMapLog extends Model
{
    protected $table = 'baidu_map_log';

    public function insertMapLog($dataSet): bool|int|string
    {
        try {
            // 打印数据集
            Log::info("要插入的数据: " . json_encode($dataSet));

            Db::startTrans(); // 开始事务
            $result = Db::name($this->table)->insertGetId($dataSet);
            Db::commit(); // 提交事务

            // 获取最后一条执行的 SQL 语句
            $sql = Db::getLastSql();
            Log::info("执行的 SQL 语句: " . $sql);

            return $result;
        } catch (\Exception $e) {
            Db::rollback(); // 回滚事务

            Log::error("插入数据时发生错误：" . $e->getMessage());

            // 获取最后一条执行的 SQL 语句
            $sql = Db::getLastSql();
            Log::info("执行的 SQL 语句: " . $sql);

            return false;
        }
    }

}
