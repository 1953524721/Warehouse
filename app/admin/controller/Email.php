<?php

namespace app\admin\controller;

use app\BaseController;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email extends BaseController
{
    /**
     * 发送电子邮件
     *
     * 该函数使用PHPMailer库发送电子邮件。它配置了SMTP服务器设置，设置了发件人和收件人信息，并发送了一封HTML格式的邮件。
     * 同时，该函数还处理了在发送过程中可能出现的异常情况。
     */
    public function sendEmail(): void
    {
        // 创建一个PHPMailer实例并启用异常处理
        $mail = new PHPMailer(true);
        try {
            // 配置SMTP服务器设置
            $mail->isSMTP();
            $mail->Host       = config('email.smtp.host');
            $mail->SMTPAuth   = true;
            $mail->Username   = config('email.smtp.username');
            $mail->Password   = config('email.smtp.password');
            $mail->SMTPSecure = config('email.smtp.secure');
            $mail->Port       = config('email.smtp.port');

            // 设置发件人和收件人信息
            $mail->setFrom(config('email.smtp.address'), config('email.smtp.name'));

            $mail->addAddress('liuke1680@hotmail.com', 'Recipient Name'); // 添加收件人

            // 设置邮件内容
            $mail->isHTML(true);
            $mail->Subject = 'Here is the subject';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            // 发送邮件
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            // 捕获并输出邮件发送过程中的错误信息
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
