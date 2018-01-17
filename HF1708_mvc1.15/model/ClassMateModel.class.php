<?php
/**
 * Created by PhpStorm.
 * User: 小剑
 * Date: 2018/1/11
 * Time: 16:54
 */

require_once "./lib/Model.class.php";
class ClassMateModel extends Model
{
    //显示学员
    public function showStu(){
        $sql="select * from t_student";
    }
}