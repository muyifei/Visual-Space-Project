<?php
 #连接数据库
     
     $conn_string ="host=localhost port=5432 dbname=postgres user=postgres password=1234567";
     $db = pg_pconnect("$conn_string");
	 if(!$db)
		 echo "连接失败！！！/r/n";
	 else
		 echo "连接成功！！！";
		 
$sql =<<<EOF
    CREATE TABLE employees(emp_id SERIAL,
	                       name VARCHAR(20),
						   job  VARCHAR(20),
						   dno INTEGER,
						   PRIMARY KEY(emp_id));
EOF;
	 $ret = pg_query($db, $sql);
	 if(!$ret){
		 echo pg_last_error($dbconn);
	 }
	 else{
		 echo "Table create successfully\n";
	 }
	 
    #pg_close()关闭数据库	
	pg_close($db);
?>
