<?php
	try {
	$user = $_GET['user'];
	$code = $_GET['code'];
	$appid = 'wx9cd9e82142e45644';
	$appsecret = '85b67823f91162f4bdcbe0c40973ebe5';
	$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$appid."&secret=".$appsecret."&code=".$code."&grant_type=authorization_code";

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_TIMEOUT,30);

        $content = curl_exec($ch);
        $status = (int)curl_getinfo($ch,CURLINFO_HTTP_CODE);
        if ($status == 404) {
	    echo '404';
            return $status;
        }
        curl_close($ch);
        //var_dump(json_decode($content,true));
	//return;


	$openid = json_decode($content,true)['openid'];
	//echo $openid;
	//$user = $data['username'];
	//$passwd = $data['passwd'];
	$json = array("token"=>'no', 'error'=>'no');
	$conn_string = "host=localhost port=5432 dbname=space user=postgres password=vs19space";
	$db = pg_connect("$conn_string");
	if(!$db){
	    $json['error'] = "数据库连接失败";
	}else{
	    $sql = "SELECT * FROM userid where openid = '".$openid."';";
	    $ret = pg_query($db, $sql);
	    
	    if(!$ret){
		$json['error'] = "连接数据库失败";
	    }else{
		$arr = pg_fetch_all($ret);
	
		if($arr == false){//没有这个openid，可以正常插入
		    $update = "update userid set openid = $1 where name = $2;";
		    pg_prepare($db,'update',$update);
		    echo ("username is ".$user);
		    if (pg_execute($db,'update', array(string($openid), trim($user)))==false){
			echo "update unsuccessfully\n";
		   	echo pg_last_error($db);
		     } 
		   
		}else{
		    $json['error'] = "已经绑定过";
		}
	    }
	    if($json['error']=='no'){
		echo "<script>var ok=1;</script>";
	    }else{
		echo "<script>var ok=0;</script>";
	    }
	}
	echo $json['error']." (if no is ok)";
	} catch (Exception $e) {
	    echo ($e->getMessage());
	    debug_print_backtrace();
	    echo "<script>var ok=0;</script>";
	}
?>
<html>
<head>
</head>

<body>
<h1> hello </h1>
</body>
</html>



