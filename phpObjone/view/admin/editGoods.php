<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>编辑商品</title>
    <link rel="stylesheet" type="text/css" href="./view/css/style.css">
    <script src="./view/js/jquery.js"></script>
    <style>
        section{
            margin:0 10px;
        }
        dt,dd{
            display: inline-block;
        }
        dt{
            width: 120px;
            text-align: right;
        }
    </style>
</head>
<body>
<div class="page_title">
    <h2 class="fl">全部商品>编辑商品 </h2>
</div>
<section>
    <div>
        <form method="post" enctype="multipart/form-data">
            <dl>
                <dt>商品名称：</dt>
                <dd><input class="textbox_225 textbox" type="text" name="goods_name" value="<?php echo $data[0][0]['sp_goods_name'] ?>"  placeholder="请输入商品名称"></dd>
            </dl>
            <dl>
                <dt>商品品牌：</dt>
                <dd>
                    <select class="select" name="brand_id">
                        <option value="">请选择</option>
                        <?php
                        foreach ($data[2] as $key => $value) {
                            echo "<option value='{$value['brand_id']}'>";
                            print_r($value['brand_name']) ;
                            echo "</option>";
                        }
                        ?>
                    </select>
                </dd>
            </dl>
            <dl>
                <dt>商品图片：</dt>
                <dd>
                    <input class="textbox_225 textbox" type="hidden" name="main_img" value="1001">
                    <input class="textbox_225 textbox" type="file" name="main_img_url">
                </dd>
            </dl>
            <dl>
                <dt>商品最低价：</dt>
                <dd>
                    <input class="textbox_225 textbox" type="text" name="minimum_price" value="<?php echo $data[0][0]['minimum_price'] ?>" placeholder="请设置商品最低价">
                </dd>
            </dl>
            <dl>
                <dt>商品最高价：</dt>
                <dd>
                    <input class="textbox_225 textbox" type="text" value="<?php echo $data[0][0]['highest_price'] ?>" name="highest_price" placeholder="请设置商品最高价">
                </dd>
            </dl>
            <dl>
                <dt>商品库存：</dt>
                <dd>
                    <input class="textbox_225 textbox" value="<?php echo $data[0][0]['sp_inventory'] ?>" type="text" name="inventory" placeholder="请设置商品库存">
                </dd>
            </dl>
            <dl>
                <dt>商品状态：</dt>
                <dd>
                    <select class="select" name="goods_status">
                        <?php
                        foreach ($data[1] as $key => $value) {
                            echo "<option value='{$value['goods_status_id']}'>";
                            print_r($value['goods_status']);
                            echo "</option>";
                        }
                        ?>
                    </select>
                </dd>
            </dl>
            <dl>
                <dt>上架时间：</dt>
                <dd>
                    <input class="textbox_225 textbox" type="text" value="<?php echo $data[0][0]['update_time'] ?>" name="update_time" placeholder="选填商品上架时间">
                </dd>
            </dl>
            <dl>
                <dt>发布时间：</dt>
                <dd>
                    <input class="textbox_225 textbox" value="<?php echo $data[0][0]['create_time'] ?>" type="text" name="create_time" placeholder="选填商品发布时间">
                </dd>
            </dl>
            <dl>
                <dt></dt>
                <dd><input type="button" id="addSub" class="link_btn" value="提交"></dd>
            </dl>
        </form>
    </div>
</section>
</body>
</html>
<script src="./view/js/admin/addShop.js"></script>
