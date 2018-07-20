<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/1 0001
 * Time: 10:43
 */

namespace application\home\models;

use core\mybase\Model;

class UserModel extends Model
{
    public function add($args){
        $sql="INSERT INTO hpuser VALUES(DEFAULT,?,?,?,?);";
        return $this->execute($sql,$args);
    }
    public function getUser($args)
    {
        $sql="SELECT count(1) as result FROM hpuser WHERE uname=?";
        $result=$this->query($sql,$args);
        return $result[0]['result'];
    }
    public function getUserNameAndPwd($args){
        $sql="SELECT * FROM hpuser WHERE uname=? AND upwd=?";
        $result=$this->query($sql,$args);
        if(count($result)>0){
            return $result[0];
        }else{
            return null;
        }
    }

}