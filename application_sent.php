<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.1/css/bootstrap-combined.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.1/js/bootstrap.min.js"></script>
	<script src="throbber.js"></script>
	<script>
	$(document).ready(function(){
		var o = '';
		$.getJSON('api.offers.php',function(r){
			o+= '<table class="table table-bordered">';
			o+= '<thead><tr><th>Sent</th><th>Job</th></tr></thead>';
			o+= '<tbody>';
			$.each(r.offers.offer,function(a,b){
				if(b.candidacy_status=='in_process' && b.interview_status=='waiting_for_buyer'){
					o+= '<tr><td>'+parseEpoch(b.created_time)+'</td><td>'+b.job__title+'</td></tr>';
					console.log(b);
				}
			});
			o+= '</tbody>';
			o+= '</table>';
			$('#oContainer').html(o);
		});
	});
	function parseEpoch(epoch){
		var d = new Date(epoch.substr(0,10) * 1000);
		return d.toDateString();
	}
	</script>
	<style>
	.xalert{
		position: absolute;
		margin:-8px 0 0 -5px;
		font-size:11px;
		display: none;
		color:#CC0000;
	}
	</style>
</head>
<body>
<div class="container">
	<?php include 'header.inc';?>
	
	<div id="oContainer">
		
	</div>
	
</div>
</body>
</html>