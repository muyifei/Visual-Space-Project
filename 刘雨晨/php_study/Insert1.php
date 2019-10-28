<?php
$str="host = localhost port=5432 dbname=test user=postgres password=329033";
$link = pg_connect($str);

$emp_name=$_POST['emp_name'];
$emp_job=$_POST['emp_job'];
(int)$emp_dno=$_POST['emp_dno'];


$q=pg_query($link,"insert into employee1(name,job,dno) values('{$emp_name}','{$emp_job}',{$emp_dno});");
if($q)
	echo "success";
else 
	echo "fail";
?>