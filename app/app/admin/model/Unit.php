<?php

namespace app\admin\model;

use think\db\exception\DbException;
use think\facade\Db;
use think\facade\Log;
use think\Model;

class Unit extends Model
{
    protected $table = 'unit';
    public function selectAll(): array|\think\Collection
    {
        return Db::table('unit')->select();
    }
    public function geUnitALL($page,$pageSize): array|\think\Collection
    {
        $list = Db::table($this->table)
            ->order('id', 'desc')
            ->page($page,$pageSize)
            ->select();
        return $list;
    }

    public function getTotalUnit(): int
    {
        return $this->count();
    }
    public function updateUnit($id,$unit_name,$date): int
    {
        $id   = htmlspecialchars($id);
        $unit_name = htmlspecialchars($unit_name);
        try {
            return Db::name($this->table)->where('id', $id)->update([
                'unit_name' => $unit_name,
                'date'      => $date,
            ]);
        } catch (DbException $e) {
            Log::error("更新产品信息时发生错误: " . $e->getMessage());
            return $e->getMessage();
        }
    }
    public function getUnitByName($name): array|Db|Model|null
    {
        $name = htmlspecialchars($name);
        return Db::table($this->table)->where('unit_name', $name)->find();
    }
    public function deleteUnit($id): int
    {
        $id = htmlspecialchars($id);
        try {
            Db::name($this->table)->where('id', $id)->delete();
        } catch (DbException $e) {
            Log::error("删除产品信息时发生错误: " . $e->getMessage());
            return $e->getMessage();
        }
        return 1;
    }
    public function addUnit($name): bool|string
    {
        $name = htmlspecialchars($name);
        $date = date("Y-m-d H:i:s");
        try {
            Db::name($this->table)->insert([
                'unit_name' => $name,
                'date' =>$date
            ]);
            return true;
        } catch (DbException $e) {
            Log::error("添加产品信息时发生错误: " . $e->getMessage());
            return $e->getMessage();
        }
    }
}