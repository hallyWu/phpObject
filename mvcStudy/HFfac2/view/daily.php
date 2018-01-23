<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<h4>班级日报</h4>
	<form action="./index.php?c=classMate&a=daily" method="post" >
		<input type="text" name="search">
		<input type="submit" value="提交">
	</form>


	<table border="1">	
		<tr>
			<th>发布内容id</th>
			<th>发布时间</th>
			<th>发布内容</th>
			<th>发布名字</th>
			<th>发布id</th>
			<td>操作</td>
		</tr>
		<?PHP
			foreach ($data[0] as $value){
				echo "<tr>";
				echo "<td>{$value['dailyid']}</td>";
				echo "<td>{$value['dsendtime']}</td>";
				echo "<td>{$value['dcontent']}</td>";
				echo "<td>{$value['dcommentid']}</td>";
				echo "<td>{$value['dsendid']}</td>";
				echo "<td>删除</td>";
				echo "</tr>";					
 			}

		?>	

	</table>
	<div id="pae">
		<?PHP
			echo $data[1];


		?>
	</div>
</body>
</html>

