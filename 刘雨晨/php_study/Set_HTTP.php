<?php

//PHP通过Header设置相应头

//content-type

/*

header('Content-type:text/html;charset=utf-8';
echo 'asdf';

*/


/*
location:立即重定向

header('Location:select.php');//立即跳转至select.php


*/

/*

延迟重定向

header('Refresh:3;url=select.php');

echo 'GOGOGO';

此例中延迟3秒
*/


//content-disposition
header('Content-disposition:attachment;filename=girl.jpg');//不解析直接下载成JPG
