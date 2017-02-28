<?php
    include "../public/session.php";
    include "../public/db.php";

    $cid=$_POST["category"];
    $sid=$_POST["sid"];
    $stitle=$_POST["stitle"];
    $scon=$_POST["scon"];
    $username=$_SESSION["username"];

    if(isset($_POST["imgurl"])){
        $simgurl=$_POST["imgurl"];
    }else{
        $simgurl="";
    }

    if(isset($_POST["pos"])){
        $posid=$_POST["pos"];
    }else{
        $posid=0;
    }

    $sql="update shows set cid=$cid,stitle='$stitle',scon='$scon',simgurl='$simgurl',username='$username',posid=$posid where sid=$sid";


    $db->query($sql);
    if($db->affected_rows>0){
        $message="修改文章成功";
        $url="showcon.php";
        include "message.html";
    }else{
        $message="修改文章失败";
        $url="showcon.php";
        include "message.html";
    }



?>