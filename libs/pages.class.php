<?php
    class pages{

        public $total;  //数据总量
        public $pageNum;  //每页显示的数据条数
        public $current;  //当前页码
        public $pagesnub; //页码的数量
        public $limit; //查询位置

        public function __construct($total,$pageNum=10)
        {
            if(!isset($total)){
                echo "请传入数据总量";
                exit;
            }

            $this->total=$total;
            $this->pageNum=$pageNum;

            $this->pagesnub=ceil($this->total/$this->pageNum);

            /*
             * 判断有没有 pages参数，如果有，current就是它，如果没有，设置current为0
             * */
            $this->current=isset($_GET["pages"])?$_GET["pages"]:0;
        }

        /*
         * total  数据总量
         * 每页显示的条数  $pageNum
         * 当前页码   current
         * pageNums  页码的数量  向上取整ceil()
         * param 地址栏默认的参数
         *
         * 注意，属性声明的时候不能运算，初始化需要写在构造函数里
         *
         * 构造函数
         *      参数：total pageNum $param
         * out()方法
         *
         *
         * */

        function out(){

            /*
             * 创建字符串 page 保存 '...pages='  ，方便后面构造路径
             * */

            $url=substr($_SERVER["REQUEST_URI"],0,strrpos($_SERVER["REQUEST_URI"],"?"));
            $request_url=substr($_SERVER["REQUEST_URI"],strrpos($_SERVER["REQUEST_URI"],"?"));

            $page=strrpos($request_url,"pages")?
                substr($request_url,0,strrpos($request_url,"pages")+6)
                :$request_url.'&pages=';
            $page=$url.$page;

            /*
             * 分页  最小值 最大值 步进值
             *  最大值 $start
             *  最小值 $end
             *
             *  首页 startPage
             *  尾页 endPage
             * */

            $str="一共有".$this->total."条&nbsp;&nbsp;一共有".$this->pagesnub."页";
            // 首页
            $startPage=$page.'0';
            $str.="<a class='startPage' href=".$startPage.">首页</a>";

            // 页码
            $start=$this->current-3<0?0:$this->current-3;
            $end=$this->current+3>$this->pagesnub?$this->pagesnub:$this->current+3;

            for($i=$start;$i<$end;$i++){
                if($i==$this->current){
                    $str.="<a class='nowPage' href=".$page.$i.">".$i."</a>";
                }else{
                    $str.="<a href=".$page.$i.">".$i."</a>";
                }

            }

            // 尾页
            $endPage=$page.($this->pagesnub-1);
            $str.="<a class='endPage' href=".$endPage.">尾页</a>";

            $this->limit="limit ".$this->current*$this->pageNum.",".$this->pageNum;

            return $str;
        }

    }



