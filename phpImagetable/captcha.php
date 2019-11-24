<?php
//开启session
session_start();

//产生四位验证码字符串
$arr1= array_merge(range('a','z'), range("A","Z"), range(0,9));
shuffle($arr1);

//取出数组arr1的随机四位数的下标
$arr2 = array_rand($arr1,4);

$str = "";
foreach ($arr2 as $index) {
	$str .= $arr1[$index];
}
//保存验证码到session中
$_SESSION['code'] = strtolower($str);


$width = 80;
$height = 20;

//创建空画布
$image = imagecreatetruecolor(80, 20);

//绘制带填充的矩形
$color = imagecolorallocate($image, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
imagefilledrectangle($image, 0, 0, $width, $height, $color);

//绘制像素点
for($i =0 ;$i <= 100 ; $i++){
	$color2 = imagecolorallocate($image, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
	imagesetpixel($image, mt_rand(0,$width), mt_rand(0,$height), $color2);
}
//绘制线
for($i =0 ;$i <= 20 ; $i++){
	$color3 = imagecolorallocate($image, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
	imageline($image, mt_rand(0,$width), mt_rand(0,$height), mt_rand(0,$width), mt_rand(0,$height), $color3);
}
//写入文字
$fontsrc = "D:\phpstudy20191117\project\phpImagetable\images\msyh.ttf";
$color4 = imagecolorallocate($image, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
imagettftext($image, 18, 0, 5, 20, $color4, $fontsrc, $str);

//输出图像
header('content-type:image/png');
imagepng($image);

//销毁
imagedestroy($image);