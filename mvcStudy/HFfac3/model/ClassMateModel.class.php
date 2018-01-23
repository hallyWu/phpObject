<?php
/**
 * Created by PhpStorm.
 * User: 小剑
 * Date: 2018/1/17
 * Time: 6:03
 */

class ClassMateModel
{
    public function getStu(){
        require_once "./public/Database.class.php";
        include "./config/config.php";
        $db=Database::createDB($config);
        $sql="select * from t_student";
        $data=$db->searchSql($sql);
        return $data;
    }
}