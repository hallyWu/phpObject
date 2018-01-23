<?php
/**
 * Created by PhpStorm.
 * User: 小剑
 * Date: 2018/1/11
 * Time: 15:41
 * require引用类用 include引用页面
 * dao层
 * 获取到数据 立刻return
 * 拼接语句
 */

class LoginModel
{
    public function login($user,$psd){
        require_once "./public/Database.class.php";
        include "./config/config.php";
        $db=Database::createDB($config);
        $sql="select * from t_teacher where tname ='{$user}' and tpassword=md5('{$psd}')";
        $data=$db->searchSql($sql);
        return $data;
    }

    //获取菜单
    public function getMenu(){
        require_once "./public/Database.class.php";
        include "./config/config.php";
        $db=Database::createDB($config);
        $sql="select * from t_menu";
        $data=$db->searchSql($sql);
        return $data;
    }
}