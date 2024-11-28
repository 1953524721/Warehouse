<?php

namespace app\admin\model;

use think\Model;

class User extends Model
{
    // 定义受保护的变量$table，指定与用户模型关联的数据库表名为'user'
    protected $table = 'user';

    /**
     * 根据用户名和密码获取用户信息
     *
     * @param string $name 用户名
     * @param string $pwd 密码
     *
     * @return mixed 查询到的用户信息，如果没有找到匹配的用户则返回null
     */
    function getUser(string $name, string $pwd): mixed
    {
      // 使用链式调用，根据用户名和密码查询数据库中的用户信息
        // 返回查询结果
      return $this->where('name', $name)->where('pwd', $pwd)->find();
    }


}