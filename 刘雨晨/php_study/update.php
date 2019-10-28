<?php
//初始化
include_once 'Database.php';

$pub_time=time();
$sql= "update n_news set content='GGGG' where id =0;";

if(pg_query($sql))
{
	echo 'success';
}
else
{
	echo 'failed';
}?>