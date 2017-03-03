<?php

    define("MVC","YES");  // 定义一个常量，检测是否是从index.php进入的，如果不是，那么不允许

//    var_dump($_SERVER);

//    文件根目录
    define("ROOT_URL",__DIR__);
//    配置文件根目录
    define("LIBS_URL",ROOT_URL."/libs");

//    模版根目录
    define("TPL_INDEX_URL",ROOT_URL."/template/index");
    define("TPL_ADMIN_URL",ROOT_URL."/template/admin");

//    http根目录
    define("HTTP_URL","http://".$_SERVER["HTTP_HOST"].substr($_SERVER["SCRIPT_NAME"],0,strrpos($_SERVER["SCRIPT_NAME"],"/")));

//    index.php路径
    define("FILE_URL","http://".$_SERVER["HTTP_HOST"].$_SERVER["SCRIPT_NAME"]);

    define("CSS_PATH",HTTP_URL."/static/css");
    define("JS_PATH",HTTP_URL."/static/js");
    define("IMG_PATH",HTTP_URL."/static/images");
    define("FONT_PATH",HTTP_URL."/static/font");

    include LIBS_URL."/smarty-3.1.30/libs/Smarty.class.php";
    include LIBS_URL."/db.class.php";
    include LIBS_URL."/main.class.php";
    include LIBS_URL."/code.class.php";
    include LIBS_URL."/session.class.php";
    include LIBS_URL."/route.class.php";
    include LIBS_URL."/functions.php";

    $obj=new route();
    $obj->init();





