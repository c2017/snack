<?php

    class session{
        function __construct()
        {
            session_start();
        }

        /*
         * 给$_SESSION身上设置属性
         * */
        function set($k,$v=""){
            if(is_array($k)){
                foreach ($k as $k1=>$v1) {
                    $_SESSION[$k1]=$v1;
                }
            }else{
                $_SESSION[$k]=$v;
            }
        }

        /*
         * 删除$_SESSION身上的某个属性
         * */
        function del($k){
            if(isset($_SESSION[$k])){
                unset($_SESSION[$k]);
            }
        }

        /*
         * 清空全部$_SESSION身上的属性
         * */
        function clear(){
            foreach ($_SESSION as $k=>$v){
                unset($_SESSION[$k]);
            }
        }

        /*
         * 检查$_SESSION身上的某个属性是否存在
         * */
        function get($k){
            return isset($_SESSION[$k])?true:false;
        }

    }