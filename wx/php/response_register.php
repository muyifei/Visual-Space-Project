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

			if ($arr == false){//新建账户
				#set token
				$insert= "insert into userid values('".$user."', '".$passwd."','');";
				$ret = pg_query($db, $insert);
				if ($ret){
					session_start();//session_regenerate_id()
					$_SESSION['authority'] = 1;
					$_SESSION['user'] = $user;
					$json['token'] = true;
				}else{
					$json['error'] = pg_last_error($db);
					echo (pg_last_error($db));
				}
				
			}else { //已有账户
				$json['error'] = "账户已存在";

			}		
		}
	}

	echo (json_encode($json, true));
?>
