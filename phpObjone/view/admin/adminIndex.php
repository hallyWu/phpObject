<!DOCTYPE html>
<html style="overflow-y: hidden;">
<head>
<meta charset="utf-8"/>
<title>场馆管理</title>
<meta name="author" content="DeathGhost" />
<link rel="stylesheet" type="text/css" href="./view/css/style.css">
<script src="./view/js/jquery.js"></script>
<style>
	.totalNum{
		float: right;
		margin-right: 20px;
		font-size: 10px;
		display: inline-block;
		color:#19a97b;
	}
	.colorBlack{
		color:black;
	}
</style>
</head>
<body>
<!--header-->
<header>
 <h1 class="headH">商城后台管理</h1>
 <ul class="rt_nav">
  <li><a href="#" class="clear_icon">清除缓存</a></li>
  <li>
  	<a class="quit_icon" style="cursor: pointer;">安全退出</a>
  	<form action="/logout" id="quit_icon" style="display: none;">
		<input type="submit" class="quite"/>
	</form>
  </li>
 </ul>
</header>
<!--aside nav-->
<!--aside nav-->
<aside class="lt_aside_nav">
 <h2><a href="index.html">起始页</a></h2>
 <ul class="asides">
  <li>
   <dl>
    <dt>商城管理</dt>
    <!--当前链接则添加class:active-->
       <dd><a href="./index.php?c=adminShow&a=showaddShops" target="section" class="active">添加商品</a></dd>
       <dd><a href="./index.php?c=adminShow&a=allGoods" target="section" class="active">添加商品</a></dd>
   </dl>
  </li>
 </ul>
</aside>

<section class="rt_wrap">   
    <iframe id="mainFrame" src="./index.php?c=adminShow&a=showaddShops" name="section" border="none" width="100%" frameborder="no" border="0" scrolling="auto"></iframe>
</section>  
<script>
//	侧边导航点击选中项
	$(".asides").find("dd a").on("click",function(){
		$(".asides").find("dd a").removeClass('active');
		$(this).addClass('active');
	})
	$('#mainFrame').height($(window).height()-70);
  	$('.quit_icon').click(function(){
  		$('#quit_icon').submit();
  	})
</script>
</body>
</html>
