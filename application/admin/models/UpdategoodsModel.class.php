<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/13 0013
 * Time: 22:28
 */

namespace application\admin\models;

use core\mybase\Model;

class UpdategoodsModel extends Model
{
    public function Updategoods($args)
    {
        $sql = "SELECT * FROM goods WHERE gsid =?";

        $result = $this->query($sql, $args);

        return $result[0];


    }

    public function revisegoods($args){

        $sql="update goods set ClothesNo=?,GsPrice=?,GsNum=?,GsizeId=?,GcolorId=?,Addtime=?,Dirimages=? where Gsid=?";

        return $this->execute($sql,$args);
    }


}