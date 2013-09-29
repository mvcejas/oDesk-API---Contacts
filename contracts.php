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
		$.getJSON('xhr-contracts.php',function(r){
			console.log(r);
			o+= '<table class="table table-bordered">';
			o+= '<thead>';
			o+= '<tr><th>Contract</th><th>Time Period</th><th>Terms</th><th>Status</th></tr>';
			o+= '</thead>';
			o+= '<tbody>';
			$.each(r.engagements.engagement,function(a,b){
				console.log(b);
				o+= '<tr><td>'+b.engagement_title+'</td><td>'+parseEpoch(b.engagement_start_date)+'</td><td>'+(b.status=='active' ? (b.engagement_job_type=='hourly' ? '$'+parseFloat(b.hourly_pay_rate).toFixed(2)+'/hour' : '$'+b.fixed_pay_amount_agreed+' fixed'+' - '+b.fixed_price_upfront_payment+'% upfront') : b.engagement_job_type)+'</td><td>'+b.status+'</td></tr>';
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