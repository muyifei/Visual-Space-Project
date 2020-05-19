<?php
	$raw = file_get_contents('php://input');
	$data = json_decode($raw, true);//数组
	
	$user = $data['username'];
	$passwd = $data['passwd'];
	$json = array("token"=>'no', 'error'=>'no');
	$conn_string = "host=localhost port=5432 dbname=space user=postgres password=vs19space";
	//echo json.encode($json);
	//return;
	$db = pg_connect("$conn_string");
	if(!$db){
		$json['error'] = "数据库连接失败"; 
	}else{
		$sql= "	SELECT * FROM userid where name = '".$user."';";
		//echo $data_id;
		$ret = pg_query($db, $sql);

		if(!$ret){   //判断是否成功连接数据库
			$json['error'] = "connect database failed!";
		} else{		
			$arr = pg_fetch_all($ret);

			if ($arr == false){
				$json['error'] = "账户或密码不存在";
			}else if (($user) == trim($arr[0]['name']) && strval($passwd) == trim($arr[0]['passwd'])){
				#set token
				session_start();//session_regenerate_id()
				$_SESSION['authority'] = 1;
				$_SESSION['user'] = $user;
				$_SESSION['openid'] = $_SESSION['openid'];
				$json['token'] = true;
			}else{
				echo $arr[0]['name'];
				return;
				$json['error'] = "账户或密码错误";
			}			
		}
	}

	echo (json_encode($json, true));
?>
