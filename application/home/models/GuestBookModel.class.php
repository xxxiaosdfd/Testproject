<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/1 0001
 * Time: 10:43
 */

namespace application\home\models;

use core\mybase\Model;

class GuestBookModel extends Model
{
    public function add($args)
    {
        $sql="INSERT INTO guestbook VALUES(default,?,?,?,?);";
        //$args=null;//如果持久化不需要参数，项目中统一使用null
        return $this->execute($sql,$args);


    }

}