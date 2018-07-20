<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/7 0007
 * Time: 14:05
 */

namespace application\admin\controllers;

use application\admin\models\OrderModel;
use core\mybase\AdminGroupControllor;


class OrderController extends AdminGroupControllor
{
    public function order(){
        $this->display();
    }


    public function list()
    {
        $pageIndex = isset($_GET['pageIndex']) ? $_GET['pageIndex'] : 1;
        $pageSize = isset($_GET['pageSize']) ? $_GET['pageSize'] : 10;
        $like = isset($_GET['like']) ? $_GET['like'] : null;
        $gm = new OrderModel();
        $total = $gm->count($like);
        $list = $gm->list($pageIndex, $pageSize, $like);
        $result = ["total" => $total, "rows" => $list];
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }


    public function del()
    {
        $gid = isset($_GET['gid']) ? $_GET['gid'] : -1;
        $gm = new OrderModel();
        $result = $gm->del([$gid]);
        if ($result > 0) {
            $this->success("删除用户成功，2秒后跳转回全部订单列表", "?g=admin&c=order&a=order");
        } else {
            $this->fail("删除用户失败，2秒后跳回全部订单列表", "?g=admin&c=order&a=order");
        }
    }


    public function sure()
    {
        $gid = isset($_GET['gid']) ? $_GET['gid'] : -1;
        $gm = new OrderModel();
        $result = $gm->sure([$gid]);

        if ($result > 0) {
            $this->success("发货成功，2秒后跳转回全部订单列表", "?g=admin&c=order&a=order");
        } else {
            $this->fail("发货失败，2秒后跳回全部订单列表", "?g=admin&c=order&a=order");
        }
    }


    //修改
    public function revise()
    {


    }

}