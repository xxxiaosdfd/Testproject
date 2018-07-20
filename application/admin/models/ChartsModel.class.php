<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/12 0012
 * Time: 22:37
 */

namespace application\admin\models;


use core\mybase\Model;

class ChartsModel extends Model
{
    public function getGoodsNums()
    {
        $sql="select c.clothesName gname ,g.GsNum gnum  from goods g inner join clothes c on c.ClothesNo=g.ClothesNo";
        $result=$this->query($sql,null);
        if(count($result)>0){
            return $result;
        }else{
            return null;
        }
    }

}