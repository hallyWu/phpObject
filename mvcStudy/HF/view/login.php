<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./view/css/login.css">
    <title>登陆</title>
</head>
<body>
    <?php
    // 自动加载类文件
    function __autoload($classname){
        $path = "class/{$classname}.class.php";
        if(file_exists($path)){
            require_once $path;
        }else{
            echo "该文件不存在".$path;
        }
    }
    ?>
    <div id="f_login">
        <h1>登录</h1>
        <form method="post" action="./handout.php?c=login&a=login" name="login">
            <p>学员帐号: <input type="text" name="user"></p>
            <p>登录密码: <input type="password" name="psd"></p>
            <p><img src="./public/code.php" onclick="this.src='./public/code.php?r='+Math.random()" alt="" name="img"></p>
            <p>
                <span>验 证 码：</span>
                <input id="code" type="text" value="" maxlength="4" name="code" onblur="loginCode()">
                <label for="" style="display:none;color: green;" id="ok">对</label>
                <label style="color: red; display: none;" id="label">验证码错误</label>
            </p>
            <p><input type="submit" value="登录" id="nnn"></p>
        </form>
    </div>
</body>
<script src="./view/js/jquery-2.1.4.js"></script>
<script>
    function loginCode(){
        var code = $(event.target).val();
        var ajax = new XMLHttpRequest();
        ajax.open("get","doaction.php?a=code & code="+code,true); //a
        ajax.send();
        ajax.onreadystatechange=function(){
            if(ajax.readyState == 4 && ajax.status == 200){
                console.log(ajax.responseText);
                if(ajax.responseText == "yes"){
                    $("#ok").show();
                }else{
                    $("#label").show();
                }
            }
        }
    }
</script>
</html>