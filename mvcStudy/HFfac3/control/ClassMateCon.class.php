<?php
/**
 * Created by PhpStorm.
 * User: 小剑
 * Date: 2018/1/17
 * Time: 5:50
 */
require_once "./lib/control.class.php";
class ClassMateCon extends control
{
    public function doaction($a){
        switch ($a){
            case "showStu";
                $this->showStu();
        }
    }

    //获取班级成员方法
    public function showStu(){
        require_once "./model/ClassMateModel.class.php";
        $model=new ClassMateModel();
        $data=$model->getStu();
//        var_dump($data);
        include "./view/classMate.php";
    }
}