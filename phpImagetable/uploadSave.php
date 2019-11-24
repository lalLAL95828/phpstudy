<?php
session_start();

if(empty($_SESSION['username'])){
	header("location:./login.php");
};

require_once('./connect_mysql.php');

//有token才接收
if(isset($_POST['token']) && $_SESSION['token'] == $_POST['token']){
	//获取表单数据
	$title = $_POST['title'];
	$des = $_POST['des'];
	$date = time();

	//图片处理
	// var_dump($_FILES['imgsrc']);

	//照片文件类型
	
	if($_FILES['imgsrc']["error"] != 0){
		echo "文件错误";
		die();
	};
	//判断文件类型
	$imgTypeArr = array("image/gif", "image/jpeg", "image/png");
	$fileinfo = finfo_open(FILEINFO_MIME_TYPE);
	$content = finfo_file($fileinfo, $_FILES['imgsrc']["tmp_name"]);
	echo $content;
	if(!in_array($content, $imgTypeArr)){
		echo "请上传图片文件";
		die();
	};
	//取到文件后缀名
	$imgTypeArr2 = array("gif", "png", "jpg");
	$ext = pathinfo($_FILES['imgsrc']["name"], PATHINFO_EXTENSION);
	if(!in_array($ext, $imgTypeArr2)){
		echo "请上传正确图片后缀的文件";
		die();
	};

	//存储文件
	$tmp_name = $_FILES['imgsrc']["tmp_name"];
	$dst_name = "./images/".uniqid().".".$ext;

	move_uploaded_file($tmp_name, $dst_name);


}else{
	header("location:./login.php");
}

?>