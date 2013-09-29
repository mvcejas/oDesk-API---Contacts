<?php
	session_start();

	include 'oDeskAPI.lib.php';

	if(isset($_POST['api_key']) && isset($_POST['api_secret'])){
		$api_key = trim($_POST['api_key']);
		$api_secret = trim($_POST['api_secret']);

		if(empty($api_key) || empty($api_secret)){
			session_destroy();
			header("location:login.php");
		}

		$_SESSION['api_key'] = $api_key;
		$_SESSION['api_secret'] = $api_secret;	
	}	

	if(isset($_SESSION['api_key']) && isset($_SESSION['api_secret']) && !isset($_GET['e'])){
		$o = new oDeskAPI($_SESSION['api_secret'],$_SESSION['api_key']);

		$o->auth();

		$r = $o->get_request("https://www.odesk.com/api/hr/v2/users/me.json");			
		$r = json_decode($r);		
		$_SESSION['user'] = $r->user->id;		
		$_SESSION['provider_key'] = $r->user->profile_key;
		$_SESSION['provider_reference'] = $r->user->reference;
		header("location:message_center.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.1/css/bootstrap-combined.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.1/js/bootstrap.min.js"></script>
	<script src="throbber.js"></script>
	<script>
	$(function(){
		$('form').submit(function(e){
			//e.preventDefault();
			if($('#api_secret').val().length!=16){
				$('#api_secret').val('').focus();
				return false;
			}
			if($('#api_key').val().length!=32){
				$('#api_key').val('').focus();
				return false;
			}
			return true;
		});
	});
	</script>
</head>
<body>
<div class="container">
	<div class="span5">
		<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
			<fieldset>
				<legend>Please enter your oDesk API keys.</legend>

				<?php if(isset($_GET['e'])){
					echo '<div class="alert alert-error">Error: Authorization failed. Invalid API keys.</div>';
				}?>
				
				<div class="control-group">
					<label class="control-label" for="api_secret">oDesk API secret :</label>
					<div class="controls">
						<input type="text" name="api_secret" id="api_secret" value="" maxlength="16" required="required" autocomplete="off">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="api_key">oDesk API key :</label>
					<div class="controls">
						<input type="text" name="api_key" id="api_key" value="" maxlength="32" required="required" autocomplete="off">
					</div>
				</div>
				<div class="controls">
					<button type="submit" class="btn btn-success">Connect</button>
				</div>
			</fieldset>
		</form>
	</div>
	<div class="span6">
		<h3>Guide</h3>
		<div class="well">
			<p>Where to find oDesk API keys? - <a href="https://www.odesk.com/services/api/keys" target="_blank">https://www.odesk.com/services/api/keys</a></p>
			<p>If you don't have one, please apply at <a href="https://www.odesk.com/services/api/apply" target="_blank">https://www.odesk.com/services/api/apply</a></p>
			<p>Your <strong>Callback URL</strong> should be: http://<?=$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);?>/login.php ; and</p>
			<p><strong>Auth type</strong> must be: API Keys</p>
		</div>
	</div>
</div>
</body>
</html>