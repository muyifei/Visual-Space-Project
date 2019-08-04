<?php
	//connect
	$conn = pg_connect("host=localhost port=5432 dbname=test user=postgres");
	
	if(!$conn){
		echo "Error : Unable to open database\n";
	} else {
		echo "Opened database successfully\n";
	}
	$name = $_POST['name'];
	$number = $_POST['number'];
	$gender = $_POST['gender'];
	$birthday = $_POST['birthday'];
	
	$sql =<<<EOF
    INSERT INTO student (number, gender, name, birthday)
    VALUES ($number, $gender, $name, $birthday);
EOF;
  	$ret = pg_query($conn, $sql);
  	if(!$ret){
   	echo pg_last_error($conn);
  	} else {
   	echo "Insert successfully\n";
  	}
 	 pg_close($conn);
	
?>
