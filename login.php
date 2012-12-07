<?php

	session_start();
	
	// If the session vars aren't set, try to set them with a cookie.
	if (!isset($_SESSION['userid'])) {
		if (isset($_COOKIE['userid'])) {
			$_SESSION['userid'] = $_COOKIE['userid'];
		}
	}
	
?>

<!DOCTYPE html> 
<html>

<head>
	<title>Bookends</title> 
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="jquery.mobile-1.2.0.css" />
	<link rel="stylesheet" href="style.css" />
	<link rel="apple-touch-icon" href="appicon.png" />
	<link rel="apple-touch-startup-image" href="startup.png">
	
	<script src="//cdn.optimizely.com/js/141321804.js"></script>
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>
	
	<style>
	.thingy{
		background-image:url('images/splash6.png');
		background-repeat:no-repeat;
		background-size:320px 470px;
	}
	
/*	.signup-btn{
		position:absolute;
		left:42px;
		top:220px;
		background-clip: border-box;
		border-color:#990000;
		background-image:#990000;
		
	}*/
	
/*	.signup-btn .ui-btn-inner.ui-btn-corner-all{
		background-color:#990000;
	}
	
	.signup-btn.ui-btn-up-c .ui-btn-inner.ui-btn-corner-all .ui-btn-text{
		color:white;
		font-weight:normal;
	}*/
	
	.signup-btn{
		text-shadow:rgba(0,0,0,.5) 1px 1px 0px;
		position:absolute;
		left:68px;
		top:175px;
	}
	
	</style>

</head> 
<body> 


<div class="thingy" data-role="page" id="filter">

	<!-- <div data-role="header">
	
		<h1>Bookly</h1>
		<a href="index.html" id="left-action-btn">Sign Up</a>

	</div> --> <!-- /header --> 
	
  <div data-role="content" style="margin-left: 30px; margin-right: 30px;">
    
	  <!-- <div style="font-size: 1.5em; font-weight: bold; margin: 10px 0;">Welcome to Bookly</div>
	  	  <div style="font-size: 1em; margin: 10px 0;">A strongly-connected, campus wide textbook marketplace. </div> -->
	
	  <form class="loginform" action="submitLogin.php" method="post" data-ajax="false" style="position: absolute; top: 145px; left: 61px;">
		<fieldset class="inputs">
		  <div class="input-wrapper">
			<input type="text" id="emailaddress" name="emailaddress" placeholder="Email">
		  </div>
		  <div class="input-wrapper">
			<input type="password" id="password" name="password" placeholder="Password">
		  </div>
		</fieldset>
			<button type="submit" name="submit"  class="btn btn-primary" style="margin-left:5px;">Log in</button>
			<a href="index.html" class="signup-btn" style="color:#ADADAD;">Sign Up</a>
	  </form>

</div>

	

</div><!-- /page -->


</body>
</html>