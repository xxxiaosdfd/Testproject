<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/7 0007
 * Time: 14:05
 */

namespace application\admin\controllers;

use application\admin\models\UserinfoModel;
use core\mybase\AdminGroupControllor;


class UserinfoController extends AdminGroupControllor
{
    public function userinfo(){
        $this->display();
    }
    public function list()
    {
        $pageIndex = isset($_GET['pageIndex']) ? $_GET['pageIndex'] : 1;
        $pageSize = isset($_GET['pageSize']) ? $_GET['pageSize'] : 10;
        $like = isset($_GET['like']) ? $_GET['like'] : null;
        $gm = new UserinfoModel();
        $total = $gm->count($like);
        $list = $gm->list($pageIndex, $pageSize, $like);
        $result = ["total" => $total, "rows" => $list];
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    public function del()
    {
        $uid = isset($_GET['uid']) ? $_GET['uid'] : -1;

        $gmd = new UserinfoModel();
        $resultt = $gmd->deladdress([$uid]);

        $gm = new UserinfoModel();
        $result = $gm->del([$uid]);

        if ($result > 0) {
            $this->success("删除用户成功，2秒后跳转回管理视图。", "?g=admin&c=userinfo&a=userinfo");
        } else {
            $this->fail("删除用户失败，2秒后跳回管理视图", "?g=admin&c=userinfo&a=userinfo");
        }
    }

}