<?php


//$res = @mkdir('directory');

//$res= @rmDir('directory');

$res=@opendir('E:/Server/upload');
//var_dump($res);

$file=readdir($res);

while($file)
{
echo $file,'<br>';
$file=readdir($res);
}

closedir($res);