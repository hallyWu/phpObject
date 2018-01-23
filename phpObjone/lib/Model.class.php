<?php
class Model{
    //一个可以继承属性 保存数据库连接
    protected $db;
    public function __construct(){
        require_once "./public/Database.class.php";
        include "./config/config.php";
        $this->db=Database::createDB($config);
    }
    // 简单查询语句封装
    public function simSelect($table){
        $sql = "select * from {$table} ";
        $data = $this->db->searchSql($sql);
        return $data;
    }
    // 简单带条件的查询
    public function selectWhere($table,$condition){
        $sql = "select * from {$table} where 1=1";
        foreach($condition as $key=>$value){
            $sql .= " and {$key}='{$value}'";
        }
//        var_dump($sql);
        $data = $this->db->searchSql($sql);
        return $data;
    }
}