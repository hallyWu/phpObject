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
    <title>首页</title>
</head>
<body>
<div id="heade">
    <div id="useshow">
        <ul>
            <li><?php
                    $user = $_COOKIE["HF1708User"];
                    echo $user;
                    ?>欢迎您！
            </li>
            <li>退出</li>
        </ul>
    </div>
</div>
<div class="safe">
    <div id="content">
        <div id="menu">
            <?php
//            require "./data/Data.php";
            foreach($menu as $key => $value){
                if($value["mfid"] == 0){
                    echo "<ul>";
                    echo "<h3 class = 'tmenu'>{$value['name']}</h3>";
                    foreach($menu as $key => $val){
                        if($value['mid'] == $val['mfid']){
                            echo "<li class='drop'><a target='mname' href='{$val['murl']}'>{$val['mname']}</a></li>";
                        }
                    }
                    echo "</ul>";
                }
            }
            ?>
        </div>
        <div id="showMenu">
            <iframe src="" frameborder="0" name="menu"></iframe>
        </div>
    </div>

</div>
<style>
    .safe{
        width: 1100px;
        margin: 0 auto;
    }
    #useshow{
        width: 200px;
        float: right;
        /*margin: 15px 500px;*/
    }
    #useshow li{
        display: inline-block;
    }
    #heade{
        height: 50px;
        background: #fff0f0;
        margin: 10px;
    }
    #content{
        margin: 0;
        padding: 0;
    }
    li,h3{
        list-style-type: none;
        cursor: pointer;
    }
    #menu{
        width: 200px;
        height: 617px;
        background: #17a6e4;
        float: left;
        border-radius:5px;
    }
    #showMenu{
        /*width:1007px;*/
        background: #ffffee;
        float: right;
        border: 1px solid black;
        border-radius:5px;
    }
    iframe{
        width: 895px;
        height: 618px;
    }
    .drop a{
        color: black;
        text-decoration-line: none;
    }
</style>
</body>
<!--JQ-->
<script src='js/jquery-2.1.4.js'></script>
<!--页面JQ-->
<script>
    // $(function(){
    //     $(".drop").hide();
    //     $(".tmenu").on("click",function(){
    //         var $li = $(this).nextAll("li");
    //         $li.toggle(1000);
    //     });
    // });
</script>
</html>
