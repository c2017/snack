<?php
include "../public/session.php";
include "../public/db.php";
include "../public/function.php";

$tree=new abc();
$id=$_GET["id"];
$tree->tree(0,1,"category",$db);

$result=$db->query("select * from shows where sid=".$id);
$row=$result->fetch_assoc();

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
<?php echo "<script> var cid=".$row["cid"]."</script>";?>
<script src="../js/jquery-min.js"></script>
<script src="../js/upload.js"></script>
<script>
    $(function(){
//  设置当前文章的分类为选择状态
        $("select").find("option").each(function(){
            if($(this).attr("value")==cid){
                $(this).attr("selected","selected");
            }
        });

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


    })
</script>

<body>
<form action="editconInfo.php" method="post" enctype="multipart/form-data">
    文章分类：<select name="category">
        <?php
        echo $tree->str;
        ?>
    </select>
    <br/>
    文章标题：<input type="text" name="stitle" value="<?php echo $row['stitle']?>"><br/>
    文章内容：<br/>
    <textarea name="scon" cols="30" rows="10" ><?php echo $row['scon']?></textarea><br/>
    <input type="hidden" value="<?php echo $id;?>" name="sid">
    添加图片：<input type="file"  name="file" id="file"><br/>
    <div class="box">
        <div class="img"><img src="<?php echo $row['simgurl']?>" alt=""></div>
        <div class="progress"></div>
    </div>
    <input type="hidden" name="imgurl" id="imgurl" value="<?php echo $row['simgurl'] ?>">
    <div class="progress"><div></div></div><br/>
    推荐位：<br/>
    <?php
        $possql="select * from position";
        $posresult=$db->query($possql);while($posrow=$posresult->fetch_assoc()){
        echo $posrow["posname"];
        ?>
        <input type="radio" value="<?php echo $posrow['posid']?>" name="pos" <?php if($posrow["posid"]==$row["posid"]){
            echo "checked='checked'";
            }?>>&nbsp;
        <?php
    } ?>
    <input type="submit" value="修改文章" id="submit">
</form>
</body>
</html>