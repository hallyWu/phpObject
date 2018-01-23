<?php
class Factory{
	public function __construct(){
		require_once "./public/Page.class.php";
		spl_autoload_register([__CLASS__ , 'loadControl']);
		spl_autoload_register([__CLASS__ , 'loadModel']);
	}
	// 文件的引用
	function loadControl($classname){
		$path = "./control/".$classname.".class.php";
		if(file_exists($path)){
			require_once $path;
		}else{
			error_log("该文件不存在".$path);
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




	// 运行 工厂的路由和初始化
	public function run(){
		// require_once "./control/LoginCon.class.php";
		//c代表控制器映射
		$c=isset($_GET['c'])?$_GET['c']:"Login";
		//a代表控制器中运行什么方法
		$a=isset($_GET['a'])?$_GET['a']:"showLogin";
		$con=$c."Con";
		$control = new $con();
		$control->doaction($a);
	}
}