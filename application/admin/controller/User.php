<?php
namespace app\admin\controller;

use think\Controller;

class User extends Controller{
    public function logout(){
        session(null);
        $this->success('退出成功！','admin/user/login');
    }
    //login
    public function login(){
        echo 111;
        exit;
        if(session('?email')){
            $this->redirect('admin/book/booklist');
            return ;
        }
        if(request()->isAjax()){
            $data = [
              'email' => input('email'),
              'pwd' =>input('pwd'),
            ];
            //user book
            $res=model('User')->login($data);
            if($res==1){
                session('email',$data['email']);
                $this->success('登录成功！','admin/book/booklist');
            }else{
                $this->error($res);
            }
        }
        return view();
    }

    /**
     * @return \think\response\View
     */
    public function register(){
        if(request()->isAjax()){
            $data = [
                'email' => input('email'),
                'pwd' =>input('pwd'),
                'conpwd' =>input('conpwd'),
                'captcha' =>input('captcha'),
            ];
            //user book
            $res=model('User')->register($data);
            if($res==1){
                $this->success('注册成功！','admin/user/login');
            }else{
                $this->error($res);
            }
        }
        return view();
    }
    public function forget(){
        if(request()->isAjax()) {
            $data = [
                'email' => input('email'),
            ];
            $res = model("User")->forget($data);
            if ($res == 1) {
                //发送验证码

                $this->success('发送验证码到邮箱了！');
            } else {
                $this->error($res);
            }
        }

        return view();
    }
    public function reset(){
        if(request()->isAjax()) {
            $data = [
                'email' => input('email'),
                'code' =>input('code'),
                'pwd' =>input('pwd'),
            ];
            $res = model("User")->reset($data);
            if ($res == 1) {
                $this->success('重置密码成功!','admin/user/login');
            } else {
                $this->error($res);
            }
        }


    }
}