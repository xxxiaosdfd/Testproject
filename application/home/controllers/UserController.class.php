<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/1 0001
 * Time: 10:45
 */

namespace application\home\controllers;

use application\home\models\UserModel;
use core\mybase\HomeGroupController;
use core\MySession;

class UserController extends HomeGroupController
{
    public function register()
    {
        $feedback = ["errno" => 500, "mess" => "注册失败"];
        $uname = $_POST['uname'];
        $upwd = $_POST['upwd'];
        $uphone = $_POST['uphone'];
        $uflag=1;
        $args = [$uname, md5($upwd), $uphone,$uflag];

        $um = new UserModel();
        $result = $um->add($args);
        if ($result > 0) {
            $feedback = ["errno" => 200, "mess" => "注册成功"];
        }
        echo json_encode($feedback, JSON_UNESCAPED_UNICODE);
    }

    public function checkuser()
    {
        $uname = $_POST['uname'];
        $args = [$uname];
        $um = new UserModel();
        $result = $um->getUser($args);
        echo $result;
    }

    public function login()
    {
        $feeback = ["errno" => 500, "mess" => "用户名不存在"];
        $uname = isset($_POST['uname']) ? $_POST['uname'] : null;
        $upwd = isset($_POST['upwd']) ? $_POST['upwd'] : null;
        $remember = isset($_POST["remember"]) ? true : false;
        if ($uname != null && $upwd != null) {
            $args = [$uname, md5($upwd)];
            $um = new UserModel();
            $result = $um->getUserNameAndPwd($args);
            if ($result != null) {
                $feeback = ["errno" => 200, "mess" => "登录成功"];
                //MySession::startSession();
                MySession::setSession("uid", $result["uid"]);
                MySession::setSession("uname", $result["uname"]);
                MySession::setSession("uphone", $result["uphone"]);
                MySession::setSession("remember", $remember);
                if ($remember) {
                    MySession::extendSession();
                }
            }
        }
        echo json_encode($feeback, JSON_UNESCAPED_UNICODE);
    }



    public function index(){

        $this->assign("uname",MySession::getSession("uname"));

        $this->display();
    }

    public function products(){
        $this->assign("uname",MySession::getSession("uname"));



        $this->display();
    }
    public function products1(){
        $this->assign("uname",MySession::getSession("uname"));



        $this->display();
    }


    public function contact(){
        $this->assign("uname",MySession::getSession("uname"));



        $this->display();
    }


    public function shopcat(){

        $this->assign("uname",MySession::getSession("uname"));


        $this->display();
    }

    public function checkout(){

        $this->assign("uname",MySession::getSession("uname"));


        $this->display();
    }

    public function pay(){
        $this->assign("uname",MySession::getSession("uname"));

        $this->display();
    }

    public function single(){


        $this->assign("uname",MySession::getSession("uname"));



        $this->display();
    }


}