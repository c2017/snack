<?php
    include "../public/session.php";
    include "../public/db.php";

    $host=$_GET["host"];
    $imgfile=$_GET["imgfile"];

    $result=$db->query("select * from info");
    if($result->fetch_assoc()){
        $sql="update info set host='$host',imgfile='$imgfile'";
    }else{
        $sql="insert into info (host,imgfile) values ('$host','$imgfile')";
    }

    $db->query($sql);

//study/yue/moni-cms/upload
//localhost

    if($db->affected_rows>0){
        $message="修改成功";
        $url="editinfo.php";
        include "message.html";
    }else{
        $message="修改失败";
        $url="editinfo.php";
        include "message.html";
    }

?>