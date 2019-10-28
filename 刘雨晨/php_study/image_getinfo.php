<?php

//定义图片
$image='E:\Server\apache\Apache24\htdocs\my.png';

$img=imagecreatefrompng($image);
echo imagesx($img).'<br>';
echo imagesy($img).'<br>';
echo '<pre>';
print_r (getimagesize($image));