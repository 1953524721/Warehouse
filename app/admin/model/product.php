<?php

namespace app\admin\model;

use think\console\input\Argument;
use think\db\exception\DbException;
use think\facade\Db;
use think\facade\Log;
use think\Model;

class product extends Model
{
    protected $table = 'product';

    /**
     * 创建并保存产品信息到数据库
     *
     * @param string $names 产品名称
     * @param string $describe 产品描述
     * @param string $models 产品型号
     * @param string $brand 产品品牌
     * @param string $production 生产商
     * @param int $num 产品数量
     * @param string $unit 产品单位
     * @param string $filePath 产品宣传册文件路径
     * @param string $date 产品入库日期
     *
     * @return int 插入产品的 ID
     */
    public function createProduct(string $names, string $describe, string $models, string $brand, string $production, int $num, string $unit, string $filePath, string $date): int
    {
        // 对输入进行基本的验证和过滤

        $names      = htmlspecialchars($names);
        $describe   = htmlspecialchars($describe);
        $models     = htmlspecialchars($models);
        $brand      = htmlspecialchars($brand);
        $production = htmlspecialchars($production);
        $unit       = htmlspecialchars($unit);
        $filePath   = htmlspecialchars($filePath);
        $date       = htmlspecialchars($date);

        // 验证数字类型
        if (!is_numeric($num)) {
            throw new \InvalidArgumentException("产品数量必须是数字");
        }

        try {
            // 使用当前对象而不是创建新的对象
            $this->names        = $names;
            $this->describe     = $describe;
            $this->models       = $models;
            $this->brand        = $brand;
            $this->production   = $production;
            $this->num          = $num;
            $this->unit         = $unit;
            // 将文件路径保存为产品宣传册的路径
            $this->flier        = $filePath;
            // 保存产品入库日期
            $this->add_date        = $date;

            // 保存数据到数据库
            $this->save();

            // 返回最后插入的记录的 ID
            return $this->id;
        } catch (\Exception $e) {
            // 记录日志或进行其他错误处理
            error_log("保存产品信息时发生错误: " . $e->getMessage());
            throw new \RuntimeException("保存产品信息时发生错误", 0, $e);
        }
    }
    public function getProductsALL($page,$pageSize): array|\think\Collection
    {
        $list = Db::table($this->table)
                  ->order('id', 'desc')
                  ->page($page,$pageSize)
                 ->select();
        return $list;
    }
    public function getProductsName($page, $pageSize, $name): array|\think\Collection
    {
        $list = Db::table($this->table)
                  ->order('id', 'desc')
                  ->where('names', 'like', '%' . $name . '%')
                  ->page($page, $pageSize)
                  ->select();
        return $list;
    }


    public function getTotalProducts(): int
    {
        return $this->count();
    }
    public function findProduct($id)
    {
        // table方法必须指定完整的数据表名
       return Db::table($this->table)->where('id', $id)->find();
    }
    public function updateProduct($id,string $names, string $describe, string $models, string $brand, string $production, int $num, string $unit, string $filePath, string $date): mixed
    {

        $names      = htmlspecialchars($names);
        $id         = htmlspecialchars($id);
        $describe   = htmlspecialchars($describe);
        $models     = htmlspecialchars($models);
        $brand      = htmlspecialchars($brand);
        $production = htmlspecialchars($production);
        $unit       = htmlspecialchars($unit);
        $filePath   = htmlspecialchars($filePath);
        $date       = htmlspecialchars($date);

        // 验证数字类型
        if (!is_numeric($num)) {
            throw new \InvalidArgumentException("产品数量必须是数字");
        }
        try {
            return Db::name($this->table)->where('id', $id)->update([
                'names'      => $names,
                'describe'   => $describe,
                'models'     => $models,
                'brand'      => $brand,
                'production' => $production,
                'num'        => $num,
                'unit'       => $unit,
                'flier'      => $filePath,
                'add_date'   => $date
            ]);
        } catch (DbException $e) {
            Log::error("更新产品信息时发生错误: " . $e->getMessage());
            return $e->getMessage();
        }
    }
    public function outstockProduct($id, $quantity): array
    {
        // 获取当前产品的库存数量
        $product = $this->findProduct($id);

        if (!$product) {
            return ['status' => 'error', 'message' => '产品不存在'];
        }

        // 获取当前库存数量
        $currentStock = $product['num'];

        // 检查库存是否足够
        if ($currentStock < $quantity) {
            return ['status' => 'error', 'message' => '库存不足'];
        }

        // 计算新的库存数量
        $newStock = $currentStock - $quantity;

        // 更新数据库中的库存数量
        try {
            $result = Db::name($this->table)->where('id', $id)->update([
                'num' => $newStock
            ]);

            if ($result) {
                return ['status' => 'success', 'message' => '出库成功', 'new_stock' => $newStock];
            } else {
                return ['status' => 'error', 'message' => '更新库存失败'];
            }
        } catch (DbException $e) {
            Log::error("更新库存时发生错误: " . $e->getMessage());
            return ['status' => 'error', 'message' => '更新库存时发生错误'];
        }
    }
}
