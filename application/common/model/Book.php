<?php

namespace app\common\model;

use think\Model;

class Book extends Model {

    public function bookadd($data){
        //验证
        $validate = new \app\common\validate\Book();
        if($validate->scene('bookadd')->check($data)==0){
            return $validate->getError();
        }
        //数据库找  isbn
        $res=$this->where('isbn',$data['isbn'])->find();
        if($res){
            return "图书添加失败，isbn已经存在了！";
        }
//        $user = User::create([
//            'name'  =>  'thinkphp',
//            'email' =>  'thinkphp@qq.com'
//        ], ['name','email'], true);
        $this->create($data);
        return 1;
    }
    public function bookedit($data){
        //验证
        $validate = new \app\common\validate\Book();
        if($validate->scene('bookedit')->check($data)==0){
            return $validate->getError();
        }
        //数据库找  isbn
        $res=$this->where('isbn',$data['isbn'])->find();
        if($res){
            $res['name']=$data['name'];
            $res['price']=$data['price'];
            $res['num']=$data['num'];
            $res['picture']=$data['picture'];
            $res->save();
            return 1;
        }
    }


}