<?php
    include "../public/session.php";
    include "../public/db.php";
    $sql="select * from info";
    $result=$db->query($sql);
    if($row=$result->fetch_assoc()){
        $host=$row['host'];
        $imgfile=$row['imgfile'];
    }else{
        $host="";
        $imgfile="";
    };

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="editinfoInfo.php">
    主机名称：<br/>
    <input type="text" name="host" value="<?php echo $host;?>"><br/>
    主机的upload文件夹绝对路径，不写主机：<br/>
    <input type="text" name="imgfile" value="<?php echo $imgfile; ?>"><br/>
    <input type="submit" value="提交">
</form>

</body>
</html>