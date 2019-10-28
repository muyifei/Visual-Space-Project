<?php

$str='host = localhost port=5432 dbname=test user=postgres password=329033';
$link = pg_connect($str);

if(!$link)
{
	echo 'can not connect database';
	exit();
}
else
{
	$select='SELECT Name, Dno FROM EMPLOYEE1;';
	$result=pg_query($link,$select);
	
	$index=0;
	while(@$arr=pg_fetch_array($result,$index))
	{
		/*
		print_r($arr);
		
		echo '<pre>';
		var_dump($arr);
		echo $arr[0];
		*/
		
		echo "employee $arr[0]works for department $arr[1]</br>";
		$index=$index+1;
	}
	
	
	
	
}