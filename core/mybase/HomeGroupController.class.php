<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/3
 * Time: 16:40
 */

namespace core\mybase;
use core\Application;
use core\MySession;

class HomeGroupController extends Controller
{
    private $pass=array("register","checkuser","login");

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
            if (isset($_SESSION["remember"])){

            }else{
                header("location:index.php?g=home&c=login&a=index");
            }
        }
    }
}