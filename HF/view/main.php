<?php
/**
 * Created by PhpStorm.
 * User: 小剑
 * Date: 2017/12/29
 * Time: 15:35
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./view/css/main.css">
    <title>菜单首页</title>
</head>
<body>
<div id="heade">
    <div id="useshow">
        <ul>
                <?php
                echo "<li style='color:red;'>";
                    // session_start();
                    $user = $_SESSION['user']['tname'];
                    echo $user;
                echo "</li><li>欢迎您！|</li><li><a href='./handout.php?c=login&a=loginout'>退出</a></li>";
                ?>
        </ul>

    </div>
</div>
<div class="safe">
    <div id="content">
        <div id="menu">
            <?php
            foreach($menu as $key => $value){
                if($value["mfid"] == 0){
                    echo "<ul>";
                    echo "<h3 class = 'tmenu'>{$value['mname']}</h3>";
                    foreach($menu as $key => $val){
                        if($value['mid'] == $val['mfid']){
                            echo "<li class='drop' mysrc='{$val['murl']}'> <a href='{$val['murl']}' target='section'>{$val['mname']}</a>   </li>";
                        }
                    }
                    echo "</ul>";
                }
            }
            ?>
        </div>
        <div id="showMenu">
            <iframe src="" frameborder="0" name="section"></iframe>
        </div>
    </div>

</div>
</body>
<!--JQ-->
<script src="./view/js/jquery-2.1.4.js"></script>
<!--页面JQ-->
<script>
    $(function(){
        $(".drop").hide();
        $(".tmenu").on("click",function(){
            var $li = $(this).nextAll("li");
            $li.toggle(1000);
        });
    });
</script>
</html>
