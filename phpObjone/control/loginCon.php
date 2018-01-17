<meta charset="utf-8">
<?php
echo "<pre>";
$user = isset($_POST['user'])?$_POST['user']:'';
$psd = isset($_POST['psd'])?$_POST['psd']:'';
// $user = isset($_POST['code'])?$_POST['code']:'';
require_once "../config/config.php";
require_once "../public/Database.class.php";
$db=Database::createDB($config);
$sql="select * from t_teacher where tname ='{$user}' and tpassword=md5('{$psd}')";
$data=$db->searchSql($sql);
if(empty($data)){
	echo '登入失败';
}else{
	echo '登入成功';
	print_r($data);
	include "../view/main.php";
}












?>