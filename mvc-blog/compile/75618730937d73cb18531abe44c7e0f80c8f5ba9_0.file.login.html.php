<?php
/* Smarty version 3.1.30, created on 2017-03-02 09:28:25
  from "D:\wamp\www\study\yue\moni-mvc\template\index\login.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58b7d7a979dc95_47209003',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '75618730937d73cb18531abe44c7e0f80c8f5ba9' => 
    array (
      0 => 'D:\\wamp\\www\\study\\yue\\moni-mvc\\template\\index\\login.html',
      1 => 1488443211,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58b7d7a979dc95_47209003 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>
/login.css">
</head>
<body>
<form action="checkLogin.php" method="post">
    <div class="box">
        <h3>登录页</h3>
        用户名：<input type="text" value="" name="username"/><br/>
        密　码：<input type="password" value="" name="password"/><br/>
        <input type="submit" value="登录"/><br/>
        没有用户名，请<a href="reg.php">点击注册</a>
    </div>
</form>
</body>
</html><?php }
}
