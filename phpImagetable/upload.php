<?php
session_start();

if(empty($_SESSION['username'])){
	header("location:./login.php");
}

//创建
$_SESSION['token'] = uniqid();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>上传图片</title>
</head>
<body>
	<form action="uploadSave.php" method="post" enctype="multipart/form-data">
		<label for="title">图片名称</label>
		<input type="text" id="title" name="title">
		<br/>
		<label for="imgsrc">上传图片</label>
		<input type="file" id="imgsrc" name="imgsrc">
		<br/>
		<label for="des">图片描述</label>
		<input type="text" id="des" name="des">
		<br/>
		<input type="submit" value="提交">
		<input type="hidden" value="<?php echo $_SESSION['token'] ?>" name="token">
		<input type="reset" value="重置">
	</form>
</body>
</html>