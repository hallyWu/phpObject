<?php
class adminActionModel extends Model{
    //查询条数限制语句函数
    public function getAllgoods($star,$showNum){
        $sql="select * from sp_goods  limit $star,$showNum";
        $data=$this->db->searchSql($sql);
        return $data;
    }
    //查看sp_goods的条数
    public function getAllgoodsNum(){
        $sql = "select count(*) as 'count' from sp_goods";
        $data = $this->db->searchSql($sql);
        return $data;
    }
}