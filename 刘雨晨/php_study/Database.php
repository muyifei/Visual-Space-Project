<?php
$str="host = localhost port=5432 dbname=test user=postgres password=329033";
$link = pg_connect($str);

//var_dump($link);

$result = pg_query($link,"select * from employee;");

//print_r ($result);

//解析结果资源
//echo '<pre>';


$res=pg_fetch_all($result);

//var_dump ($res);

$sum=0;

$i1=0;
while(@$res[$sum])
{
	//var_dump($res[i]);
	//echo $res[$sum]["salary"].'<br>';
	if($res[$sum]["salary"]>40000)
	{
		$i1++;
	}
	$sum++;
}
//echo $i1;

$part1=($sum-$i1)/$sum;
$part2=$i1/$sum;

//画图

$img=imagecreatetruecolor(1000,1000);

$bg_col=imagecolorallocate($img,255,255,255);
//var_dump($col);

imagefill($img,0,0,$bg_col);
//从指定点开始匹配相邻点，颜色一致则渲染扩展至全图


//画圆弧（圆）

$arc_color1=imagecolorallocate($img,0,255,255);


$arc_color2=imagecolorallocate($img,255,0,0);


for($k=300;$k>=200;$k--)
{
	imagefilledarc($img,400,$k,100,90,-80,360*$part1-80,$arc_color1,IMG_ARC_PIE);
	imagefilledarc($img,400,$k,100,90,360*$part1-80,-80,$arc_color2,IMG_ARC_PIE);	
}

//imagefilledarc($img,150,150,100,100,20,360*$part1+20,$arc_color1,IMG_ARC_PIE);

//保存：不指定路径则输出至浏览器，指定则保存到本地
header('Content-type:image/png');
imagepng($img);//修改响应头以告知浏览器这是图片
//imagepng($img,'my.png');

//销毁资源释放内存
imagedestroy($img);


pg_close($link);

?>
