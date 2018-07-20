<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/4
 * Time: 17:10
 */

namespace application\admin\models;


use core\mybase\Model;

class OrderModel extends Model
{
    public function count($like = null)
    {
        $sql = null;
        if ($like != null) {
            $sql = " SELECT COUNT(1) AS total  FROM goodsorder WHERE onumb LIKE '%" . $like . "%'";
        } else {
            $sql = " SELECT COUNT(1) AS total FROM goodsorder";
        }
        $result = $this->query($sql, null);
        return $result[0]["total"];


    }


    public function list($pageIndex = 1, $pageSize = 10, $like = null)
    {
        if ($like != null) {
            //$sql = " SELECT * FROM goodorder"." WHERE onumb LIKE'%" . $like . "%' ORDER BY onumb DESC LIMIT " . ($pageIndex - 1) . "," . $pageSize;
            $sql = " select g.gid,g.onumb,g.GsId,g.price,g.is_receipt,h.uname ,g.ocount,g.timeorder,g.addressId from goodsorder g".
                " inner join hpuser h  on g.uid=h.uid ".
                "inner join goods gs  on g.gsid= gs.gsid ".
                " WHERE g.onumb LIKE'%" . $like . "%' ORDER BY g.onumb DESC LIMIT " . ($pageIndex - 1) . "," . $pageSize;
        } else {

            //$sql = " SELECT * FROM goodorder ORDER BY gid DESC LIMIT " . ($pageIndex - 1) . "," . $pageSize;
            //$sql = " SELECT g.gid,g.onumb,g.price,g.is_receipt,h.uname FROM goodorder g  INNER JOIN hpuser h  on g.uid=h.uid ORDER BY g.gid DESC LIMIT " . ($pageIndex - 1) . "," . $pageSize;

            $sql =" select g.gid ,g.onumb,g.GsId,g.price,g.is_receipt,h.uname ,g.ocount,g.timeorder,g.addressId from goodsorder g".
                " inner join hpuser h  on g.uid=h.uid ".
                "inner join goods gs  on g.gsid= gs.gsid ".
                "ORDER BY g.gid DESC LIMIT ".($pageIndex - 1).",".$pageSize;
        }


        return $this->query($sql, null);
    }

    public function del($args)
    {
        $sql = "DELETE FROM goodsorder WHERE gid =?";
        return $this->execute($sql, $args);

    }
    public function sure($args)
    {
        $sql = "UPDATE goodsorder SET is_receipt = 1 WHERE gid =?";
        return $this->execute($sql, $args);

    }

}