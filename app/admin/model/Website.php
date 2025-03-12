<?php

namespace app\admin\model;

use think\db\exception\DbException;
use think\facade\Db;
use think\facade\Log;
use think\Model;

class Website extends Model
{
    protected $table = 'website';

    public function getWebsite()
    {
        return Db::name($this->table)->where('name','ICP')->find();
    }
    public function updateWebsite($name,$value): int|string
    {
        $name   = htmlspecialchars($name);
        $value = htmlspecialchars($value);
        try {
            return Db::name($this->table)->where('name', $name)->update([
                'value' => $value,
            ]);
        } catch (DbException $e) {
            Log::error("更新产品信息时发生错误: " . $e->getMessage());
            return $e->getMessage();
        }
    }




}