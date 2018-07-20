<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/4
 * Time: 10:13
 */

namespace application\admin\controllers;


use application\admin\models\GbmgrModel;
use core\mybase\AdminGroupControllor;


class GbmgrController extends AdminGroupControllor
{
    public function Gbmgr(){
        $this->display();
    }

    public function inbox(){
        $this->display();
    }


    public function list()
    {

        $pageIndex = isset($_GET['pageIndex']) ? $_GET['pageIndex'] : 1;
        $pageSize = isset($_GET['pageSize']) ? $_GET['pageSize'] : 10;
        $like = isset($_GET['like']) ? $_GET['like'] : null;
        $gm = new GbmgrModel();
        $total = $gm->count($like);
        $list = $gm->list($pageIndex, $pageSize, $like);
        $result = ["total" => $total, "rows" => $list];
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    public function del()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : -1;
        $gm = new GbmgrModel();
        $result = $gm->del([$id]);
        if ($result > 0) {
            $this->success("删除用户成功，2秒后跳转回管理视图。", "?g=admin&c=gbmgr&a=gbmgr");
        } else {
            $this->fail("删除用户失败，2秒后跳回管理视图", "?g=admin&c=gbmgr&a=gbmgr");
        }
    }

}