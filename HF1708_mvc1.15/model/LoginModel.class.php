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
require_once "./lib/Model.class.php";
class LoginModel extends Model
{
    public function login($user,$psd){
        $sql="select * from t_teacher where tname ='{$user}' and tpassword=md5('$psd')";
        $data=$this->db->searchSql($sql);
        var_dump($data);
        return $data;
    }

    //获取菜单
    public function getMenu(){
        $sql="select * from t_menu";
        $data=$this->db->searchSql($sql);
        return $data;
    }
}