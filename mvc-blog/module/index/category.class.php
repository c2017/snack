<?php

    class category extends main{
        function init(){
            $db=new db("stu");
            $result=$db->select();
            $this->smarty->assign("result",$result);
            $this->smarty->display("index/index.html");
        }
    }







