<?php

    $db=new mysqli("localhost","root","");
    $db->query("create database myBlog");
    $db->query("use myBlog");

    $db->query("create table admin(
          aid int(11) PRIMARY KEY  auto_increment,
          aname VARCHAR(100),
          apass VARCHAR(32)
        )DEFAULT charset=utf8");

    $pass=md5('admin');
    $db->query("insert into admin (aname,apass) values ('admin','$pass')");

    echo "执行完毕";