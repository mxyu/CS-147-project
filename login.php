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
	<title>Books and Notes App</title> 
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="jquery.mobile-1.2.0.css" />
	<link rel="stylesheet" href="style.css" />
	<link rel="apple-touch-icon" href="appicon.png" />
	<link rel="apple-touch-startup-image" href="startup.png">
	
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>

</head> 
<body> 

<div data-role="page" id="filter">

	<div data-role="header">
		<h1>Sign In</h1>
		<a href="index.html" data-icon="check">Sign Up</a>

	</div><!-- /header -->


  <h2>Sign in</h2>
	<div class="body">
	  <form action="submitLogin.php" method="post" data-ajax="false">
		<fieldset class="inputs">
		  <label>Email</label>
		  <div class="input-wrapper">
			<input class="search-query span2"  type="text" id="emailaddress" name="emailaddress" placeholder="Email">
		  </div>
	<!--       <div class="hint">You can also use your email address</div>-->
		  <label>Password</label>
		  <div class="input-wrapper">
			<input class="search-query span2"  type="password" id="password" name="password" placeholder="Password">
		  </div>
		</fieldset>
			<button type="submit" name="submit"  class="btn btn-primary" style="margin-left:5px;">Log in</button>
	  </form>
	</div>


	

</div><!-- /page -->


</body>
</html>