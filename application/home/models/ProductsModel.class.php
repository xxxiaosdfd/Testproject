<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/15 0015
 * Time: 13:05
 */

namespace application\home\models;


use core\mybase\Model;

class ProductsModel extends Model
{
    public function Products()
    {
        $sql="SELECT * FROM goods ";
        $result=$this->query($sql,null);
//        var_dump($result);

        if(count($result)>0){
            return $result;
        }else{
            return null;
        }
    }

}