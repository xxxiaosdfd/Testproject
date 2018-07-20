<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/3
 * Time: 15:12
 */

namespace core;


class MySession
{
    public static function startSession(){
        if (!isset($_SESSION)){
            session_start();
        }
    }

    public static function destorySession(){
        if (isset($_COOKIE[session_name()])){
            setcookie(session_name(),null,time()-1,"/");
        }
        session_destroy();
    }

    public static function setSession($name,$value){
        $_SESSION[$name]=$value;
    }

    public static function getSession($name){
        if (isset($_SESSION[$name])){
            return $_SESSION[$name];
        }else{
            return null;
        }
    }

    public static function extendSession($time=1*60*60){
        setcookie(session_name(),session_id(),time()+$time,"/");
    }
}