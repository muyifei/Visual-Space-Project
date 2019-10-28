<?php
//初始化
include_once 'Database.php';

$pub_time=time();
$sql= "delete from n_news where id = 10;";

if(pg_query($sql))
{
	echo 'delete success';
}
else
{
	echo 'failed';
}?>