<?php



    function P($aa=""){
        if(isset($_GET[$aa])){
            return $_GET[$aa];
        }else if($_POST[$aa]){
            return $_POST[$aa];
        }else{
            echo "获取失败";
        }
    }
