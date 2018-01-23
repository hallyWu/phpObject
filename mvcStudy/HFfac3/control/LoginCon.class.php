<?php
/**
 * Created by PhpStorm.
 * User: 小剑
 * Date: 2018/1/17
 * Time: 3:02
 * 控制器
 * 数据的判断
 */
require_once "./lib/control.class.php";
class LoginCon extends control{
    //控制器的大脑，用于在内部分配方法
    public function doaction($a){
        switch ($a){
            //登录
            case "login":
                $this->login();
                break;
            //注销
            case "loginout":
                $this->loginout();
                break;
        }
    }

    //登录判断
    public function login(){
        $user=isset($_POST["user"])?$_POST["user"]:"";
        $psd=isset($_POST["psd"])?$_POST["psd"]:"";
        $code = isset($_POST['code'])?$_POST['code']:"";//表单传递过来的验证码值
        $auto = isset($_POST['auto'])?$_POST['auto']:"";//表单传递过来的验证码值

        //处理验证码请求
        session_start();
        $serve_code=$_SESSION['code'];//验证码的真实值
        if (strcmp($code,$serve_code)==0 || 1==1){          //验证码出现验证问题
            //请求模型层
            require_once  "./model/LoginModel.class.php";
            $model=new LoginModel();
            $data=$model->login($user,$psd);    //判断登录数据是否存在
            //结果处理
            if (!empty($data)){
                //再次访问数据
                $menu=$model->getMenu();
                $_SESSION['user']=$data[0];
//                var_dump($_SESSION['user']);
                echo "<script>alert('登录成功！')</script>";
                include "./view/main.php";
            }else{
                echo "<script>alert('登录失败！')</script>";
                include "./view/login.php";
            }
        }else{
            echo "<script>alert('验证码输入错误！')</script>";
            include "./view/login.php";
        }
    }

    //用户注销判断
    public function loginout(){
        //清除session信息
        session_start();
        session_unset();
        //页面跳转
        include "./view/login.php";
    }

}