<?php
	session_start();

	include 'oDeskAPI.lib.php';

	$o = new oDeskAPI($_SESSION['api_secret'],$_SESSION['api_key']);
	
	$o->auth();

	$r = $o->get_request('https://www.odesk.com/api/ab/v1/contacts.json',array('page'=>'0;500','order'=>'freq'));
	echo $r;
?>
	