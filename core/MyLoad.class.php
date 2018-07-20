<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/27
 * Time: 10:50
 */
namespace core;
class MyLoad
{
    public static function myautoload($className){
        $path=str_replace("\\","/",$className);
        $filePath=$path.".class.php";
        if (file_exists($filePath)){
            include $filePath;
        }else{
            die("加载的文件不存在：".$filePath);
        }
    }

    public static function registerAutoload(){
        spl_autoload_register("self::myautoload");
    }

}