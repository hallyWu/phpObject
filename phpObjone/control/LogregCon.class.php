<?php
class LogregCon extends Control{
   //1.控制器分配方法
   public function doaction($a){
       switch ($a){
            // 登入方法
            case "admin_loginAjax";
            $this->admin_loginAjax();
            break;
            //显示登入页面
           case "show_adminLogin";
           $this->show_adminLogin();
           break;
       }
   }
   // ajax 管理员登入方法
   public function admin_loginAjax(){
       $user  = isset($_POST['user'])?$_POST['user']:'';
       $psd   = isset($_POST['psd'])?$_POST['psd']:'';
       $email = isset($_POST['email'])?$_POST['email']:'';
       $code  = isset($_POST['code'])?$_POST['code']:'';
       //处理验证码请求
       session_start();
       $serve_code = $_SESSION['code'];
       if(strcmp($code,$serve_code)==0){
//           require_once './model/LogregModel.class.php';
           $model = new LogregModel();
           $condition = ['admin_name'=> $user,'admin_psd'=> md5($psd),'admin_email'=> $email];
           $data = $model->selectWhere("sp_admin" , $condition);
           if(!empty($data)){
               $_SESSION['users'] = $data[0];
               echo 1;
           }else{
               echo -1;
           }
       }else{
           echo 0;
       }
   }
    // 显示登入页面的方法
    public function show_adminLogin(){
        $this->show("./view/admin/adminLogin.php");
    }



}











//echo "<pre>";
//$user = isset($_POST['user'])?$_POST['user']:'';
//$psd = isset($_POST['psd'])?$_POST['psd']:'';
//// 获取网页验证码
//$getcode = isset($_POST['code'])?$_POST['code']:'';
//// $user = isset($_POST['code'])?$_POST['code']:'';
//require_once "../config/config.php";
//require_once "../public/Database.class.php";
//$db=Database::createDB($config);
//$sql="select * from t_teacher where tname ='{$user}' and tpassword=md5('{$psd}')";
//$data=$db->searchSql($sql);
//// 获取验证码
//session_start();
//$codes = $_SESSION['code'];
//if(strcmp($getcode,$codes)==0){
//	if(!empty($data)){
//		echo '登入成功';
//		print_r($data);
//		// echo $data[0]['tname'];
//		$_SESSION['userData'] = $data[0]['tname'];
//		include "../view/main.php";
//	}else{
//		echo '用户名或者密码错误';
//	}
//}else{
//	echo '验证码错误';
//}












?>