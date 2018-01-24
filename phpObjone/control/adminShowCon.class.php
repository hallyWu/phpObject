<?php
class adminShowCon extends Control {
    //1.控制器分配方法
    public function doaction($a){
        switch ($a){
            //显示
            //显示商城主页面
            case "adminIndex";
                $this->adminIndex();
                break;
            //显示添加商品页
            case "showaddShops";
                $this->showaddShops();
                break;
             //添加全部商品页面
            case "allGoods";
                $this->allGoods();
                break;
        }
    }
    // 显示商城主页
    public function adminIndex(){
        $this->show('./view/admin/adminIndex.php');
    }
    // 显示添加商品页
    public function showaddShops(){
        $model = new Model();
        $brandList = $model->simSelect('sp_brand');
        $goods_statusList = $model->simSelect('goods_status');
        $this->show('./view/admin/addShops.php' , [$brandList,$goods_statusList]);
    }
    // 添加全部商品和数据
    public function allGoods(){
        $model = new adminActionModel();
        $count = $model -> getAllgoodsNum();
        $page = new Page($count[0]['count'],10,"./index.php?c=adminShow&a=allGoods");
        $data = $model->getAllgoods($page->getStar(),$page->getOne());
        $this->show('./view/admin/allGoods.php',[$data,$page->showPage()]);
    }
}