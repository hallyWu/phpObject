<?php
class Factory{
    public function __construct(){
        require_once "./public/Page.class.php";
        require_once './lib/Control.class.php';
        require_once './lib/Model.class.php';
        spl_autoload_register([__CLASS__,'loadControl']);
        spl_autoload_register([__CLASS__ , 'loadModel']);
    }
    //自动加载
    public function loadControl($classname){
        $path = "./control/".$classname.".class.php";
        if(file_exists($path)){
            require_once $path;
        }else{
            error_log('该文件不存在'.$path);
        }
    }
    public function loadModel($classname){
        $path = "./model/".$classname.".class.php";
        if(file_exists($path)){
            require_once $path;
        }else{
            error_log("该文件不存在".$path);
        }
    }
    //运行工厂模式的路由和初始化
    public function run(){
        // c表示控制器映射
        $c = isset($_GET['c'])?$_GET['c']:"Logreg";
        // a表示控制器中的方法
        $a = isset($_GET['a'])?$_GET['a']:"show_adminLogin";
        // 拼接使得成控制器的类
        $con = $c."Con";
        $control = new $con();
        $control->doaction($a);
    }




}