<?php

    $sql=new mysqli("localhost","root","","stu");
    $sql->query("set names utf8");
    $result=$sql->query("select * from stu");

    $str="<table>";
    while($row=$result->fetch_assoc()){
        $str.="<tr>";
            $str.="<td>".$row["name"]."</td>";
            $str.="<td>".$row["age"]."</td>";
            $str.="<td>".$row["sex"]."</td>";
        $str.="</tr>";
    }
    $str.="</table>";
    echo $str;

?>