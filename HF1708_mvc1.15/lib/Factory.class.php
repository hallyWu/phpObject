<?php
/**
 * Created by PhpStorm.
 * User: 小剑
 * Date: 2018/1/12
 * Time: 16:07
 * 工厂：加载所有类文件
 */

class Factory
{
    //构造函数 将内部的一个方法注册为自动应用函数
    public function __construct()
    {
        require_once "./lib/Control.class.php"; //控制器基类
        require_once "./lib/Model.class.php";   //模型基类
        require_once "./public/Page.class.php"; //分页类
        spl_autoload_register([__CLASS__,'loadControl']);
        spl_autoload_register([__CLASS__,'loadModel']);
    }

    //文件的引用
    function loadControl($classname){
        $path="./control/".$classname.".class.php";
        if (file_exists($path)){
            require_once $path;
        }else{
            error_log("改文件不存在".$path);
        }
    }
    //模型的引用
    function loadModel($classname){
        $path="./control/".$classname.".class.php";
        if (file_exists($path)){
            require_once $path;
        }else{
            error_log("改文件不存在".$path);
        }
    }

    //工厂的路由和初始化
    public function run(){
        //获取url上的参数 c和a
        //c代表控制器的映射
        $c=isset($_GET['c'])?$_GET['c']:'Login';
        //a 代表控制器中运行什么方法
        $a=isset($_GET['a'])?$_GET['a']:'showLogin';
        //得到类名 并直接实例化
        $con=$c."Con";
        $control=new $con();
        $control->doaction($a);
    }
}