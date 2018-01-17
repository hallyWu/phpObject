<?php
/**
 * Created by PhpStorm.
 * User: 小剑
 * Date: 2018/1/11
 * Time: 15:59
 * 引用器
 * 目的：页面路径都在最高级路径
 */
//引用登录页面
//include "./view/login.php";
require_once "./lib/Factory.class.php";
//工厂的初始化 将内部的两个方法变为自动加载函数
//运行构造函数
$F=new Factory();
//运行工厂  实例化控制器，并且加载doaction方法
$F->run();