<?php
    include "../public/session.php";
    include "../public/db.php";

    $result1=$db->query("select * from info");
    $row1=$result1->fetch_assoc();

    $sql="select * from shows";
    $result=$db->query($sql);
    while($row=$result->fetch_assoc()){
        if($row["simgurl"]){
            $str=$row["simgurl"];
            $str=substr($str,strrpos($str,"/")-8);
            $str="http://".$row1["host"]."/".$row1["imgfile"]."/".$str;
            if($str==$row['simgurl']){
                continue;
            }
            $sql="update shows set simgurl='$str' where sid=".$row["sid"];
            $db->query($sql);
            if($db->affected_rows>0){
                echo "图片路径修改成功<br/>";
            }else{
                echo "图片路径修改失败<br/>";
            }
            unset($str);
        }
    }

    echo "更新完成";


?>