<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/4
 * Time: 17:10
 */

namespace application\admin\models;


use core\mybase\Model;

class OnlinegoodsModel extends Model
{
    public function count($like = null)
    {
        $sql = null;
        if ($like != null) {
            $sql = " SELECT COUNT(1) AS total  FROM goods WHERE gsid LIKE '%" . $like . "%'";
        } else {
            $sql = " SELECT COUNT(1) AS total FROM goods";
        }
        $result = $this->query($sql, null);
        return $result[0]["total"];


    }


    public function list($pageIndex = 1, $pageSize = 10, $like = null)
    {
        if ($like != null) {
            //$sql = " SELECT * FROM goodorder"." WHERE onumb LIKE'%" . $like . "%' ORDER BY onumb DESC LIMIT " . ($pageIndex - 1) . "," . $pageSize;
            $sql = "select g.gsid asid, g.gsid assid,c.clothesName ,gs.GsizeGame ,gc.GcolorGame ,g.GsPrice ,g.GsNum , g.Addtime from goods g inner join clothes c on c.ClothesNo=g.ClothesNo inner join goodssize gs on gs.GsizeId=g.GsizeId inner join goodscolor gc on gc.GcolorId=g.GcolorId WHERE g.gsid LIKE'%" . $like . "%' ORDER BY g.gsid DESC LIMIT " . ($pageIndex - 1) . "," . $pageSize;
        } else {

            //$sql = " SELECT * FROM goodorder ORDER BY gid DESC LIMIT " . ($pageIndex - 1) . "," . $pageSize;
            //$sql = " SELECT g.gid,g.onumb,g.price,g.is_receipt,h.uname FROM goodorder g  INNER JOIN hpuser h  on g.uid=h.uid ORDER BY g.gid DESC LIMIT " . ($pageIndex - 1) . "," . $pageSize;

            $sql =" select g.gsid asid ,g.gsid assid,c.clothesName ,gs.GsizeGame ,gc.GcolorGame ,g.GsPrice ,g.GsNum , g.Addtime from goods g inner join clothes c on c.ClothesNo=g.ClothesNo inner join goodssize gs on gs.GsizeId=g.GsizeId inner join goodscolor gc on gc.GcolorId=g.GcolorId ORDER BY g.gsid DESC LIMIT ".($pageIndex - 1).",".$pageSize;
        }


        return $this->query($sql, null);
    }

    public function del($args)
    {
        $sql = "DELETE FROM goods WHERE gsid =?";
        return $this->execute($sql, $args);

    }





}