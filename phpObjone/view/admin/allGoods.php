<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>全部商品</title>
    <link rel="stylesheet" type="text/css" href="./view/css/style.css">
    <script src="./view/js/jquery.js"></script>
    <style>
        section{
            margin:0 10px;
        }
    </style>
</head>
<body>
<div class="page_title">
    <h2 class="fl">全部商品</h2>
</div>
<section>
    <div>
        <table class="table">
            <tr>
                <th>商品名称</th>
                <th>品牌ID</th>
                <th>商品主图</th>
                <th>商品最低价</th>
                <th>商品最高价</th>
                <th>商品库存</th>
                <th>商品状态</th>
                <th>上架时间</th>
                <th>发布时间</th>
                <th>操作</th>
            </tr>
            <?php
                foreach($data[0] as $value){
                    echo "<tr>";
                    echo '<td>';
                    echo $value['sp_goods_name'];
                    echo '</td>';
                    echo '<td>';
                    echo $value['brand_id'];
                    echo '</td>';
                    echo '<td>';
                    echo $value['main_img_id'];
                    echo '</td>';
                    echo '<td>';
                    echo $value['minimum_price'];
                    echo '</td>';
                    echo '<td>';
                    echo $value['highest_price'];
                    echo '</td>';
                    echo '<td>';
                    echo $value['sp_inventory'];
                    echo '</td>';
                    echo '<td>';
                    echo $value['goods_status'];
                    echo '</td>';
                    echo '<td>';
                    echo $value['update_time'];
                    echo '</td>';
                    echo '<td>';
                    echo $value['create_time'];
                    echo '</td>';
                    echo '<td>';
                    echo '<a href="#">编辑</a><a href="#">删除';
                    echo '</td>';
                    echo "</tr>";
                };
            ?>
        </table>
        <?PHP
            echo $data[1];
        ?>
    </div>
</section>
</body>
</html>
<script src="./view/js/admin/addShop.js"></script>
