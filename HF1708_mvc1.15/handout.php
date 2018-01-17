<?php
/**
 * Created by PhpStorm.
 * User: 小剑
 * Date: 2018/1/11
 * Time: 15:35
 * 分发器
 * 说明：其他页面的路径都是依照handout为起始位置,用于引用文件和生成控制器
 */

//接收参数 判断生成哪个控制器
$c=isset($_GET['c'])?$_GET['c']:""; //c 代表控制器的映射
$a=isset($_GET['a'])?$_GET['a']:""; //a 代表 控制器运行的方法
switch ($c){
    case 'login':
        require_once "./control/LoginCon.class.php";    //引用文件
        $control=new LoginCon();    //实例化
        break;
    case 'classMate':
        require_once "./control/ClassMateCon.class.php";
        $control=new ClassMateCon();
        break;
}
$control->doaction($a);  //进入方法