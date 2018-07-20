<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/6
 * Time: 10:29
 */

namespace application\home\controllers;

use core\mybase\Controller;

use application\home\models\GuestBookModel;
class indexController extends Controller
{
    public function index(){
        $this->display();
    }

    public function products(){
        $this->display();
    }
    public function products1(){
        $this->display();
    }


    public function contact(){
        $this->display();
    }


    public function guestbook(){
        $feedback=["error"=>500,"mess"=>"留言失败"];
        $args=[$_POST['uname'],$_POST['uemail'],$_POST['uphone'],$_POST['umessage']];
        $gbm=new GuestBookModel();
        $result=$gbm->add($args);
        if($result>0){
            $feedback['error']=200;
            $feedback['mess']="留言成功";
        }
        echo json_encode($feedback,JSON_UNESCAPED_UNICODE);

    }




}