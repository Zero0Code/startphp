<?php
    $conn=mysql_connect("localhost","root","");

    if(!$conn)
    {
        die("数据库连接失败：".mysql_error());
    }else{
        echo("连接数据库成功");
        echo("<br>");
    }

    if(@mysql_query("CREATE DATABASE testdb",$conn))
    {
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

    if(!mysql_query($sql,$conn))
    {
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
    //修改表
    $sql3 = "ALTER TABLE user2 ADD status TINYINT(1) UNSIGNED NULL;";
    if(mysql_query($sql3,$conn))
    {
    	echo("修改表成功");
    	echo("<br>");
    }else{
    	echo("修改表失败".mysql_error());
    	echo("<br>");
    }

    //删除表
   	// $sql4="ALTER TABLE user2 DROP status;";
   	// if(mysql_query($sql4,$conn))
   	// {
   	// 	echo("删除表成功");
   	// 	echo("<br>");
   	// }else{
   	// 	echo("删除表失败".mysql_error());
   	// 	echo("<br>");
   	// }

   	// 改变字段及属性
   	$sql5="ALTER TABLE user2 CHANGE status status_bak INT(8) UNSIGNED NULL DEFAULT 1;";
   	if(mysql_query($sql5,$conn))
   	{
   		echo("改变成功");
   		echo("<br>");
   	}else{
   		echo("改变失败".mysql_error());
   		echo("<br>");
   	}

   	//增加索引（或表约束等其他）属性
   	$sql6="ALTER TABLE user2 ADD INDEX (status_bak)";
   	if(mysql_query($sql6,$conn)){
   		echo("增加索引成功");
   		echo("<br>");
   	}else{
   		echo("增加索引失败".mysql_error());
   		echo("<br>");
   	}

   	//对表进行重命名
   	$sql7="RENAME TABLE user2 TO user3";
   	if(mysql_query($sql7,$conn))
   	{
   		echo("重命名成功");
   		echo("<br>");
   	}else{
   		echo("重命名失败".mysql_error());
   		echo("<br>");
   	}

   	//添加数据
   	//为避免中文乱码做入库编码转换
   	mysql_query("set names 'utf8'");
   	$password=md5("123456");
   	$regdate=time();
   	$sql8="INSERT INTO user2(username,password,email,regdate) VALUES ('小王','$password','813419496@qq.com','$regdate')";

   	if(!mysql_query($sql8,$conn)){
   		echo "添加数据失败：".mysql_error();
   		echo "<br/>";
   	}else{
   		echo "添加数据成功";
   		echo "<br/>";
   	}

    //查询数据
   	mysql_query("set character set 'utf8'");
   	$sql9="SELECT * FROM user2";
   	$result=mysql_query($sql9);

   	while($row=mysql_fetch_array($result))
   	{
   		echo "用户名：".$row['username']."<br/>";
   		echo "电子邮箱：".$row['email']."<br/>";
   		echo "注册日期：".date("Y-m-d",$row['regdate'])."<br/><br/>";
   	}
 
 	// $sql10="SELECT * FROM user2 WHERE username='小王'";
 	// $result=mysql_query($sql10);
 	// while($row=mysql_fetch_array($result))
  //  	{
  //  		echo "用户名：".$row['username']."<br/>";
  //  		echo "电子邮箱：".$row['email']."<br/>";
  //  		echo "注册日期：".date("Y-m-d",$row['regdate'])."<br/><br/>";
  //  	}
?>