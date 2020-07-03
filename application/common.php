<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

use PHPMailer\PHPMailer\PHPMailer;
function sendemail($email,$body,$subject){
    //以qq邮箱为例子
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.qq.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = '3433152135@qq.com';                     // SMTP username
    $mail->Password   = 'ykdkiopjcnvwdbdd';//注意这里不是qq密码                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to
    //Recipients
    $mail->setFrom('3433152135@qq.com', '书城');//第一个参数和$mail->Username同
    $mail->addAddress($email);     //接受人的邮箱
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;//我是标题
    $mail->Body    = $body;//我是内容
    return $mail->send();
}