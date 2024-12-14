<?php

namespace app\admin\model;

use think\db\exception\DbException;
use think\facade\Db;
use think\facade\Log;

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
    public function updateUserInfo($id,$name,$corporate_name,$phone,$base,$status,$belongs,$email): int|string
    {
        try {
            $date = date("Y-m-d H:i:s");
            return Db::name($this->table)->where('id', $id)->update([
                'name'            => $name,
                'corporate_name'  => $corporate_name,
                'phone'           => $phone,
                'base'            => $base,
                'status'          => $status,
                'belongs'         => $belongs,
                'email'           => $email,
                'date'            => $date
            ]);
        } catch (DbException $e) {
            Log::error("更新产品信息时发生错误: " . $e->getMessage());
            return $e->getMessage();
        }
    }





}