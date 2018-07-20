<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/14 0014
 * Time: 23:08
 */

namespace application\home\controllers;


use core\mybase\HomeGroupController;
use core\MySession;
use application\home\models\ShoppingModel;

class ShoppingController extends HomeGroupController
{
    public function Shopping()
    {
        $this->assign("uid", MySession::getSession("uid"));
        $this->assign("uname", MySession::getSession("uname"));
        $uid = $_SESSION['uid'];
//        $uid=4;

        $shopping = new ShoppingModel();

       $result= $shopping->Shopping([$uid]);

//        var_dump($shopping);

//        echo json_encode($result, JSON_UNESCAPED_UNICODE);//转换为JSON模式

        $this->assign("shopping", $result);

        $this->display();
    }

    public function addshop()
    {
        $feedback=["errno"=>500,"mess"=>"添加购物车失败！"];
        $GsId=$_POST['GsId'];

       $argsc=[$GsId,$_SESSION['uid']];


        $args=[$_SESSION['uid'],$GsId,1];
        //获取购物车信息
//        $gid=[$_POST['gid']];//获取用户ID转换为数组模式
//        $gnum=$_POST['gnum'];//获取商品数量
        $carts=new ShoppingModel();
        $result=$carts->addshop($argsc,$args);


//        if ($result > 0) {
//            $this->success("加入购物车成功，2秒后跳转回商品列表", "?g=admin&c=products&a=products");
//        } else {
//            $this->fail("失败，2秒后跳回商品列表", "?g=admin&c=products&a=products");
//        }

        if ($result > 0) {
                $feedback = ["errno" => 200, "mess" => "加入购物车成功"];

            }
        echo json_encode($feedback,JSON_UNESCAPED_UNICODE);//返回json对象

    }


}