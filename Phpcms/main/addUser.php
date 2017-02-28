<?php

    include "../public/session.php";
    include "../public/db.php";

    $username=$_SESSION["username"];
    $sql="select * from user where username='$username'";
    $result=$db->query($sql);
    $row=$result->fetch_assoc();
    if($row["role"]!=1){
        $message="对不起，您没有权限做此操作";
        $url="main.php";
        include "message.html";
        exit;
    }else{
        $message="权限检测成功，转入注册页";
        $url="reg.php";
        include "message.html";
        exit;
    }

?>
