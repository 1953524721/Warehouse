<?php

namespace app\admin\model;

use think\Model;

class product extends Model
{
    protected $table = 'product';

    public function saveProduct($names, $describe, $models, $brand, $production, $num, $unit, $filePath)
    {
        $user = new product();
        $user->names = $names;
        $user->describe = $describe;
        $user->models = $models;
        $user->brand = $brand;
        $user->production = $production;
        $user->num = $num;
        $user->unit = $unit;
        $user->flier = $filePath;

        // 保存数据到数据库
        $user->save();

        // 返回最后插入的记录的 ID
        return $user->id;
    }
}
