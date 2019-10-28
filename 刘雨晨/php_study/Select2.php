<?php

$str="host = localhost port=5432 dbname=test user=postgres password=329033";
$link = pg_connect($str);

$job=$_POST['emp_job'];
$dno=$_POST['emp_dno'];



$select="SELECT name FROM EMPLOYEE1 WHERE job='$job' AND dno=$dno;";

$result=pg_query($link,$select);

if(!$result)
{
	echo 'failed';
	exit();
}
else
//print_r($result);

echo "employee in dept $dno whose job is '$job':\n";

$index=0;

while(@$re=pg_fetch_array($result,$index))
{
	echo $re[0];
	$index++;
}
