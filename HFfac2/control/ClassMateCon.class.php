<?php
/**
 * Created by PhpStorm.
 * User: 小剑
 * Date: 2018/1/17
 * Time: 5:50
 */
require_once"./core/Control.class.php";
class ClassMateCon extends Control
{
    public function doaction($a){
        switch ($a){
            case "showStu":
                $this->showStu();
                break;
            case "deleteAjax":
                $this->deleteAjax();
                break;
        }
    }

    //获取班级成员方法
    public function showStu(){
        require_once "./model/ClassMateModel.class.php";
        $model=new ClassMateModel();
        $data=$model->getStu();
        // include "./view/classMate.php";
        $this -> show("./view/classMate.php",$data);
    }
    // 删除学生
    public function deleteAjax(){
        $sid=isset($_POST['sid']) ? $_POST['sid']:"";
        require_once "./model/ClassMateModel.class.php";
        $model = new ClassMateModel();
        $res = $model->delete($sid);
        if($res){
            echo 1;
        }else{
            echo 0;
        }

    }
}