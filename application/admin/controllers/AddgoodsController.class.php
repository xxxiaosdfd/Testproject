<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/9 0009
 * Time: 22:32
 */


namespace application\admin\controllers;

use application\admin\models\AddgoodsModel;

use core\mybase\AdminGroupControllor;


class AddgoodsController extends AdminGroupControllor
{
    public function addgoods(){
        $this->display();
    }
    public function addgoodss()
    {
        $feedback = ["errno" => 500, "mess" => "添加失败"];
        $ClothesNo = $_POST["clothesNo"];
        $GsPrice = $_POST["gsPrice"];
        $GsNum = $_POST["gsNum"];
        $GsizeId = $_POST["gsizeId"];
        $GcolorId = $_POST["gcolorId"];
        $Addtime = date("Y-m-d H:i:s", time());

        $fileUpLoad = new \FileUpload();

        $fileUpLoad->set('path', './public/home/goodsimages')
            ->set('maxsize', 1000000)
            ->set('allowtype', array('jpg', 'jpeg', 'gif', 'png'))
            ->set('israndname', false);

        if ($fileUpLoad->upload('myfile')) {


            $Dirimages = $fileUpLoad->getFileName();


            $args = [$ClothesNo, $GsPrice, $GsNum, $GsizeId, $GcolorId, $Addtime, $Dirimages];


            $um = new AddgoodsModel();
            $result = $um->addgoods($args);
            if ($result > 0) {
                $feedback = ["errno" => 200, "mess" => "添加成功"];
            }

        }
        echo json_encode($feedback, JSON_UNESCAPED_UNICODE);

    }

    public function getgoodstype()
    {

            $um = new AddgoodsModel();
            $result = $um->getgoodstype();

        echo json_encode($result,JSON_UNESCAPED_UNICODE);
    }

    public function getclothes()
    {
        $GoodstypeId=$_GET['goodstypeId'];

        if($_GET['goodstypeId']<0){
            echo "false";
        }
        $um = new AddgoodsModel();

        $args=[$GoodstypeId];
        $result = $um->getclothes($args);

        echo json_encode($result,JSON_UNESCAPED_UNICODE);
    }

    public function getcolor()
    {
        $ClothesNo=$_GET['clothesNo'];
        if($_GET['clothesNo']<0){
            echo "false";
        }
        $um = new AddgoodsModel();

        $args=[$ClothesNo];
        $result = $um->getcolor($args);

        echo json_encode($result,JSON_UNESCAPED_UNICODE);
    }

    public function getsize()
    {
        $ClothesNo=$_GET['clothesNo'];

        if($_GET['clothesNo']<0){
            echo "false";
        }
        $um = new AddgoodsModel();

        $args=[$ClothesNo];
        $result = $um->getsize($args);

        echo json_encode($result,JSON_UNESCAPED_UNICODE);
    }



}