<?php
/**
 * Created by PhpStorm.
 * User: 小剑
 * Date: 2018/1/17
 * Time: 6:03
 */
require_once "./core/Model.class.php";
class ClassMateModel extends Model
{
 
    public function getStu(){
        
        $sql="select * from t_student";
        $data=$this->db->searchSql($sql);
        return $data;
    }
    // 删除学生
    public function delete($sid){
        $sql="delete from t_student where sid={$sid}";
        $res=$this->db->dealSql($sql);
        return $res;
    }
}