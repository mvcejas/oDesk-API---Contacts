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
		$.getJSON('xhr-archive.php',function(r){			
			/* navbar notifier */
			$.each(r.trays,function(a,b){
				if(b.unread>0)
					$('#'+b.type).text(b.unread).show();
			});

			o+= '<table class="table table-bordered">';
			o+= '<thead>';
			o+= '<tr><th>From</th><th>Subject</th><th>Date</th></tr>';
			o+= '</thead>';
			o+= '<tbody>';
			$.each(r.current_tray.threads,function(a,b){
				console.log(b);
				o+= '<tr><td>'+b.last_post_sender+'</td><td>'+b.subject+'</td><td>'+parseEpoch(b.last_post_ts)+'</td></tr>';
			});
			o+= '</tbody>';
			o+= '</table>';
			$('#oContainer').html(o);

			console.log(r);
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

	<div class="pagination">
		<ul>	
			<li><a href="">&lt;</a></li>
			<li><a href="">&gt;</a></li>
		</ul>
	</div>
	
</div>
</body>
</html>