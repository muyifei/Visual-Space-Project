<?php
	session_start();
	unset($_SESSION['user']);
	unset($_SESSION['authority']);
	//session_destroy();
	
	echo (json_encode(array("token"=>true, 'error'=>'no'),true));
?>
