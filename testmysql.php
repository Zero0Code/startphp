<?php
    $conn=mysql_connect("localhost","root","");
    if(!$conn){
        die("数据库连接失败：".mysql_error());
    }else{
        echo("连接数据库成功");
        echo("<br>");
    }
    if(@mysql_query("CREATE DATABASE testdb",$conn)){
    	echo("创建数据库成功");
    	echo("<br>");
    }else{
    	echo("创建数据库失败：".mysql_error());
    	echo("<br>");
    }
    // 选择数据库
    mysql_select_db("testdb",$conn);
    $sql="CREATE TABLE user(
    uid mediumint(8),
    username varchar(20),
    password char(20),
    email varchar(40),
    regdata int(10)
    )";

    if(!mysql_query($sql,$conn)){
        echo("创建数据表失败:".mysql_error());
        echo("<br>");
    }else{
    	echo("创建数据表成功");
    	echo("<br>");
    }
?>