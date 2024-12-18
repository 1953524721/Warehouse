<?php

namespace app\admin\model;

use think\Collection;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
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
     * @throws DbException
     * @throws DataNotFoundException
     * @throws ModelNotFoundException
     */
    function getUser(string $name, string $pwd): mixed
    {
        // 根据用户名查询数据库中的用户信息
        $user = $this->where('name', $name)->find();

        if ($user && password_verify($pwd, $user['pwd']))
        {
            return $user;
        }
    }

    /**
     * 根据用户ID查找用户信息
     *
     * @param int $id 用户ID
     * @return array|null 返回用户信息数组，如果未找到则返回null
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    public function findUser(int $id): ?array
    {
        return
            Db::table($this->table)->where('id', $id)->find();
    }
    public function findUserName($name)
    {
        return Db::table($this->table)->where('name', $name)->find();
    }

    /**
     * 获取所有用户信息，按页码和每页大小分页
     *
     * @param int $page 页码
     * @param int $pageSize 每页大小
     * @return array|Collection 返回用户信息的集合或数组
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    public function getUserALL(int $page, int $pageSize): array|\think\Collection
    {
        return Db::table($this->table)
            ->order('id', 'desc')
            ->page($page,$pageSize)
            ->select();
    }

    /**
     * 获取所有用户的总数
     *
     * @return int 用户总数
     */
    public function getUserALLCount(): int
    {
        return $this->count();
    }

    /**
     * 更新用户的名称
     *
     * @param int $id 用户ID
     * @param string $names 新的用户名称
     * @return int|string 返回受影响的行数或错误信息字符串
     */
    public function updateName(int $id, string $names): int|string
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

    /**
     * 更新用户的密码为一个默认值
     *
     * @param int $id 用户ID
     * @return int|string 返回受影响的行数或错误信息字符串
     */
    public function updatePwd(int $id): int|string
    {
        $id = htmlspecialchars($id);
        $userInfoModel = new UserInfo();
        $data = $userInfoModel->getUserInfo($id);
        try {
            if (empty($data))
            {
                $pwd = '1234567890';
            }
            else
            {
                $pwd  = $data['phone'];
            }
            $pwd = password_hash($pwd, PASSWORD_DEFAULT);
            return Db::name($this->table)->where('id', $id)->update([
                'pwd'      => $pwd,
            ]);

        } catch (DbException $e) {
            Log::error("更新产品信息时发生错误: " . $e->getMessage());
            return $e->getMessage();
        }
    }

    /**
     * 删除指定ID的用户
     *
     * @param int $id 用户ID
     * @return \think\response\Json 返回JSON响应，包含删除状态和消息
     */
    public function deleteUser(int $id): \think\response\Json
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

    /**
     * 更新用户的状态
     *
     * @param int $id 用户ID
     * @param string $newState 新的用户状态
     * @return int|string 返回受影响的行数或错误信息字符串
     */
    public function updateState(int $id, string $newState,$date): int|string
    {
        $id        = htmlspecialchars($id);
        $newState  = htmlspecialchars($newState);
        try {
            return Db::name($this->table)->where('id', $id)->update([
                'state'      => $newState,
                'date'      =>  $date,
            ]);
        } catch (DbException $e) {
            Log::error("更新状态信息时发生错误: " . $e->getMessage());
            return $e->getMessage();
        }
    }
    public function addUser($name,$pwd,$date): int|string
    {
        $name  = htmlspecialchars($name);
        $pwd   = htmlspecialchars($pwd);
        $date  = htmlspecialchars($date);

        try {
            return Db::name($this->table)->insert([
                'name'     => $name,
                'pwd'      => md5($pwd),
                'date'    => $date
            ]);
        } catch (DbException $e) {
            Log::error("添加用户信息时发生错误: " . $e->getMessage());
            return $e->getMessage();
        }
    }
    public function finduserNameALL($page,$pageSize,$name): array|Collection
    {
        return Db::table($this->table)
            ->order('id', 'desc')
            ->where('name', 'like', '%' . $name . '%')
            ->page($page,$pageSize)
            ->select();
    }
    public function finduserNameALLCount($name): int
    {
        return Db::table($this->table)
            ->where('name', 'like', '%' . $name . '%')
            ->count();
    }

}