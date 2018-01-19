<meta charset="utf-8">
<?php
echo "<pre>";
$user = isset($_POST['user'])?$_POST['user']:'';
$psd = isset($_POST['psd'])?$_POST['psd']:'';
// 获取网页验证码
$getcode = isset($_POST['code'])?$_POST['code']:'';
// $user = isset($_POST['code'])?$_POST['code']:'';
require_once "../config/config.php";
require_once "../public/Database.class.php";
$db=Database::createDB($config);
$sql="select * from t_teacher where tname ='{$user}' and tpassword=md5('{$psd}')";
$data=$db->searchSql($sql);
// 获取验证码
session_start();
$codes = $_SESSION['code'];
if(strcmp($getcode,$codes)==0){
	if(!empty($data)){
		echo '登入成功';
		print_r($data);	
		// echo $data[0]['tname'];
		$_SESSION['userData'] = $data[0]['tname'];
		include "../view/main.php";	
	}else{
		echo '用户名或者密码错误';
	}
}else{
	echo '验证码错误';
}












?>