<?php

echo '<pre>';

include_once 'Database.php';

$sql= 'select *from n_news';

$res= pg_query($sql);

if(!$res)
{
	echo pg_result_error($res);
}

//var_dump($res);

//echo '<br>';

$rows= pg_num_rows($res);

//解析结果集

/*
	取出一行作为关联数组
	Array ( [id] => 0 [title] => itcast [istop] => f [content] => GG [publish] => Harry [pub_time] => 1564198750 )
	表单名字作为数组下标
*/
$row= pg_fetch_assoc($res);
print_r($row);

/*

	取出一行作为索引数组

*/

$row=pg_fetch_row($res);
print_r($row);

/*
	获取关联或索引数组，默认都有
	PGSQO_ASSOC(关联)
	PGSQL_NUM(索引)
	PGSQL_BOTH(都有)

*/

$row=pg_fetch_array($res);

echo pg_num_fields($res);//字段数

$name= pg_field_name($res,0);//指定位置字段名
echo $name;

echo pg_field_num($res,'id');//指定字段名的位置


pg_result_error($res);

