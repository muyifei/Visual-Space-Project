<?php

	header('Content-type:text/html;charset=utf-8');
	
	//查看不同情形下多文件上传
	echo '<pre>';
	print_r($_FILES);
	
	/*
	foreach($_FILES as $file){
		
		if(is_uploaded_file($file['tmp_name']))
		{
			//move_uploaded_file($file['tmp_name'],'E:/Server/upload/'.$file['name']);
		}
	}
	*/
	
	//同名上传遍历
	
	if(isset($_FILES['image']['name'])&&is_array($_FILES['image']['name']))
	{
		//构造数组
		$images = array();
		foreach($_FILES['image']['name'] as $k =>$file)
		{
			$images[]=array(
			'name'=>$file,
			'tmp_name'=>$_FILES['image']['tmp_name'][$k],
			'type'=>$_FILES['image']['type'][$k],
			'error'=>$_FILES['image']['error'][$k],
			'size'=>$_FILES['image']['size'][$k]
			
			);
		}
		
	}
	
	print_r($images);
?>	
