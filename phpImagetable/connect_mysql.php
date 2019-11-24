<?php
$db_host = "localhost";
$db_database = "phpstudy";
$db_port = "3306";
$db_user = "root";
$db_pass = "LALsq20190822";
$db_table_user = "imageUsers";
$db_table_photo = "imagePhotos";
$db_charset = "utf8";

if(!$link = @mysqli_connect($db_host.":".$db_port, $db_user, $db_pass)){
	echo "<h2>连接数据库失败</h2>";
	die();//终止程序
};

//选择数据库
if(!mysqli_select_db($link, $db_database)){
	echo "<h2>选择数据库失败</h2>";
	die();
};

//设置字符集
mysqli_set_charset($link, $db_charset);
