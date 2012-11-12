<?php

	session_start();
	
	// If the session vars aren't set, try to set them with a cookie.
	if (!isset($_SESSION['userid'])) {
		if (isset($_COOKIE['userid'])) {
			$_SESSION['userid'] = $_COOKIE['userid'];
		}
	}
	
	if (!isset($_SESSION['userid'])) {
		header("Location: login.php");
		exit();
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
		<h1>Edit Profile</h1>
		<a href="profile.php" data-icon="back">Back</a>

	</div><!-- /header -->

<table class="tweet">
  <tr class="tweet-header">

  	  
  </tr>
  <tr class="tweet-container">
    <td colspan="2" class="tweet-content">


    </td>
  </tr>
  <tr>
    <td colspan="2" class="meta-and-actions">
      <span class="metadata">
      <!--<div class="tweet-text">Rating: 5/5 stars</div> -->
    </td>
  </tr>
    <tr>
    <td colspan="2" class="meta-and-actions">
      <span class="metadata">
		<!--<a href="#popupBasic" data-rel="popup">You Have 2 People to Rate!</a> 
		<div data-role="popup" id="popupBasic">
				<h1><a href="rateUser.html" data-icon="check">Rate Marshall Mathers</a></h1>
				<h1><a href="rateUser.html" data-icon="check">Rate Kim Kardashian</a></h1>
		</div>
		-->
    </td>
  </tr>
  
</table>
	<form method="post" action="edit2.php" name="editProfilePage" data-ajax="false">
		<div class="fullname input-wrapper">
			<label>Full Name:</label>
		<?php
			require_once('connectvars.php');
			$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			$userid = $_SESSION['userid'];
			$query = "SELECT * FROM users WHERE id = '$userid'";
    		$result = mysqli_query($dbc, $query);
    		while ($row = mysqli_fetch_assoc($result)) {
    			echo "<input autocomplete='off' type='text'  id='fullname' name='fullname' style='margin-top:5px;' value='".$row["full_name"]."'/>";
	    		echo "<p>Email: ".$row["email"]."</p>";
	    	}
    	?>	
			
		</div>
	
		<div class="input-wrapper">
			<legend>Gender:</legend>
			  <div data-role="fieldcontain">
				<fieldset data-role="controlgroup">
					<input type="radio" name="gender" id="radio-choice-1" value="m" />
					<label for="radio-choice-1">Male</label>
		
					<input type="radio" name="gender" id="radio-choice-2" value="f"  />
					<label for="radio-choice-2">Female</label>	
			</fieldset>
			</div>
		</div>
			 
		 
			 
		<div class="phonenumber input-wrapper">
			<label>Phone Number:</label>
		<?php
			require_once('connectvars.php');
			$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			$userid = $_SESSION['userid'];
			$query = "SELECT * FROM users WHERE id = '$userid'";
    		$result = mysqli_query($dbc, $query);
    		while ($row = mysqli_fetch_assoc($result)) {
    			echo "<input autocomplete='off' type='text'  id='phonenumber' name='phonenumber' style='margin-top:5px;' value='".$row["phone_number"]."'/>";
	    	}
    	?>	
		</div>
	
		<div class="input-wrapper">
			<button type="submit"  name="submit" class="btn btn-primary" style="margin-left: 10px; margin-right: 10px;">Update Profile Information</button>
		</div>
	</form>

	<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example" data-grid="b">
		<ul>
			<li><a href="profile.php" id="home" data-icon="custom" class="ui-btn-active">Profile</a></li>
			<li><a href="buyerPage.php" id="key" data-icon="custom">Buy</a></li>
			<li><a href="sellerPage.php" id="beer" data-icon="custom">Sell</a></li>
			<!--<li><a href="messages.php" id="skull" data-icon="custom">Messages</a></li> -->
		</ul>
		</div>
	</div>
	

</div><!-- /page -->


</body>
</html>