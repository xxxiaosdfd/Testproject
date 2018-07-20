<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/4
 * Time: 10:13
 */

namespace application\admin\controllers;
use application\admin\models\SysUserModel;


use core\mybase\AdminGroupControllor;
use core\MySession;

class LoginController extends AdminGroupControllor
{
    public function index(){
        $this->display();
    }

    public function login(){
        $feedback = ["errno" => 500, "mess" => "用户名不存在！"];
        //从用户请求中获取数据
        $account = isset($_POST['account']) ? $_POST['account'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;
        $sysremember = isset($_POST["sysremember"]) ? true : false;
        if ($account != null &&  $password!= null) {
            $args = [$account, md5($password)];//密码使用md5函数加密
            $sum = new SysUserModel();
            $result = $sum->getUserByNameAndPwd($args);
            if ($result != null) {
                $feedback = ["errno" => 200, "mess" => "登陆成功！"];
                //用户登录信息保存在session中
                MySession::setSession("id", $result["id"]);
                MySession::setSession("name", $result["name"]);
                MySession::setSession("sysremember", $sysremember);

                if ($sysremember) {
                    MySession::extendSession();
                }
            }
        }
        echo json_encode($feedback, JSON_UNESCAPED_UNICODE);
    }
    public function logout(){
       MySession::destorySession();
       header("location:index.php?g=admin&c=login&a=index");
    }








}