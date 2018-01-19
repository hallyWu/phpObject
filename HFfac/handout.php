<?php
/**
 * Created by PhpStorm.
 * User: 小剑
 * Date: 2018/1/17
 * Time: 3:04
 * 分发器
 * 作用：用于引用文件和生成控制器
 */
//接收参数 判断生成那个控制器

//c代表控制器映射
$c=isset($_GET['c'])?$_GET['c']:"";
//a代表控制器中运行什么方法
$a=isset($_GET['a'])?$_GET['a']:"";
switch ($c){
//    请求访问登录控制层
    case "login";
        require_once "./control/LoginCon.class.php";
        $control=new LoginCon();
        $control->doaction($a);
        break;
    case "classMate";
        require_once "./control/ClassMateCon.class.php";
        $control=new ClassMateCon();
        $control->doaction($a);
        break;
}