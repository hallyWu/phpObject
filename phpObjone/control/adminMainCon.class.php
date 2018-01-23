<?php
class adminMainCon extends Control {
    //1.控制器分配方法
    public function doaction($a){
        switch ($a){
            //显示管理主页面
            case "adminIndex";
                $this->adminIndex();
                break;
        }

    }
    public function adminIndex(){
        $this->show('./view/admin/adminIndex.php');
    }

}