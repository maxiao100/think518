<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::group('admin',function (){

    Route::rule('logout','admin/user/logout','get|post');
    Route::rule('login','admin/user/login','get|post');
    Route::rule('register','admin/user/register','get|post');
    Route::rule('foget','admin/user/forget','get|post');
    Route::rule('reset','admin/user/reset','get|post');
    Route::rule('booklist','admin/book/booklist','get|post');
    Route::rule('bookadd','admin/book/bookadd','get|post');
    Route::rule('onebook/[:isbn]','admin/book/one','get|post');
    Route::rule('bookdelete/[:isbn]','admin/book/bookdelete','get|post');
    Route::rule('bookedit/[:isbn]','admin/book/bookedit','get|post');

});