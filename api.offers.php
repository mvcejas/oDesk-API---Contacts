<?php
	session_start();

	include 'oDeskAPI.lib.php';

	$o = new oDeskAPI($_SESSION['api_secret'],$_SESSION['api_key']);
	
	$o->auth();

	$r = $o->get_request('http://www.odesk.com/api/hr/v2/offers.json',array('provider__reference'=>$_SESSION['provider_reference'],'page'=>'0;200'));

	header('content-type:application/json');
	echo $r;
?>
	