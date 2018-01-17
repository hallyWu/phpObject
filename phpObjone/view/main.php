<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>主页</title>
	<link rel="stylesheet" href="../view/css/reset.css">
	<link rel="stylesheet" href="../view/css/main.css">
	<script src="../view/js/jquery.js"></script>
</head>
<body>
	<header>
		<ul>
			<?php
            foreach($data as $key => $value){              
                echo "<li>{$value}</li>";        
            }
            ?>
		</ul>
	</header>
	<aside>
		<ul>
			<li></li>
		</ul>
	</aside>
	<section>
		
	</section>
</body>
</html>