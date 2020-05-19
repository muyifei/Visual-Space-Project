<?php
	$json = array("token"=>'no', 'error'=>'no');
	try {

		session_start();
		//echo $openid;
		//$user = $data['username'];
		//$passwd = $data['passwd'];
		$openid = $_SESSION['openid'];
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
					$update = "update userid set openid = '".$openid."' where name = '".$user."';";
					//echo ("username is ".$user);
					$ret = pg_query($db, $update);
					if (!$ret){
						//echo "update unsuccessfully\n";
						$json['error'] = pg_last_error($db);
					 }else{
						$json['token'] = true;
					 }
				   
				}else{
					$json['error'] = "此微信号已经绑定过";
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




