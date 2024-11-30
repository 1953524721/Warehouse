<?php

namespace app\admin\model;

use think\db\exception\DbException;
use think\facade\Db;
use think\facade\Log;
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

    public function findUser($id)
    {
        return
            Db::table($this->table)->where('id', $id)->find();
    }
    public function getUserALL($page,$pageSize): array|\think\Collection
    {
        return Db::table($this->table)
            ->order('id', 'desc')
            ->page($page,$pageSize)
            ->select();
    }
    public function getUserALLCount(): int
    {
        return $this->count();
    }
    public function updateName($id, $names): int|string
    {
        $names      = htmlspecialchars($names);
        $id         = htmlspecialchars($id);
        try {
            return Db::name($this->table)->where('id', $id)->update([
                'name'      => $names,
            ]);
        } catch (DbException $e) {
            Log::error("更新产品信息时发生错误: " . $e->getMessage());
            return $e->getMessage();
        }
    }
    public function updatePwd($id): int|string
    {
        $id = htmlspecialchars($id);
        try {
            return Db::name($this->table)->where('id', $id)->update([
                'pwd'      => md5('222222'),
            ]);
        } catch (DbException $e) {
            Log::error("更新产品信息时发生错误: " . $e->getMessage());
            return $e->getMessage();
        }
    }
    public function deleteUser($id): \think\response\Json
    {
        $id   = htmlspecialchars($id);
        $list = $this->findUser($id);
        $list = json_encode($list);
        $list = json_decode($list,true);
        $name = $list['name'];
        if ($name === 'admin') {
            return json(['status' => 'error', 'message' => '管理员不能删除']);
        }elseif ($this->destroy($id)) {
            return json(['status' => 'success', 'message' => '删除成功']);
        } else {
            return json(['status' => 'error', 'message' => '删除失败']);
        }
    }
    public function updateState($id,$newState): int|string
    {
        $id         = htmlspecialchars($id);
        $newState  = htmlspecialchars($newState);
        try {
            return Db::name($this->table)->where('id', $id)->update([
                'state'      => $newState,
            ]);
        } catch (DbException $e) {
            Log::error("更新状态信息时发生错误: " . $e->getMessage());
            return $e->getMessage();
        }
    }
}