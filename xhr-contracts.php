<?php
	session_start();
	
	include 'oDeskAPI.lib.php';

	$o = new oDeskAPI($_SESSION['api_secret'],$_SESSION['api_key']);
	
	$o->auth();

	$r = $o->get_request('https://www.odesk.com/api/hr/v2/engagements.json',array('page'=>'0;500','order_by'=>'engagement_end_date;engagement_start_date;DD'));
	echo $r;
?>
	