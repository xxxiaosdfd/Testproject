<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/13 0013
 * Time: 22:25
 */

namespace application\admin\controllers;

use core\mybase\AdminGroupControllor;

use application\admin\models\UpdategoodsModel;


class UpdategoodsController extends AdminGroupControllor
{



    public function Updategoods()
    {
        $gid = isset($_GET['gsid']) ? $_GET['gsid'] : -1;

        $gm = new UpdategoodsModel();

        $result = $gm->Updategoods([$gid]);

        $this->assign("updategoods",$result);

        //var_dump($a);
//        <?php echo $this->data["updategoods"]['GsId'];
//        'GsId' => string '100007' (length=6)
//  'ClothesNo' => string '2007' (length=4)
//  'GsPrice' => string '70' (length=2)
//  'GsNum' => string '230' (length=3)
//  'GsizeId' => string '20' (length=2)
//  'GcolorId' => string '19' (length=2)
//  'Addtime' => string '2018-07-11 21:32:26' (length=19)
//  'Dirimages' => string '333.jpg

        $this->display();

    }


    public function revisegoods()
    {
        $feedback = ["errno" => 500, "mess" => "添加失败"];
        $Gsid=$_POST['gsid'];
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


            $args = [$ClothesNo, $GsPrice, $GsNum, $GsizeId, $GcolorId, $Addtime, $Dirimages,$Gsid];


            $um = new updategoodsModel();
            $result = $um->revisegoods($args);
//            if ($result > 0) {
//                $feedback = ["errno" => 200, "mess" => "修改成功"];
//
//            }
            if ($result > 0) {
                $this->success("修改成功，2秒后跳转回商品列表", "?g=admin&c=onlinegoods&a=onlinegoods");
            } else {
                $this->fail("修改失败，2秒后跳回商品列表", "?g=admin&c=onlinegoods&a=onlinegoods");
            }

        }
//        echo json_encode($feedback, JSON_UNESCAPED_UNICODE);

    }

}