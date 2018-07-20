<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/13
 * Time: 17:04
 */

namespace application\admin\controllers;

use core\mybase\AdminGroupControllor;

use application\admin\models\ChartsModel;

class ChartsController extends AdminGroupControllor
{
    public function charts()
    {
        $this->display();
    }

    public function getGoodsNums()
    {
        $gm = new ChartsModel;

        $result = $gm->getGoodsNums();


       echo  json_encode($result, JSON_UNESCAPED_UNICODE);

    }

}