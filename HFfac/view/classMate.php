<?php
/**
 * Created by PhpStorm.
 * User: 小剑
 * Date: 2018/1/17
 * Time: 5:37
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>班级同学</title>
    <script src="./view/js/jquery-2.1.4.js"></script>
</head>
<body>
    <div>
        <h1>班级成员</h1>
        <table border="1" cellspacing="0">
            <tr>
                <td>姓名</td>
                <td>性别</td>
                <td>年龄</td>
                <td>手机号</td>
                <td>毕业院校</td>
                <td>操作</td>
            </tr>
            <?php
                foreach ($data as $value){
                    echo "<tr>";
                    echo "<td>{$value['sname']}</td>";
                    echo "<td>{$value['ssex']}</td>";
                    echo "<td>{$value['sage']}</td>";
                    echo "<td>{$value['sphone']}</td>";
                    echo "<td>{$value['sSchool']}</td>";
                    echo "<td><input class='delete' type='button' sid='{$value['sid']}' value='删除'></td>";
                    echo "</tr>";
               }
            ?>
        </table>
        <script>
        $(function(){
            $(".delete").click(function(){
                var sid = $(this).attr("sid");
                var bool = confirm("确认删除?");
                if(bool){
                    $.ajax({
                        url:"./handout.php?c=classMate&a=deleteAjax",
                        type:"post",
                        data:{sid:sid},
                        success:function(res){
                            if(res==1){
                                alert("删除成功");
                                window.location.reload(true);
                            }else{
                                alert("删除失败");
                            }
                        }
                    })
                }
            })
        })
            
        </script>
    </div>
</body>
</html>
