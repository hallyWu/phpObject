<?php
/**
 * Created by PhpStorm.
 * User: 小剑
 * Date: 2018/1/3
 * Time: 16:50
 */
//引用文件
require_once "../class/Page.class.php";
require_once "../class/Database.class.php";
include "../config/config.php";
//实例化数据库对象
$db=Database::createDB($config);
//编写sql语句
$sql="select count(*) as count from student";
//得到查询结果  查询总条数
$data=$db->searchSql($sql);
var_dump($data);

$page=new Page($count[0]['count'],4);

$sqla="select * from student limit {$page->getStar()},{$page->getOne()}";
$data=$db->searchSql($sqla);
//echo $allRows;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/jquery-2.1.4.js"></script>
    <title>班级成员</title>
</head>
<body>
    <h1>班级成员</h1>
    <table border="1" cellspacing="0">
        <tr>
            <td>姓名</td>
            <td>性别</td>
            <td>年龄</td>
            <td>手机号</td>
            <td>毕业学校</td>
            <td>操作</td>
        </tr>
        <?php
            foreach ($data as $value){
                echo "<tr>";
                echo "<td>{$value['sname']}</td>";
                echo "<td>{$value['ssex']}</td>";
                echo "<td>{$value['age']}</td>";
                echo "<td>{$value['phone']}</td>";
                echo "<td>{$value['fschool']}</td>";
                echo  "<td><input type='button' value='删除' sid='{$value['sid']}' class='delete'></td>";
                echo "</tr>";
            }
        ?>
    </table>
    <?php
        echo "<span>共有{$allPage}页，当前{$newPage}页</span>";
        echo "<a href='myClass.php?nowpage={}'>上一页</a><a href='myClass.php?nowpage={}'>下一页</a>"
    ?>
</body>
<script>
    $.ajax({
        url:"./doaction.php?a=myclass",
        type:"get",
        dataType:"text",
        success:function (res) {
            console.log(res);
            var table = $("#table");
            for(var i =0;i<res.length;i++){
                table.append("<tr><td>"+res[i].name+"</td></tr>");
            }
        }
    })

    $(function () {
        $(".delete").click(function () {
            var sid=$(this).attr("sid");
            var check=confirm("确认删除吗？");
            if (check){
                $.ajax({
                    url:"./handout/.php?c=login",
                    type:
                })
            }
        })
    })
</script>
</html>
