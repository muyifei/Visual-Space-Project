<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
	
	<title>登录测试</title>
    <style>
	    .error { color: #FF0000;}
		h2 {color: #6fCDF7;}
		body{
			background-color: #b0c4de;
		}
		.center{
			margin:auto;
			width:60%;
			border:3px;
			padding:2px;
		}
		
		div{
			background-color: #6495ed;
		    background-image: url('image/register_back.jpg');
			background-repeat: no-repeat; 
			background-position: left top;
		}
		
		label{
			cursor: pointer;
			display:inline-block;
			paddiing: 3px 6px;
			text-align: rigth;
			width: 70px;
			vertical-align:top;
		}
	</style>
</head>
<body>

<?php
    /*连接postgresql数据库*/
	$conn_string ="host=localhost port=5432 dbname=postgres user=postgres password=lw5271314";
		/* 参数含义 
        （1）host：主机名
        （2）port：端口号
        （3）dbname：数据库
        （4）user：数据库用户名
        （5）password：用户密码		
 	*/
    $db = pg_connect("$conn_string");
	if(!$db)
		echo "连接失败！！ /r/n";


 /*    1. 此处不用get收集表单的原因：所有的变量名和值都会显示在URL中
    因为用户密码属于敏感信息，不能放在URL内。
	   2. POST方法的表单发送的信息对任何人是不可见的（不会显示在浏览器的地址栏），
	并且对发送信息的量也没有限制。
 */
 
 
    //定义全局变量并设置为空值
	$userErr = $passwdErr = "";
    $user = $passwd = "";  //用于获取表单中输入的信息
	
	/* $_SERVER["REQUEST_METHOD"]：用于表判断表单是GET提交还是POST提交*/
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	    /*   empty()函数用于检查一个变量是否为空值
		  当一个变量并不存在，或者它的值等同于false时，那么它就被认为不存在。
		  如果变量不存在的话，empty()并不会产生警告*/
		if(empty($_POST["user"])) {
			$userErr = "用户名是必须的。";
		} else{
			$user = test_input($_POST["user"]);   //获取表单中的用户信息
		}
		
		if(empty($_POST["passwd"])) {
			$passwdErr = "密码是必须的。";
		} else{
			$passwd = test_input($_POST["passwd"]);
		}
	}
	
	function test_input($data) {
		$data = trim($data);   //除单词之间的空格外，清除多余的空格
		$data = stripslashes($data);  //用于清除从数据库或表单中取回的数据中包含的反斜杠
		$data = htmlspecialchars($data);  //把预定的字符转化为HTML实体
		return $data;
	}
	
	/*  对于输入的用户名及密码，判断其在数据库中是否存在，若存在则返回登录成功；
	若数据空没有该信息，则返回用户需要注册*/
	/*$user与$passwd为全局变量，需要遍历数据库，比较用户名与密码信息*/
	$sql =<<< EOF
	SELECT * FROM userinfo;
EOF;

    $ret = pg_query($db, $sql);
	/*函数解析： pg_query() -->执行查询。返回查询结果的资源号
          参数：pg_query(resource connection , tring query)
		       （1）connection：指定连接的数据库信息
			   （2）query：数据库执行查询语句
	*/
	if(!$ret){   //判断是否成功连接数据库
		echo "请刷新重试";
		exit;
	} else{
		/*若成功连接数据库，则进行遍历数据库*/
		
		$arr = pg_fetch_all($ret);
		/*  pg_fetch_all(resource $result)：从结果资源中返回一个包含所有行（元组/记录）的数组
		 如果没有更多行可供提取，则返回FALSE。*/
		$length = count($arr);
		//$data = $user."".$passwd;
		//echo $data;
		echo "<br>";
		for($x=0; $x<$length; $x++){
			/*声明两个变量用于与表单中的数据作比较，判断用户是否存在数据库中*/
			$data_id = $arr[$x]['id'];   //声明变量$data_id用于取出数组中的第一个数据id
			$data_passwd = $arr[$x]['passwd']; //声明变量$data_passwd用于取出数组中的第二个数据passwd
            
			/* 判断用户是否存在 */
			if($user == $data_id && $passwd == $data_passwd){
				echo "登录成功！！";
			}
		}
	}
	
?>

<div class="center">
    <h2 align="center"> 登录信息 </h2>
    <p> <span class="error">* 必填字段。</span> </p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        <label for="user"> 用户名: </label> 
		<input type="text" id="user" name="user" align="left">
	    <span class="error">* <?php echo $userErr; ?> </span>
	    <br><br>
	
	    <label for="passwd"> 密码: </label>
		<input type="password" id="passwd" name="passwd" align="left">
	    <span class="error">* <?php echo $passwdErr; ?> </span>
        <br><br>
	
	    <input type="submit"  name="submit" value="确认登录" style="margin-left:260px">
	    <br><br>
    </form>
</div>

</body>
</html>

<!-- $_GET、$_POST 和 $_REQUEST 的区别？
    (1)$_GET 变量接受所有以 get 方式发送的请求，及浏览器地址栏中的 ? 之后的内容。

    (2)$_POST 变量接受所有以 post 方式发送的请求，
例如，一个 form 以 method=post 提交，提交后 php 会处理 post 过来的全部变量。

    (3)$_REQUEST 支持两种方式发送过来的请求，即 post 和 get 它都可以接受，
显示不显示要看传递方法，get 会显示在 url 中（有字符数限制），post 不会在 url 中显示，
可以传递任意多的数据（只要服务器支持）。
->
