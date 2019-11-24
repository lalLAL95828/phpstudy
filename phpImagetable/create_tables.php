<?php
echo time();
die();


//创建数据库
//CREATE DATABASE IF NOT EXISTS `phpstudy` CHARSET utf8

//创建用户表
// CREATE TABLE IF NOT EXISTS `imageUsers`(
// 	`id` int not null primary key auto_increment,#用户id
// 	`username` varchar(20),#用户名 长度为20个字符
// 	`password` char(32) #密码 长度为定长
// )ENGINE=InnoDB;

//添加一条数据
//INSERT INTO `imageUsers` VALUES(null,'admin', 'e10adc3949ba59abbe56e057f20f883e');

//创建相册数据表
// CREATE TABLE IF NOT EXISTS `imagePhotos`(
// 	`id` int not null primary key auto_increment,
// 	`title` varchar(20), #照片标题
// 	`image_src` varchar(100), #图片路径
// 	`info` text, #照片简介
// 	`clickNum` int not null default 0,#访问量
// 	`add_time` int(10) #发布时间
// )ENGINE=InnoDB;

