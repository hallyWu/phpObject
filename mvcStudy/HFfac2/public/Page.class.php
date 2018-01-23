<?php
/**
 * Created by PhpStorm.
 * User: 小剑
 * Date: 2018/1/10
 * Time: 16:21
 */

class Page
{
    private $allRows;       //总条数
    private $onePage;       //每一页显示条数
    private $nowPage;       //当前页码
    private $allPage;       //总页数
    private $starRow;       //开始行数
    private $last;          //上一页
    private $next;          //下一页
    private $url;           //页面地址

    //构造函数
    public function __construct($allRows,$onePage,$url)
    {
        $this->allRows=$allRows;
        $this->onePage=$onePage;
        $this->url=$url;

        $this->nowPage=isset($_GET['nowpage'])?$_GET['nowpage']:1;       //当前页码
        $this->allPage=ceil($this->allRows/$this->onePage);                  //总页数
        $this->starRow=($this->nowPage-1)*$this->onePage;                          //开始查询条数
        $this->last=($this->nowPage-1)<1?1:$this->nowPage-1;                          //上一页
        $this->next=($this->nowPage+1)>$this->allPage?$this->allPag:$this->nowPage+1;
    }

    //返回开始页数
    public function getStar(){
        return $this->starRow;
    }

    //返回一页的条数
    public function getOne(){
        return $this->onePage;
    }

    public function showPage(){
        $str="<span>共有<span>{$this->allPage}</span>页，当前第<span>{$this->nowPage}</span>页</span>";
        for ($i=1;$i<=$this->allPage;$i++){
            $str.="<a href='{$this->url}&nowpage={$i}'>{$i}</a>";
        }
        $str.="<a href='{$this->url}&nowpage={$this->last}'>上一页</a><a href='{$this->url}&nowpage={$this->next}'>下一页</a>";
        return $str;
    }
}