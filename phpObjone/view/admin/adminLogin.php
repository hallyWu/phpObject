<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登入页面</title>
	<link rel="stylesheet" href="./view/css/reset.css">
	<link rel="stylesheet" href="./view/css/logreg.css">
	<script src="./view/js/jquery.js"></script>
</head>
<body>
	<div class="header wrap1000">
		<a href=""><img src="./view/images/back1LOGO.png" alt="" /></a>
	</div>
	<div class="main">
		<div class="form_left fl">
			<img src="./view/images/left.jpg" alt="" />
		</div>
		<div class="form_right fr">			
			<div class="form">
				<div class="form_title">
				    <h3>用户登录</h3>
			    </div>
				<form method="POST">
					<dl>
						<dt>用户名</dt>
						<dd><input type="text" name="user" class="text" /><span class="tip red">用户名不能为空</span></dd>
					</dl>
					<dl>
						<dt>密&nbsp;&nbsp;&nbsp;&nbsp;码</dt>
						<dd><input type="password" name="psd" class="text"/><span class="tip red">密码错误</span></dd>
					</dl>
                    <dl>
                        <dt>邮&nbsp;&nbsp;&nbsp;&nbsp;箱</dt>
                        <dd><input type="email" name="email" class="text"/><span class="tip red">邮箱格式错误</span></dd>
                    </dl>
					<dl>
						<dt>验证码</dt>
						<dd>
                            <input type="text"  name="code" class="text" size="10" style="width:58px;">&nbsp;
                            <a id="changeCode" style="color:#999;">
                                <img onclick="this.src='./public/code.php?r='+Math.random()" src="./public/code.php" alt="验证码" align="absmiddle" style="margin-top:-2px;"/>
                                <span class="tip">看不清，换一张</span>
                            </a>
                        </dd>
					</dl>
					<dl>
						<dt>&nbsp;</dt>
						<dd><input type="button" id="adminSub" value="登  录" class="submit"/>
					</dl>
				</form>
				<dl>
					<dt>&nbsp;</dt>
					<dd class="tip"> 还不是本站会员？立即 <a href="" class="register">注册</a></dd>
				</dl>
			</div>
		</div>
	</div>
</body>
</html>
<script src="./view/js/admin/logreg.js"></script>