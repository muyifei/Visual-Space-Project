<?php
$str="host = localhost port=5432 dbname=test user=postgres password=329033";
$link = pg_connect($str);


$q=pg_query($link,"insert into employee1(name,job,dno) values('{$_POST['emp_name']}','{$_POST['emp_job']}','{$_POST['emp_dno']}');");

if($q)
	echo "success";
else
	echo "failed";

?>