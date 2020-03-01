# Hello World!


1.用于用户登录与注册的数据库
创建表格，用于存储用户的id与password；
要求：id 与 password都不允许为空值
CREATE TABLE userinfo(id varchar(50) NOT NULL,
                      passwd integer NOT NULL,
				      PRIMARY KEY(id)
				     );
2. 连接数据库
<?php
    $conn_string = "host=localhost port=5432 dbname=postgres user=postgres password=lw5271314";
	$db = pg_connect("$conn_string");
	if(!$db)
		echo "连接失败！！/r/n";
	else 
		echo "连接成功！！";
?>           

