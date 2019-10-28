<?php
$font='STHUPO.TTF';
$img=imagecreatetruecolor(200,50);

//处理背景色
$bg_col=imagecolorallocate($img,220,220,220);
imagefill($img,0,0,$bg_col);


$str_col=imagecolorallocate($img,100,100,100);
//写入文字
imagettftext($img,30,20,80,20,$str_col,$font,'中');
//imagettftext($img,30,20,30,20,$str_col,?,'中');

//header('Content-type:image/png');

imagepng($img);

imagedestroy($img);