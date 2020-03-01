<!DOCTYPE html>
<html>

<head>
    <meta charset = "utf-8">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
   
   <title>注册测试</title>
	<style>
	    body{
			background-color: #b0c4de;
		}
		div{
			background-color: #6495ed;
		    background-image: url('image/log_back.jpg');
			background-repeat: no-repeat; 
			background-position: left top;
		}
        .error { color: #FF0000;}
		
		h2 { color: #E034E3;}
		
		.center{
			margin:auto;
			width:60%;
			border:3px;
			padding:2px;
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
/* 连接postgresql数据库*/
    $conn_string = "host=localhost port=5432 dbname=postgres user=postgres password=lw5271314";
	/* 参数含义 
        （1）host：主机名
        （2）port：端口号
        （3）dbname：数据库
        （4）user：数据库用户名
        （5）password：用户密码		
 	*/
	
	$db = pg_connect("$conn_string");
	/* 函数说明：
       pg_connect(string connection_string): 打开一个由connection_string所指定的PostgreSQL数据库的连接。
	如果成功则返回连接资源，若不成功则返回FALSE.
	   connection_string：包括的参数有：host、port、dbname、user和password。
	*/
	if(!$db)
		echo "连接数据库失败！！ /r/n";


    //定义变量并设置空值
	$nameErr = $passwdErr1 =$passwdErr2 = $differenterror = $samepasswd= "";  
	/*变量命名含义：
	   （1）$nameErr：用于表示用户信息出错，即为空，以下两个皆如此；
	   （2）$passwdErr1: 用于第一次密码；
	   （3）$passwdErr2: 用于确认密码的出错信息。
	*/
	
	$name = $passwd1 = $passwd2 ="";
	/* 1. $name: 用来收集用户名；
	   2. $passwd1: 用来收集第一次密码输入；
	   3. $passwd2: 用来收集确认密码的信息。
	*/
	
	/* 使用POST表单提交 */
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(empty($_POST["name"])) {
			$nameErr = "用户名是必须的。";
		} else{
			$name = test_input($_POST["name"]);
		}
		
		if(empty($_POST["passwd1"])) {
			$passwdErr2 = "密码是必须的";
		} else{
			$passwd1 = test_input($_POST["passwd1"]);
		}
		
		if(empty($_POST["passwd2"])) {
			$passwdErr2 = "不能为空白";
		} else{
			$passwd2 = test_input($_POST["passwd2"]);
		}
		
		$insertarray = array("id"=>$name, "passwd"=>$passwd1);
		//print_r($insertarray);
		if($name == NULL && $passwd1 ==NULL && $passwd2==NULL){
			echo "请输入信息";
		}else{
		    if($passwd1 != $passwd2){
			    $differenterror = "两次输入的密码不同！！！" ;
		    } 
		    else{
			    $ret = pg_insert($db, 'userinfo',$insertarray);
                "注册成功";
			}
		}
	}
	
	function test_input($data){
		$data = trim($data);   //除单词之间的空格外，清除多余的空格
		$data = stripslashes($data);  //用于清除从数据库或表单中取回的数据中包含的反斜杠
		$data = htmlspecialchars($data);  //把预定的字符转化为HTML实体
		return $data;
	}
	
	pg_close();  //关闭数据库连接
?>
<div class="center">
    <h2 align="center"> 注册信息 </h2>
	<p> <span class="error" >* 必填字段。 </span></p>
	
	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?> ">
	    <label for="name"> 用户名: </label>
		<input type="text" id="name" name="name" align="left">
		<span class="error">*  </span>
		<br> <br>
		
		<label for="passwd1"> 密码: </label>
		<input type="password" id="passwd1" name="passwd1" align="left">
		<span class="error">* <?php echo $passwdErr1; ?> 密码为8位数字</span> 
		<br> <br>
		
		<label for="passwd2"> 确认密码: </label>
		<input type="password" id="passwd2" name="passwd2" align="left">
		<span class="error">* <?php echo $passwdErr2; ?> </span> 
		<br> <br>
		
		<input type="submit" name="submit" value="确认注册" style="margin-left:260px">
		<br><br>
		<?php echo $differenterror;?>
	</form>
</div>

</body>
</html>	
