<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/7 0007
 * Time: 14:05
 */

namespace application\admin\controllers;
use application\admin\models\OnlinegoodsModel;
use core\mybase\AdminGroupControllor;


class OnlinegoodsController extends AdminGroupControllor
{
    public function onlinegoods(){
        $this->display();
    }

    public function list()
    {
        $pageIndex = isset($_GET['pageIndex']) ? $_GET['pageIndex'] : 1;
        $pageSize = isset($_GET['pageSize']) ? $_GET['pageSize'] : 10;
        $like = isset($_GET['like']) ? $_GET['like'] : null;
        $gm = new OnlinegoodsModel();
        $total = $gm->count($like);
        $list = $gm->list($pageIndex, $pageSize, $like);
        $result = ["total" => $total, "rows" => $list];
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    public function del()
    {
        $gsid = isset($_GET['gsid']) ? $_GET['gsid'] : -1;
        $gm = new OnlinegoodsModel();
        $result = $gm->del([$gsid]);
        if ($result > 0) {
            $this->success("删除商品成功，2秒后跳转回全部订单列表", "?g=admin&c=onlinegoods&a=onlinegoods");
        } else {
            $this->fail("删除商品失败，2秒后跳回全部订单列表", "?g=admin&c=onlinegoods&a=onlinegoods");
        }
    }




}