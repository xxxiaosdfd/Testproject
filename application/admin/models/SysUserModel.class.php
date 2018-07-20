<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/4
 * Time: 11:12
 */

namespace application\admin\models;


use core\mybase\Model;

class SysUserModel extends Model
{
    /**根据用户名密码获取用户信息*/
    public function getUserByNameAndPwd($args)
    {
        $sql = " SELECT * FROM sysuser  WHERE name=? AND pwd=?";
        $result = $this->query($sql, $args);
        if (count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }

}