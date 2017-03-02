<?php
    include "../public/session.php";
    include "../public/db.php";
    include "../public/function.php";

    $tree=new abc();
    $tree->tree(0,1,"category",$db);

    $sql="select * from position";
    $result=$db->query($sql);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .box{
            height:200px;
            width:200px;
            border:1px solid #000;
        }
        .box .img{
            height:185px;
            width:100%;
        }
        .box img{
            height:100%;
            width:100%;
        }
        .box .progress{
            height:15px;
            width:0;
            background:red;
        }
    </style>
</head>
<script src="../js/upload.js"></script>
<script>
    window.onload=function(){
        var imgurl=document.querySelector("#imgurl");
        var btn=document.querySelector("#submit");
        var imgobj=new Upload("upload.php","#file",".progress",".box img");
        imgobj.uploadStart=function(){
            btn.setAttribute("disabled","disabled");
        }
        imgobj.up(function(e){
//            console.log(e);
            imgurl.value=e;
            btn.removeAttribute("disabled");
        })

    }
</script>
<body>
<form action="addconInfo.php">
    文章分类：<select name="category" id="">
        <?php
        echo $tree->str;
        ?>
    </select>
    <br/>
    文章标题：<input type="text" name="stitle"><br/>
    文章内容：<br/>
    <textarea name="scon" cols="30" rows="10"></textarea><br/>


    添加图片：<input type="file"  name="file" id="file"><br/>
    <div class="box">
        <div class="img"><img src="" alt=""></div>
        <div class="progress"></div>
    </div>
    <input type="hidden" name="imgurl" id="imgurl">

    推荐位：<?php while($row=$result->fetch_assoc()){
            echo $row["posname"];
        ?>
        <input type="radio" value="<?php echo $row['posid']?>" name="pos">&nbsp;
        <?php
    } ?>

    <input type="submit" value="添加文章" id="submit">
</form>
</body>
</html>