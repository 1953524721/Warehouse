<?php

namespace app\admin\model;

use think\facade\Db;

class UserInfo
{
    protected string $table = 'user_info';


    public function getUserInfo($user_id)
    {
        return Db::name($this->table)->where('id',$user_id)->find();
    }
    public function columns()
    {
        return Db::query("SHOW COLUMNS FROM user_info");
    }
    public function updateUserInfo()
    {

    }





}