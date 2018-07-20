<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/15 0015
 * Time: 13:05
 */

namespace application\home\controllers;


use core\mybase\HomeGroupController;

use application\home\models\ProductsModel;
class ProductsController extends HomeGroupController
{
    public function Products()
    {
        $products= new ProductsModel;
        $result=$products->Products();

        //var_dump($result);
//        foreach($this->data["products"] as $val){
//            echo $val.['GsId']."===."$val.['ClothesNo']
//}

//        'GsId' => string '100008' (length=6)
//      'ClothesNo' => string '2001' (length=4)
//      'GsPrice' => string '100.55' (length=6)
//      'GsNum' => string '100' (length=3)
//      'GsizeId' => string '1' (length=1)
//      'GcolorId' => string '1' (length=1)
//      'Addtime' => string '2018-07-18 23:56:57' (length=19)
//      'Dirimages' => string 'TB1Oa.eSpXXXXb4XVXXXXXXXXXX-380-400.jpg' (length=39)
        $this->assign("products",$result);


//        echo json_encode($products,JSON_UNESCAPED_UNICODE);
//       var_dump($products);
//        die();

        $this->display();
    }

}