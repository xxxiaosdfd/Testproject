<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/4
 * Time: 17:10
 */

namespace application\admin\models;


use core\mybase\Model;

class UserinfoModel extends Model
{
    public function count($like = null)
    {
        $sql = null;
        if ($like != null) {
            $sql = " SELECT COUNT(1) AS total  FROM hpuser WHERE uname LIKE '%" . $like . "%'";
        } else {
            $sql = " SELECT COUNT(1) AS total FROM hpuser";
        }
        $result = $this->query($sql, null);
        return $result[0]["total"];


    }


    public function list($pageIndex = 1, $pageSize = 10, $like = null)
    {
        if ($like != null) {
            $sql = " SELECT * FROM hpuser WHERE uname LIKE'%" . $like . "%' ORDER BY uid DESC LIMIT " . ($pageIndex - 1) . "," . $pageSize;
        } else {
            $sql = " SELECT * FROM hpuser ORDER BY uid DESC LIMIT " . ($pageIndex - 1) . "," . $pageSize;
        }


        return $this->query($sql, null);
    }

    public function del($args)
    {
        $sql = "DELETE FROM hpuser WHERE uid=?";
        return $this->execute($sql, $args);

    }

    public function deladdress($args)
    {
        $sql = "DELETE FROM address WHERE uid=?";
        return $this->execute($sql, $args);

    }

}