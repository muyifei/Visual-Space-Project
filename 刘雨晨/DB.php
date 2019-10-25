<?php

$str="host = localhost port=5432 dbname=test user=postgres password=329033";
$link = pg_connect($str);

 $d=pg_query($link,"CREATE TABLE EMPLOYEE1
  (Emp_id SERIAL PRIMARY KEY ,
  Name CHAR(15),
  Job CHAR(10),
  Dno INTEGER);");
  
  if($d)
	  echo 'success';
  else
	  echo 'failed';
 ?>