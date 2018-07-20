<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/9 0009
 * Time: 22:24
 */

namespace application\admin\models;


use core\mybase\Model;

class AddgoodsModel extends Model
{
    public function addgoods($args){

        $sql="INSERT INTO goods VALUES(DEFAULT,?,?,?,?,?,?,?)";

        return $this->execute($sql,$args);
    }
    public function getgoodstype()
    {
        $sql="SELECT * FROM goodstype";
        $result=$this->query($sql,null);

        if(count($result)>0){
            return $result;
        }else{
            return null;
        }
    }

    public function getclothes($args)
    {
        $sql="select * from `clothes` where GoodstypeId=? ";
        $result=$this->query($sql,$args);
        if(count($result)>0){
            return $result;
        }else{
            return null;
        }
    }

    public function getcolor($args)
    {
        $sql="select *from `Goodscolor` where ClothesNo=?";
        $result=$this->query($sql,$args);
        if(count($result)>0){
            return $result;
        }else{
            return null;
        }
    }

    public function getsize($args)
    {
        $sql="select *from `Goodssize` where ClothesNo=?";
        $result=$this->query($sql,$args);
        if(count($result)>0){
            return $result;
        }else{
            return null;
        }
    }



}