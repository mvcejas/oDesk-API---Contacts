<?php
	session_start();
	
	include 'oDeskAPI.lib.php';

	$o = new oDeskAPI($_SESSION['api_secret'],$_SESSION['api_key']);
	
	$o->auth();

	$r = $o->get_request('https://www.odesk.com/api/mc/v2/trays/'.$_SESSION['user'].'/notifications.json',array('page'=>'0;500'));
	echo $r;
?>
	