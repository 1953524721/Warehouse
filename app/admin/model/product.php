<?php

namespace app\admin\model;

use think\facade\Db;
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
        $names      = filter_var($names, FILTER_SANITIZE_STRING);
        $describe   = filter_var($describe, FILTER_SANITIZE_STRING);
        $models     = filter_var($models, FILTER_SANITIZE_STRING);
        $brand      = filter_var($brand, FILTER_SANITIZE_STRING);
        $production = filter_var($production, FILTER_SANITIZE_STRING);
        $unit       = filter_var($unit, FILTER_SANITIZE_STRING);
        $filePath   = filter_var($filePath, FILTER_SANITIZE_STRING);
        $date       = filter_var($date, FILTER_SANITIZE_STRING);

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
            $this->date         = $date;

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
                  ->limit($page,$pageSize)
                 ->select();
        return $list;
    }

}
