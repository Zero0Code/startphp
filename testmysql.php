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


    $sql2="CREATE TABLE user2(
    uid mediumint(8) unsigned NOT NULL auto_increment,
    username char(15) NOT NULL default'',
    password char(32) NOT NULL default'',
    email varchar(40) NOT NULL default'',
    regdate int(10) unsigned NOT NULL default 0,
    PRIMARY KEY(uid),
    UNIQUE KEY username(username),
    KEY email(email)
    )ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";

    if(mysql_query($sql2,$conn)){
    	echo("创建数据表成功");
    	echo("<br>");
    }else{
    	echo("创建数据表失败".mysql_error());
    	echo("<br>");

    }

?>