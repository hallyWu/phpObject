<?php
/*
*验证码
*User:吴建
*Date:2017/12/26
*Time:下午10：00

调用：
不能有任何输出
require "newCode.class.php";
$code = new Code(300,50,6);
$code -> outPut();
*/
class Code
{
    private $width;     //宽
    private $height;    //高
    private $size;      //字符个数
    private $img;       //图片资源
    private $font;      //文字大小

    //构造函数  传入各个参数
    public function __construct($width,$height,$size=4,$fontfamily="./code/ArialMT.ttf"){
        $this ->width = $width;
        $this ->height = $height;
        $this ->size = $size;
        $this -> allFont ="abcdefghizklmnopqrstuvwxyz";
        $this ->outPut();     //调用输出图片函数
    }

    //析构函数  释放图片资源
    public function __destruct(){
        imagedestroy($this -> img);
    }

    //生成一个有颜色的画板
    public function createImg(){
        $this -> img = imagecreate($this->width,$this->height); //存储这个属性
        imagecolorallocate($this->img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
    }

    //生成文字
    public function createFont(){
        for($i=0;$i<$this->size;$i++){
            $this ->font.= chr(mt_rand(97,122));//或者在构造函数的时候 // $this -> allFont ="abcdefghizklmnopqrstuvwxyz";
        }
    }

    //插入文字
    public function insertFont(){
        for($i=0;$i<strlen($this->font);$i++){
            $color = imagecolorallocate($this->img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
            imagettftext($this->img,25,mt_rand(-45,45),($i*25)+25,mt_rand(15,25),$color,"./code/default.ttf",$this->font[$i]);
        }
    }

    //扰乱码
    public function addX(){

    }

    public function getCode(){
        return $this->font;
    }
    //图片输出
    public function outPut(){
        ob_clean();//清除输出
        header("Content-type:image/png"); //输出的头部信息  决定输出类型
        $this -> createImg();             //生成图片背景
        $this -> createFont();            //创建文字
        $this -> insertFont();            //插入文字
        $this -> addX();                  //
        imagepng($this->img);             //
    }
}


?>


