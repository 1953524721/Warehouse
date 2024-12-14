<?php

namespace app\admin\controller;

use app\BaseController;
use app\Request;

class Userinfo extends BaseController
{
    public function updateUser(Request $request): \think\response\Json
    {
        $data['id']              = $request->param('id');
        $data['name']            = $request->param('name');
        $data['corporate_name']  = $request->param('corporate_name');
        $data['phone']           = $request->param('phone');
        $data['base']            = $request->param('base');
        $data['status']          = $request->param('status');
        $data['belongs']         = $request->param('belongs');
        $data['email']           = $request->param('email');

        return json($data);








    }
}