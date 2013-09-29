<?php
	session_start();
	
	include 'oDeskAPI.lib.php';

	$o = new oDeskAPI($_SESSION['api_secret'],$_SESSION['api_key']);
	
	$o->auth();

	$r = $o->get_request('https://www.odesk.com/api/profiles/v1/providers/'.$_SESSION['provider_key'].'.json');
	echo $r;
?>
	