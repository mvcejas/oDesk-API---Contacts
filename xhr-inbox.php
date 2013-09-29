<?php
	session_start();
	
	include 'oDeskAPI.lib.php';

	$o = new oDeskAPI($_SESSION['api_secret'],$_SESSION['api_key']);
	
	$o->auth();

	$r = $o->get_request('http://www.odesk.com/api/mc/v1/trays/'.$_SESSION['user'].'/inbox.json',array('page'=>'0;10'));
	echo $r;
?>
	