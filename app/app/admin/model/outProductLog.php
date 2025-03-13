<?php

namespace app\admin\model;

use think\facade\Db;
use think\facade\Log;
use think\Model;

class outProductLog extends Model
{
    protected $table = 'out_product_log';

    public function addOutProduct($data): void
    {
        $data = new outProductLog($data);
        $data->save();
        Log::info("添加出库记录成功");
    }
    public function getProductAll($page, $pageSize): array|\think\Collection
    {
        return  Db::name($this->table)->page($page, $pageSize)->order('id', 'desc')->select();
    }
    public function getProductAllCount(): int
    {
        return  Db::name($this->table)->select()->count();
    }

}