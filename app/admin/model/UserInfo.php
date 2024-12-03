<?php

namespace app\admin\model;

use think\facade\Db;

class UserInfo
{
    protected $table = 'user_info';


    public function getUserInfo($user_id)
    {
        return Db::name($this->table)->where('id',$user_id)->find();
    }
}