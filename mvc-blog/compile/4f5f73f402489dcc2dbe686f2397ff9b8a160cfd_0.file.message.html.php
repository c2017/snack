<?php
/* Smarty version 3.1.30, created on 2017-03-03 08:18:34
  from "D:\wamp\www\study\yue\moni-mvc\template\admin\message.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58b918ca54fb28_56504630',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4f5f73f402489dcc2dbe686f2397ff9b8a160cfd' => 
    array (
      0 => 'D:\\wamp\\www\\study\\yue\\moni-mvc\\template\\admin\\message.html',
      1 => 1488525512,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58b918ca54fb28_56504630 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>提示信息</title>
    <style>
        .box{
            height:200px;
            width: 300px;
            border:1px solid #ddd;
            margin:auto;
            position:fixed;
            left:0;top:0;
            right:0;bottom:200px;
        }
        h3{
            line-height:40px;
            height:40px;
            width:100%;
            background:#eee;
            text-align:center;
            font-weight:500;
            margin:0;
        }
        .con{
            padding-top:10px;
            line-height:40px;
            width:100%;
            text-align:center;
        }
    </style>
    <?php echo '<script'; ?>
 src="<?php echo JS_PATH;?>
/jquery-min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo JS_PATH;?>
/message.js"><?php echo '</script'; ?>
>
</head>
<body>
<div class="box">
    <h3>提示信息</h3>
    <div class="con">
        <?php echo $_smarty_tpl->tpl_vars['message']->value;?>
<br />
        <span>3</span>秒后返回首页<br />
        如果没有跳转<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">点击这里</a>
    </div>
</div>
</body>
</html><?php }
}
