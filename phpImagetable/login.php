<?php
//产生表单token并放入session
//开启session会话
session_start();
$_SESSION['token'] = uniqid();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录</title>
</head>
<body>
	<form action="loginSave.php" method="post">
		<label for="username">用户名</label>
		<input type="text" id="username" name="username">
		<br/>
		<label for="password">密码</label>
		<input type="password" id="password" name="password">
		<br/>
		<label for="code">验证码</label>
		<input type="text" id="code" name="code">
		<img src="./captcha.php" alt="" width=80 height=20 style="vertical-align: bottom;" onClick="this.src='./captcha.php?'+ Math.random()">
		<br/>
		<input type="submit" value="登录">
		<input type="hidden" value="<?php echo $_SESSION['token'] ?>" name="token">
		<input type="reset" value="重置">
	</form>
</body>
</html>