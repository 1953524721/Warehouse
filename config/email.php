<?php
/**
 * 邮件发送模块
 */
return [
   'default'     => 'qq',
   'smtp'        => [
       'host'        => 'smtp.qq.com', // SMTP服务器地址
       'port'        => 465,            // SMTP服务器端口
       'username'    => '1953524721@qq.com', // 发件人邮箱账号
       'password'    => 'clkwkozudraoebje',         // 授权码，不是QQ密码
       'address'     => '1953524721@qq.com', // 发件人邮箱地址
       'name'        => '鹅城县长',              // 发件人名称
       'secure'      => 'ssl',                    // 加密方式
   ],
];
