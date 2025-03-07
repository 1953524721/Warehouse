<?php

namespace app\admin\controller;


use think\facade\View;

class admin extends comm
{
    public function index()
    {
        return View::fetch('index');
    }

}
