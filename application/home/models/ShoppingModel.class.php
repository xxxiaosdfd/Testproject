<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/14 0014
 * Time: 23:08
 */

namespace application\home\models;


use core\mybase\Model;

class ShoppingModel extends Model
{
    public function Shopping($args)
    {
        $sql = "select p.shoppingid shoppingid , c.`ClothesName` ClothesName , g.`GsPrice` GsPrice , g.Dirimages  Dirimages ,p.shopnum shopnum from shopping p , goods g , clothes c where   p.Gsid=g.Gsid  and g.ClothesNo=c.clothesNo and p.uid=?";

        $result = $this->query($sql, $args);
//var_dump($result);
        return $result;


    }

    public function addshop($argsc,$args)
    {
        /**根据商品id获取商品信息*/
        $check="select * from shopping where GsId=? and uid=?";//查询购物车商品是否已经存在
        $goods=$this->query($check,$argsc);
        if($goods[0]!=0){//如果商品存在
            $up="update shopping set shopnum=shopnum+1  where GsId=? and uid=?";//增加商品数量
            return $this->execute($up,$argsc);
        }else{//否则 添加商品到购物车
            $sql="INSERT INTO shopping VALUES(default,?,?,?)";
            return $this->execute($sql,$args);
        }

    }



}