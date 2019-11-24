<?php
//引入数据库连接文件
require_once("./connect_mysql.php");

//开启session
session_start();
//判断表单的合法提交
if(isset($_POST['token']) && $_SESSION['token'] == $_POST['token']){
	//获取表单提取数据
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$code = $_POST['code'];

	//判断验证码是否正确
	if(strtolower($code) != $_SESSION['code'])
	{
		echo "<h2>验证码错误</h2>";
		header("refresh:3;url=./login.php");//3秒后login.php
		die();
	};


	//判断用户名和密码
	$sql = "select * from $db_table_user where username='$username' and password='$password'";
	$result = mysqli_query($link, $sql);
	$recodes = mysqli_num_rows($result);//取回查找数量
	if(!$recodes){
		echo "<h2>用户名密码错误</h2>";
		header("refresh:3;url=./login.php");//3秒后调回login.php
		die();
	}
	//登录成功
	$_SESSION['username'] = $username;
	//跳入主页
	header('location:./index.php');
}else{
	//跳转到login
	header("location:./login.php");
}