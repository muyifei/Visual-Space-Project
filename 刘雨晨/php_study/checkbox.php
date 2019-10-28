<?php
echo '<pre>';
print_r ($_POST);

$hobby=isset($_POST['hobby'])?$_POST['hobby']:array();


//数组转换成有格式字符串
$Hobbyste=implode($hobby,'|');

echo $Hobbyste;

var_dump(explode('|',$Hobbyste)); 

?>