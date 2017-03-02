<?php
    include "../public/session.php";
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="../css/public.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<script src="../js/jquery-min.js"></script>
<script>
    $(window).ready(function(){
        $(".opi").click(function(){
            $(this).parent().find(".son").toggle(100);
        })
    })

</script>
<body>
    <div class="header">
        <h2><?php echo $_SESSION["username"]; ?>，欢迎来到内容管理系统！</h2>
        <h5><a href="unlogin.php">退出登录</a></h5>
    </div>
    <div class="bottom">
        <div class="left">
            <ul>
                <li>
                    <span class="opi"><i></i>主页 <b></b></span>
                    <ul class="son">
                        <li><a href="../index/index.php" target="_">打开主页</a></li>
                    </ul>
                </li>
                <li>
                    <span class="opi"><i></i>用户管理 <b></b></span>
                    <ul class="son">
                        <li><a href="addUser.php" target="right">添加用户</a></li>
                        <li><a href="showUser.php" target="right">管理用户</a></li>
                    </ul>
                </li>
                <li>
                    <span class="opi"><i></i>分类管理<b></b></span>
                    <ul class="son">
                        <li><a href="addCategory.php" target="right">添加分类</a></li>
                        <li><a href="showCategory.php" target="right">管理分类</a></li>
                    </ul>
                </li>
                <li>
                    <span class="opi"><i></i>内容管理<b></b></span>
                    <ul class="son">
                        <li><a href="addcon.php" target="right">添加内容</a></li>
                        <li><a href="showcon.php" target="right">管理内容</a></li>
                    </ul>
                </li>
                <li>
                    <span class="opi"><i></i>推荐位管理<b></b></span>
                    <ul class="son">
                        <li><a href="addpos.php" target="right">添加推荐位</a></li>
                        <li><a href="showpos.php" target="right">管理推荐位</a></li>
                    </ul>
                </li>
                <li>
                    <span class="opi"><i></i>其它信息<b></b></span>
                    <ul class="son">
                        <li><a href="editinfo.php" target="right">其它信息管理</a></li>
                        <li><a href="imgurl.php" target="right">批量更新图片url</a></li>
                    </ul>
                </li>
            </ul>

        </div>
        <div class="right">
            <iframe src="" frameborder="0" name="right">

            </iframe>
        </div>
    </div>
</body>
</html>