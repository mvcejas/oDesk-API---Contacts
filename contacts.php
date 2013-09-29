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
		$.getJSON('xhr-contacts.php',function(r){
			console.log(r);
			o+= '<table class="table table-bordered">';
			o+= '<thead>';
			o+= '<tr><th>Portrait</th><th>Name</th><th>Last Interaction</th></tr>';
			o+= '</thead>';
			o+= '<tbody>';
			$.each(r.contacts.contact,function(a,b){
				console.log(b);
				o+= '<tr><td><img src="'+b.portrait_url+'"></td><td style="text-transform:capitalize">'+b.firstname+' '+b.lastname+'</td><td>'+b.last_interaction_ts+'</td></tr>';
			});
			o+= '</tbody>';
			o+= '</table>';
			$('#oContainer').html(o);
		});
	});
	function parseEpoch(epoch){
		var d = new Date(epoch * 1000);
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