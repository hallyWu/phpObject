<?php
abstract class Control{
    //分配方法
    abstract public function doaction($a);
    //显示页面方法
    public function show($url,$data=null){
        include_once $url;
    }
}