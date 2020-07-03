<?php
namespace app\common\validate;

use think\Validate;

class User extends Validate{
    //规则
    protected  $rule = [
        'email|邮箱' => 'require|email',
        'pwd|密码' =>'require',
        'conpwd|确认密码'=>'require|confirm:pwd',
        'captcha|验证码'=>'require|captcha',
        'code|验证码'=>"require",
    ];
    //场景
    protected $scene = [
      'login' => ['email','pwd'],
        'register'=>['email','pwd','conpwd','captcha'],
        'forget'=>['email'],
        'reset' =>['pwd','code'],
    ];

}