<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/4
 * Time: 9:56
 */

namespace application\admin\controllers;

use core\mybase\AdminGroupControllor;



class MainController extends AdminGroupControllor
{
    //后台首页
    public function main(){
        $this->display();
    }

    public function bsos()
    {
        $this->display();
    }
    public function blank(){
        $this->display();
    }

}



