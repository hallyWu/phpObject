<?php
/**
 * Created by PhpStorm.
 * User: 小剑
 * Date: 2018/1/11
 * Time: 16:49
 */
require_once "./lib/Control.class.php";
class ClassMateCon extends Control
{
    //doaction 是一个抽象方法 每个子类都有继承并且实现它
    public function doaction($a){
        switch ($a){
            case "showStu";
                $this->showStu();
                break;
        }
    }

    public function showStu(){
        require_once "./model/ClassMateModel.class.php";
        include "./view/classMate.php";
    }
}