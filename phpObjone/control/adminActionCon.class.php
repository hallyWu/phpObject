<?php
class adminActionCon extends Control {
    //1.控制器分配方法
    public function doaction($a){
        switch ($a){
            //方法
            //添加商品方法
            case "addShops";
                $this->addShops();
                break;
        }
    }
    //添加商品方法
    public function addShops(){
        //商品名称
        $goods_name = $_POST['goods_name'];
        if(empty($goods_name)){
            echo json_encode(["code" => 0, "msg" => '商品名称未填写']);
            return;
        }
        //商品品牌
        $brand_id= $_POST['brand_id'];
        if(empty($brand_id)){
            echo json_encode(["code" => 0, "msg" => '商品品牌未填写']);
            return;
        }
        //商品图片
        $main_img= $_POST['main_img'];
        if(empty($main_img)){
            echo json_encode(["code" => 0, "msg" => '商品图片未选择']);
            return;
        }
        //商品最低价
        $minimum_price= $_POST['minimum_price'];
        if(empty($minimum_price)){
            echo json_encode(["code" => 0, "msg" => '商品最低价未填写']);
            return;
        }
        //商品最高价
        $highest_price= $_POST['highest_price'];
        if(empty($highest_price)){
            echo json_encode(["code" => 0, "msg" => '商品最高价未填写']);
            return;
        }
        //商品库存
        $inventory= $_POST['inventory'];
        if(empty($inventory)){
            echo json_encode(["code" => 0, "msg" => '商品库存未填写']);
            return;
        }
        //商品状态
        $goods_status= $_POST['goods_status'];
        if(empty($goods_status)){
            echo json_encode(["code" => 0, "msg" => '商品状态未设置']);
            return;
        }
        //上架时间
        $update_time = $_POST['update_time'];
        //发布时间
        $create_time = $_POST['create_time'];
        //数据添加到服务器
        $adminModel = new adminActionModel();
        $filed = array("sp_goods_name" => "$goods_name","brand_id"=>"$brand_id","main_img_id"=>"$main_img","minimum_price"=>"$minimum_price","highest_price"=>"$highest_price","sp_inventory"=>"$inventory","goods_status"=>"$goods_status","update_time"=>"$update_time","create_time"=>"$create_time");
        $datas = $adminModel -> simInsertOne('sp_goods',$filed);
        echo json_encode(["code" =>$datas, "msg" => '商品添加成功']);
    }

}