<?php
/**
 * Created by PhpStorm.
 * User: 小剑
 * Date: 2018/1/2
 * Time: 16:38
 */

require "./code/Code.class.php";
$code = new Code(220,50);
$codeN = $code->outPut();
session_start();
$_SESSION['code']=$code->getCode();

?>