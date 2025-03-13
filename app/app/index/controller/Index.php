<?php
declare (strict_types = 1);

namespace app\index\controller;

use think\captcha\facade\Captcha;

class Index
{
    public function index(): string
    {
        return '您好！这是一个[index]示例应用';
    }
    public function verify(): array|\think\Response
    {
        return Captcha::create();
    }
}
