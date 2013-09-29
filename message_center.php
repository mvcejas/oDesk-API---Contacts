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
		$.getJSON('xhr-mc.php',function(r){
			console.log(r);
			$.each(r.trays,function(a,b){
				console.log(b);
				if(b.unread>0)
					$('#'+b.type).text(b.unread).show();
			});
		});		
	});	
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

	<div id="content">
	</div>

</div>
</body>
</html>