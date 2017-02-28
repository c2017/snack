<?php
    include "../public/session.php";
    include "../public/db.php";

    $id=$_GET["id"];
    $posname=$_GET["posname"];
    $sql="update position set posname='$posname'  where posid=".$id;

    $db->query("$sql");
    if($db->affected_rows>0){
        $message="修改成功";
        $url="showpos.php";
        include "message.html";
    }else{
        $message="修改失败";
        $url="showpos.php";
        include "message.html";
    }




?>