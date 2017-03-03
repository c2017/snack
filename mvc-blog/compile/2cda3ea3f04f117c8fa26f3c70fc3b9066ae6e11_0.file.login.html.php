<?php
/* Smarty version 3.1.30, created on 2017-03-03 09:30:25
  from "D:\wamp\www\study\yue\moni-mvc\template\admin\login.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58b929a1723fe0_42719800',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2cda3ea3f04f117c8fa26f3c70fc3b9066ae6e11' => 
    array (
      0 => 'D:\\wamp\\www\\study\\yue\\moni-mvc\\template\\admin\\login.html',
      1 => 1488529789,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58b929a1723fe0_42719800 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>
/admin/login.css">
    <?php echo '<script'; ?>
 src="<?php echo JS_PATH;?>
/jquery-min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo JS_PATH;?>
/admin/login.js"><?php echo '</script'; ?>
>
</head>
<body>
<form action="index.php?m=admin&a=onLogin" method="post">
    <div class="box">
        <h3>登录页</h3>
        用户名：<input type="text" value="" name="username"/><br/>
        密　码：<input type="password" value="" name="password"/><br/>
        验证码：<input type="text" value="" name="code" size="4" use="no"><img src="index.php?m=admin&f=index&a=code" alt="验证码" title="点击更换" class="code" onclick="this.src='index.php?m=admin&f=index&a=code&'+Math.random()"><span class="codes"></span><br/>
        <input type="submit" value="登录" disabled="disabled" /><br/>
        没有用户名，请<a href="index.php?m=admin&a=reg">点击注册</a>
    </div>
</form>
</body>
</html><?php }
}
