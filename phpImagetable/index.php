<?php
session_start();

if(empty($_SESSION['username'])){
	header("location:./login.php");
}

echo $_SESSION['username'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<a href="upload.php">上传图片</a>
</body>
</html>