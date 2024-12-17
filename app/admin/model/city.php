<?php

namespace app\admin\model;

use think\facade\Db;
use think\Model;

class city extends Model
{
    protected $table = 'city';

    public function getCity($id): array|\think\Collection
    {
        return Db::name($this->table)->where('city_id',$id)->find();
    }
    public function getCityParentId($pid): array|\think\Collection
    {
        return Db::name($this->table)->where('parent_id',$pid)->select();
    }
}