<?php
/**
 * Created by PhpStorm.
 * User: 小剑
 * Date: 2018/1/12
 * Time: 15:37
 * 控制器
 */
//抽象方法
abstract class Control
{
    abstract public function doaction($a);

    //引用页面
    public function showPage($url,$data=null){
        include_once $url;
    }
}