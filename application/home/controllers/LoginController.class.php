<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/29
 * Time: 11:18
 */

namespace application\home\Controllers;

use core\mybase\Controller;

class loginController extends Controller
{

    /**打开登陆视图*/
    public function index(){
        $this->display();
    }

    /**打开注册视图*/
    public function signup(){
        $this->display();
    }

    /**打开忘记密码视图*/
    public function forgot(){
        $this->display();
    }
}