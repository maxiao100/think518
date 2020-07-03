<?php

namespace app\common\model;

use think\Model;

class User extends Model {
    public function login($data){
        //验证
        $validate = new \app\common\validate\User();
        if($validate->scene('login')->check($data)==0){
            return $validate->getError();
        }
        //数据库找
        $data['pwd']=md5($data['pwd']);
        $res=$this->where($data)->find();
        if($res){
            return 1;
        }else{
            return "邮箱或密码错误！";
        }
    }
    public function register($data){
        //验证
        $validate = new \app\common\validate\User();
        if($validate->scene('register')->check($data)==0){
            return $validate->getError();
        }
        //数据库找
        $res=$this->where('email',$data['email'])->find();
        if($res){
            return "注册失败，邮箱已经存在！";
        }
//        $user = User::create([
//            'name'  =>  'thinkphp',
//            'email' =>  'thinkphp@qq.com'
//        ], ['name','email'], true);
        $this->create([
           'email'=>$data['email'],
           'pwd'=> md5($data['pwd']),
        ]);
        return 1;
    }
    public function forget($data){
        $validate = new \app\common\validate\User();
        if($validate->scene('forget')->check($data)==0){
            return $validate->getError();
        }
        //数据库找
        $res=$this->where($data)->find();
        if($res){
            $code = mt_rand(1000,9999);
            session('code',$code);
            sendemail($data['email'],'验证码: '.session('code') ,'找回密码');
            return 1;
        }else{
            return '邮箱不存在!';
        }
    }
    public function reset($data){
        $validate = new \app\common\validate\User();
        if($validate->scene('reset')->check($data)==0){
            return $validate->getError();
        }
        if($data['code']!=session('code')){
            return '验证码错误';
        }
        //find
        $res=$this->where('email',$data['email'])->find();
        $res['pwd']=md5($data['pwd']);
        //数据库修改
        //$this->save($res);
        $res->save();
        return 1;
    }
}