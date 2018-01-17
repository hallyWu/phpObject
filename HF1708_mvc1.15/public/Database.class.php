<?php
/**
 * Created by PhpStorm.
 * User: 小剑
 * Date: 2018/1/9
 * Time: 16:05
 */

class Database
{
    private $user;          //用户名
    private $password;      //密码
    private $host;          //数据库连接的地址
    private $databaseName;  //数据库名称
    private $port;          //端口号
    private $link;          //数据库连接
    private $result;        //结果集
    private static  $db;    //静态变量，用于储存数据库对象

    //单例数据库
    public  static function createDB($config){
        if (self::$db==null){
            self::$db =new Database($config);
        }
        return self::$db;
    }

    //数据库的构造函数  用于存储连接属性和生成一个数据库的连接
    public function __construct($config){
        $this->host=$config['host'];
        $this->user=$config['user'];
        $this->password=$config['password'];
        $this->databaseName=$config['dbname'];
        $this->port=$config['port'];

        //new完之后就可以进行操作
        $this->link=@mysqli_connect($this->host,$this->user,$this->password,$this->databaseName,$this->port);
        //连接错误，重连属性
        if(!$this->link){
            exit("错误信息为：".mysqli_connect_error()."错代码为：".mysqli_connect_errno());
        }
        //读取出来的编码是utf8
        mysqli_query($this->link,"SET NAMES'utf8'");
    }
    //连接数据库

    //执行语句
    public function dealSql($sql){
        $this->result=mysqli_query($this->link,$sql);
        return $this->result;
    }

    //返回执行语句的结果
    public function searchSql($sql){
        $this->dealSql($sql);
        if ($this->result){
            $arr=[];
            while ($row=mysqli_fetch_assoc($this->result)){
                $arr[]=$row;
            }
            return $arr;
        }else{
            return "语句执行失败！";
        }
    }

    //析构函数
    public function __destruct(){
        @mysqli_free_result($this->rusult);  //抑制防止报错的事件发生
        mysqli_close($this->link);
    }

    public function isSuccess(){
        if (mysqli_affected_rows($this->link)>0 && $this->result){
            return true;
        }else{
            return false;
        }
    }
    public function trancation(){

    }
    //判断语句执行是否成功
    public function jubSql($sql){
        $this->dealSql($sql);
        $rows=mysqli_affected_rows($this->link);
        if ($rows > 0 && $this->result){
            return true;
        }else{
            return false;
        }
    }
}