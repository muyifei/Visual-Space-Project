<?php

header('Content-type:text/html;charset=utf-8');

echo '<pre>';

var_dump($_POST);
var_dump($_FILES);//$_FILES:image name type tmp_name error size 

//取得文件信息

$file1=$_FILES['image'];

//判断是否为上传文件

if(is_uploaded_file($file1['tmp_name']))
{
if(move_uploaded_file($file1['tmp_name'],'E:/Server/upload/'.$file1['name']))
	{
		echo 'Successfully upload';
	}
	else 
	{
		echo 'failed to store';
	}
}
else
{
	echo 'failed to upload';
}
?>