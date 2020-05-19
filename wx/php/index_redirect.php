<?php
	//$user = $_GET['user'];
	session_start();
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
	
		if($arr == false){//没有这个openid，不用登陆
			session_destroy();
			session_start();
			$_SESSION['openid'] = $openid;
			//echo("no account");
		}else{//直接登陆
			session_destroy();
			session_start();
			$_SESSION['openid'] = $openid;
			
			//$_SESSION['user'] = trim($arr[0]['name']);
			//$_SESSION['authority'] = 1;
			//echo("success");	
		}
		
		Header("Location: http://47.111.115.187/wx/htmls/index.php");
		exit;
	    }
	}
?>
