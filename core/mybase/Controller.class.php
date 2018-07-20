<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/27
 * Time: 15:46
 */

namespace core\mybase;


use core\Application;

class Controller
{
    protected $view;

    public function __construct()
    {
        $this->initView();
    }
    private function initView(){
        $this->view=new view();
        $this->view->view_dir="application/".Application::$group."/views/".strtolower(Application::$controller)."/";
    }

    protected function display($viewname=null){
        $this->view->display($viewname);
    }

    protected function assign($name,$value){
        $this->view->assign($name,$value);
    }
}