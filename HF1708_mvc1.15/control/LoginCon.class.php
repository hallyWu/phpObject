<?php
/**
 * Created by PhpStorm.
 * User: 小剑
 * Date: 2018/1/11
 * Time: 15:34
 * 控制器
 * 说明：数据处理
 * 结果的处理
 */

require_once "./lib/Control.class.php";
class LoginCon extends Control
{
    //控制器中的大脑
    public function doaction($a){
        switch ($a){
            case 'login':
                $this->login();
                break;
            case 'loginout':
                $this->loginout();
                break;
            case "loginAjax":
                $this->loginAjax();
                break;
            case "main":
                $this->main();
                break;
            case "showLogin":
                $this->showLogin();
                break;
        }
    }

    //用户登录判断
    public function login(){
        $user=isset($_POST["user"])?$_POST["user"]:"";
        $psd=isset($_POST["psd"])?$_POST["psd"]:"";
        $code = isset($_POST['code'])?$_POST['code']:"";//表单传递过来的验证码值
        $auto = isset($_POST['auto'])?$_POST['auto']:"";//表单传递过来的验证码值

        session_start();
        $serve_code=$_SESSION['code'];//验证码的真实值
        $usershow=$_SESSION['name'];
        if (strcmp($code,$serve_code)==0 || 1==1){

            require_once  "./model/LoginModel.class.php";
            $model=new LoginModel();
            $data=$model->login($user,$psd);    //判断登录数据是否存在

            if (!empty($data)){
                //再次访问数据
                $menu=$model->getMenu();
                $_SESSION['user']=$data[0];
                //登录成功
                include "./view/main.php";
            }else{
                //账号密码错误
                include "./view/login.php";
                //更直观的看到也页面调用的方法，可以快速判断传入了 什么参数
                $this->showPage("./view/login.php",$menu);
            }
        }else{
//            echo "<script>alert('验证码')</script>";
//            include "./view/login.php";
                $this->showPage("./view/login.php",$menu);
        }

    }

    //用户注销判断
    public function loginout(){
        session_start();
        session_unset();
        //页面跳转
//        include "./view/login.php";
        $this->showPage("./view/login.php",$menu);
    }


    //登录的ajax  不能用include 而是用echo
    public function loginAjax(){
        $user=isset($_POST["user"])?$_POST["user"]:"";
        $psd=isset($_POST["psd"])?$_POST["psd"]:"";
        $code = isset($_POST['code'])?$_POST['code']:"";//表单传递过来的验证码值
        $auto = isset($_POST['auto'])?$_POST['auto']:"";//表单传递过来的验证码值

        session_start();
        $serve_code=$_SESSION['code'];//验证码的真实值
        $usershow=$_SESSION['name'];
        if (strcmp($code,$serve_code)==0 || 1==1){
            require_once  "./model/LoginModel.class.php";
            $model=new LoginModel();
            $data=$model->login($user,$psd);    //判断登录数据是否存在

            if (!empty($data)){
                $_SESSION['user']=$data[0];
                echo 1;
            }else{
                echo 0;
            }
        }else{
           echo -1;
        }
    }

    //显示主页
    public function main(){
//        require_once "./model/LoginModel.class.php";

        $model=new LoginModel();
        $menu=$model->tableSelect();
    }

    //显示登录
    public function showLogin(){

    }
}