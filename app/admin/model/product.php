<?php

namespace app\admin\model;


use DateTime;
use think\db\exception\DbException;
use think\facade\Db;
use think\facade\Log;
use think\Model;

class product extends Model
{
    protected $table = 'product';
    public function createProduct(string $names, string $describe, string $models, string $brand, string $production, int $num, string $unit, string $filePath, string $date): int
    {
        // 验证并清理输入
        $input = $this->sanitizeInput([
            'names'      => $names,
            'describe'   => $describe,
            'models'     => $models,
            'brand'      => $brand,
            'production' => $production,
            'unit'       => $unit,
            'flier'      => $filePath,
            'add_date'   => $date
        ]);

        // 验证数字类型
        if (!is_numeric($num)) {
            throw new \InvalidArgumentException("产品数量必须是数字");
        }

        try {
            // 设置属性
            $this->names      = $input['names'];
            $this->describe   = $input['describe'];
            $this->models     = $input['models'];
            $this->brand      = $input['brand'];
            $this->production = $input['production'];
            $this->num        = $num;
            $this->unit       = $input['unit'];
            $this->flier      = $input['flier'];
            $this->add_date   = $input['add_date'];

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

    public function updateProduct(int $id, string $names, string $describe, string $models, string $brand, string $production, int $num, string $unit, string $filePath, string $date): bool
    {
        // 验证并清理输入
        $input = $this->sanitizeInput([
            'names'      => $names,
            'describe'   => $describe,
            'models'     => $models,
            'brand'      => $brand,
            'production' => $production,
            'unit'       => $unit,
            'flier'      => $filePath,
            'add_date'   => $date
        ]);

        // 验证数字类型
        if (!is_numeric($num)) {
            throw new \InvalidArgumentException("产品数量必须是数字");
        }

        try {
            // 更新数据到数据库
            $result = Db::name($this->table)->where('id', $id)->update([
                'names'      => $input['names'],
                'describe'   => $input['describe'],
                'models'     => $input['models'],
                'brand'      => $input['brand'],
                'production' => $input['production'],
                'num'        => $num,
                'unit'       => $input['unit'],
                'flier'      => $input['flier'],
                'add_date'   => $input['add_date']
            ]);

            return $result != false;
        } catch (DbException $e) {
            Log::error("更新产品信息时发生错误: " . $e->getMessage());
            throw new \RuntimeException("更新产品信息时发生错误", 0, $e);
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


    public function getProductsALL($page, $pageSize, $search = '', $productions = ''): array|\think\Collection
    {
        $query = Db::table('product');

        // 如果搜索条件不为空，则添加搜索条件
        if (!empty($search)) {
            $query->where('names', 'like', '%' . $search . '%');
        }

        // 如果生产地条件不为空，则添加生产地条件
        if (!empty($productions)) {
            $query->where('production', $productions);
        }

        // 获取分页数据
        return $query->page($page, $pageSize)->order('id', 'desc')->select()->toArray();
    }
    public function getProductsCount($page, $pageSize, $search = '', $productions = ''): int
    {
        $query = Db::table('product');

        // 如果搜索条件不为空，则添加搜索条件
        if (!empty($search)) {
            $query->where('names', 'like', '%' . $search . '%');
        }

        // 如果生产地条件不为空，则添加生产地条件
        if (!empty($productions)) {
            $query->where('production', $productions);
        }

        return $query->select()->count();
    }
    public function findProduct($id): array|Db|Model|null
    {
        // table方法必须指定完整的数据表名
       return Db::table($this->table)->where('id', $id)->find();
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
    public function sumProductNum(): float
    {
        try {
            // 使用 Db 查询构建器计算 num 字段的总和
            $totalNum = Db::table($this->table)->sum('num');

            return $totalNum;
        } catch (DbException $e) {
            Log::error("计算产品数量总和时发生错误: " . $e->getMessage());
            throw new \RuntimeException("计算产品数量总和时发生错误", 0, $e);
        }
    }
    public function getProductCount(): float
    {
        try {
            return $this->count();
        } catch (DbException $e) {
            Log::error("计算产品数量总和时发生错误: " . $e->getMessage());
            throw new \RuntimeException("计算产品数量总和时发生错误", 0, $e);
        }
    }




}
