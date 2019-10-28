<?php

$dir='E:/Server/apache';

/*
	创建函数：访问文件后判断是目录还是文件
	string dir指定路径
	int  level
*/

function scan($dir,$level)
{
	if(!is_dir($dir))
	{
		die($dir.'<br>');
	}
	
	$dir1=opendir($dir);
	
	$res=readdir($dir1);
	
	while($res)
	{
		if(($res!='.')&&($res!='..'))
		{
			//构造路径
			$file_dir=$dir.'/'.$res;
			echo str_repeat("&nbsp;&nbsp;&nbsp;",$level).$file_dir .'<br>';
			
			if(is_dir($file_dir))
			{
				scan($file_dir,$level+1);
			}
		}
			$res=readdir($dir1);
	
	}
	closedir($dir1);
}	

scan($dir,0);