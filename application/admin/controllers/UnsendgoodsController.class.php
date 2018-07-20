<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/7 0007
 * Time: 14:05
 */

namespace application\admin\controllers;

use application\admin\models\UnsendgoodsModel;
use core\mybase\AdminGroupControllor;


class UnsendgoodsController extends AdminGroupControllor
{
    public function unsendgoods(){
        $this->display();
    }

    public function list()
    {
        $pageIndex = isset($_GET['pageIndex']) ? $_GET['pageIndex'] : 1;
        $pageSize = isset($_GET['pageSize']) ? $_GET['pageSize'] : 10;
        $like = isset($_GET['like']) ? $_GET['like'] : null;
        $gm = new UnsendgoodsModel();
        $total = $gm->count($like);
        $list = $gm->list($pageIndex, $pageSize, $like);
        $result = ["total" => $total, "rows" => $list];
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    public function del()
    {
        $gid = isset($_GET['gid']) ? $_GET['gid'] : -1;
        $gm = new UnsendgoodsModel();
        $result = $gm->del([$gid]);
        if ($result > 0) {
            $this->success("删除订单成功，2秒后跳转回未发货订单列表", "?g=admin&c=unsendgoods&a=unsendgoods");
        } else {
            $this->fail("删除订单失败，2秒后跳回未发货订单列表", "?g=admin&c=unsendgoods&a=unsendgoods");
        }
    }
    public function sure()
    {
        $gid = isset($_GET['gid']) ? $_GET['gid'] : -1;
        $gm = new UnsendgoodsModel();
        $result = $gm->sure([$gid]);
        if ($result > 0) {
            $this->success("发货成功，2秒后跳转回未发货订单列表", "?g=admin&c=unsendgoods&a=unsendgoods");
        } else {
            $this->fail("发货失败，2秒后跳回未发货订单列表", "?g=admin&c=unsendgoods&a=unsendgoods");
        }
    }


}