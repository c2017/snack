<?php
/* Smarty version 3.1.30, created on 2017-03-03 09:37:40
  from "D:\wamp\www\study\yue\moni-mvc\template\admin\reg.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58b92b54b8dae0_47436666',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e496c928fef9163a89297edbb8d0e20346af56ab' => 
    array (
      0 => 'D:\\wamp\\www\\study\\yue\\moni-mvc\\template\\admin\\reg.html',
      1 => 1488529275,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58b92b54b8dae0_47436666 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>
/admin/reg.css">
</head>
<?php echo '<script'; ?>
 src="<?php echo JS_PATH;?>
/jquery-min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo JS_PATH;?>
/admin/reg.js"><?php echo '</script'; ?>
>

<body>
<form action="index.php?m=admin&a=addReg" method="post">
    <div class="box">
        <h3>注册页</h3>
        用户名：<input type="text" value="" name="username" use="no" /><br/><span class="message"></span><br/>
        密　码：<input type="password" value="" name="password" use="no" /><br/><span class="message"></span><br/>
        验证码：<input type="text" value="" name="code" size="4" use="no"><img src="index.php?m=admin&f=index&a=code" alt="验证码" title="点击更换" class="code" onclick="this.src='index.php?m=admin&f=index&a=code&'+Math.random()"><span class="codes"></span><br/>
        <input type="submit" value="注册" disabled="disabled" /><br/>
        <p>已有用户名，请<a href="index.php?m=admin&a=login">点击登录</a></p>
    </div>
</form>
</body>

</html><?php }
}
