<?php
    include "../public/session.php";
    include "../public/db.php";

    $posname=$_GET["posname"];
    $sql="insert into position (posname) value ('$posname')";
    $db->query($sql);
    if($db->affected_rows>0){
        $message="添加成功";
        $url="addpos.php";
        include "message.html";
    }else{
        $message="添加失败";
        $url="addpos.php";
        include "message.html";
    }


?>