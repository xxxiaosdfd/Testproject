<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/27
 * Time: 15:45
 */

namespace core\mybase;


use core\Application;

class View
{
    public $view_dir;

    public $data=array();

    public function display($view_name=null){
        $view_name=isset($view_name)?$view_name:Application::$action;
        include_once $this->view_dir.$view_name.".html";
    }

    public function assign($name,$value){
        $this->data[$name]=$value;
    }
}