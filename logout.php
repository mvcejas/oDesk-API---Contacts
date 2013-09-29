<?php
	session_start();
	session_destroy();
	foreach($_COOKIE as $k=>$v){
		setcookie($k,null,-1);
	}
	
	header("location:".dirname($_SERVER['PHP_SELF'])."/login.php");
?>