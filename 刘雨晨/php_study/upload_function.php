<?php
//封装函数

/*
	单文件上传
	parament1 array $file
	parament2 array $allow_type
	parament3 string $path
	parament4 array $allow_formate
	parament5 string &$error	
	parament6 int $maxsize
*/

function upload_single($file,$allow_type,$path,&$allow_formate=array(),$error,$maxsize=200000)
{
	if(!is_array($file)||!isset($file['error']))
	{
		$error='上传文件无效';
		
		return false;
	}

	if(is_dir($path))
	{
		$error='路径不存在';
		return false;
	}
	
	
	

}

?>