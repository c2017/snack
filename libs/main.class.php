<?php
    class main{
        function __construct()
        {
            $this->session=new session();

            $this->smarty=new Smarty();
            $this->smarty->setCompileDir("compile");
            $this->smarty->setTemplateDir("template");

        }

        /*
         * 跳转
         * */
        public function jump($url,$message){
            $this->smarty->assign("url",$url);
            $this->smarty->assign("message",$message);
            $this->smarty->display("admin/message.html");
        }

        /*
         * 检测登陆
         * */
        function checkLogin(){
            if(!($this->session->get("is_login")&&!empty(MVC))){
                $url="index.php?m=admin&f=index&a=login";
                $message="请登陆";
                $this->jump($url,$message);
                return false;
            }else{
                return true;
            }
        }
    }

