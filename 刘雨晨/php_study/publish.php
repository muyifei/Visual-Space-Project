<?php

$str='host = localhost port=5432 dbname=test user=postgres password=329033';
$link = pg_connect($str);

$select='select name,job,dno from employee1';

$result=pg_query($link,$select);

$index=0;

while(@$res=pg_fetch_array($result,$index))
{
	echo "employee $res[0] has job $res[1] and works for department $res[2] </br>";
	$index++;
}