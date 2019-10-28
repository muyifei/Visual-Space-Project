<?php
$str="host=localhost port = 5432 dbname=mydata user=postgres password=a20110609";
$con=pg_connect($str);

if(!$con)
	echo "error";
else 
	echo "connected";

echo "<br>";

$AskStr="select * from company";

$result=pg_query($AskStr);

echo $result;

echo "<br>";

$rows = pg_num_rows($result);
echo "<br>";

//解析资源
$row=pg_fetch_assoc($result);
//echo '<pre?';
print_r($row);

echo '<br>';

$row1=pg_fetch_row($result);
print_r($row1);

pg_close($con);

echo '<br>';

$row2=pg_fetch_array($result); 
print_r ($row2);

echo '<br>';
$row3=pg_fetch_result($result,0,3);//pg_fetch_result ( resource $result , int $row , mixed $field ) : mixed 第row行第field个数据
echo $row3;

echo '<br>';

$row4=pg_fetch_object($result,2);
echo $row4->name;

echo '<br>';

$name=pg_field_name($result,2);
echo $name;

$num=pg_field_num($result,"name");
echo $num;

?>
