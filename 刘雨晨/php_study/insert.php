<?php
//初始化
include_once 'Database.php';

$pub_time=time();
$sql= "insert into n_news (id,title,isTop,content,publish,pub_time) values(2,'itcast',false,'GOGOGO','Harry','{$pub_time}');";

if(pg_query($sql))
{
	echo 'success';
}
else
{
	echo 'failed';
}
?>