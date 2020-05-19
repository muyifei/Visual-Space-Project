<?php
	$json = array("token"=>'no', 'error'=>'no');
	try {

		session_start();
		//echo $openid;
		//$user = $data['username'];
		//$passwd = $data['passwd'];
		$user = $_SESSION['user'];
		$openid = $_SESSION['openid'];
		if ($openid == ''||(!isset($openid))) {
			$json['error'] = "openid未定义";
			echo (json_encode($json, true));
			exit;
		}
		$conn_string = "host=localhost port=5432 dbname=space user=postgres password=vs19space";
		$db = pg_connect("$conn_string");
		if(!$db){
			$json['error'] = "数据库连接失败";
		}else{
			$sql = "SELECT * FROM userid where openid = '".$openid."' and name='".$user."';";
			$ret = pg_query($db, $sql);
			
			if(!$ret){
				$json['error'] = "连接数据库失败";
			}else{
				$arr = pg_fetch_all($ret);
			
				if($arr == false){//没有这个openid，出错
					
				   $json['error'] = "您未绑定过";
				}else{
					$update = "update userid set openid = '' where openid = '".trim($openid)."';";
					//echo ("username is ".$user);
					$ret = pg_query($db, $update);
					if (!$ret){
						//echo "update unsuccessfully\n";
						$json['error'] = pg_last_error($db);
					 }else{
						$json['token'] = true;
					 }
				}
			}
		}
		echo (json_encode($json, true));


	} catch (Exception $e) {
	    $json['error'] = ($e->getMessage());
	    //debug_print_backtrace();
	    echo (json_encode($json,true));
	}
?>




