<?php
/**
 * Created by PhpStorm.
 * User: 小剑
 * Date: 2018/1/12
 * Time: 15:06
 */

class Model
{
    //一个可继承的属性 用于保存数据库连接
    protected $db;
    //构造函数 引用文件
    public function __construct()
    {
        require_once "./public/Database.class.php";
        include "./config/config.php";
        $this->db =Database::createDB($config);
    }

    //简单查询表格
    public function tableSelect($table){
        $sql="select * from {$table}";
        $data=$this->db->searchSql($sql);
        return $data;
    }

    //根据条件查询
    public function tableWhereSelect($table,$content){
        $sql="select * from {$table} where 1 = 1";
        foreach ($content as $key=>$value) {
            $sql.="and {$key}='{$value}'";
        }
        $data=$this->db->searchSql($sql);
        return $data;
    }
}