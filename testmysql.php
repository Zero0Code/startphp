<?php
    $conn=mysql_connect("localhost","root","");
    if(!$conn){
        die("数据库连接失败：".mysql_error());
    }else{
        echo("连接数据库成功");
    }

?>