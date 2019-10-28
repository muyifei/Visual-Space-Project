<?php 

header('Content-type:text/html;charset=utf-8');
//CURL模拟HTTP

//开启

$ch=curl_init();
//var_dump($ch);

//设置连接选项

curl_setopt($ch,CURLOPT_URL,'https://www.bilibili.com/');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
curl_setopt($ch,CURLOPT_HEADER,0);

//执行

$content=curl_exec($ch);

var_dump ($content);

curl_close($ch);