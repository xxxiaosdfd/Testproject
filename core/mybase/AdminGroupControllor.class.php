<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/4
 * Time: 13:43
 */

namespace core\mybase;

use core\MySession;
use core\Application;
class AdminGroupControllor extends Controller
{
    private $pass=array("index","login",);

    public function __construct()
    {
        parent::__construct();
        $this->initSession();
        $this->checkLogin();
    }

    private function initSession(){
        MySession::startSession();
    }

    private function checkLogin(){
        if (in_array(Application::$action,$this->pass)){

        }else{
            if (isset($_SESSION["sysremember"])){

            }else{
                header("location:index.php?g=admin&c=login&a=index");
            }
        }
    }
    public function success($msg,$uri){
        echo "<h1>^_^</h1>";
        echo $msg."<br>";
        header("refresh:2,url=index.php".$uri);
    }
    public function fail($msg,$uri){
        echo "<h1>T_T</h1>";
        echo $msg."<br>";
        header("refresh:2,url=index.php".$uri);
    }
}