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
	<title>Bookends</title> 
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
	<script src="//cdn.optimizely.com/js/141321804.js"></script>

</head> 
<body> 

<div data-role="page" id="filter">

	<div data-role="header">
		<h1>Edit Profile</h1>
		<a href="profile.php" id="left-action-btn">Cancel</a>

	</div><!-- /header -->

<!-- <table class="tweet">
  <tr class="tweet-header">

      
  </tr>
  <tr class="tweet-container">
    <td colspan="2" class="tweet-content">


    </td>
  </tr>
  <tr>
    <td colspan="2" class="meta-and-actions">
      <span class="metadata">
      <div class="tweet-text">Rating: 5/5 stars</div> 
    </td>
  </tr>
    <tr>
    <td colspan="2" class="meta-and-actions">
      <span class="metadata">
    </td>
  </tr>
  
</table> -->

<div data-role="content">

	<form method="post" action="edit2.php" name="editProfilePage" data-ajax="false">
		<div class="fullname input-wrapper" style="margin-top: 0px;">
			<span class="prof-block"><label><b> Name:</b></label></span>
		<?php
			require_once('connectvars.php');
			$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			$userid = $_SESSION['userid'];
			$query = "SELECT * FROM users WHERE id = '$userid'";
    		$result = mysqli_query($dbc, $query);
    		while ($row = mysqli_fetch_assoc($result)) {
    			echo "<input autocomplete='off' type='text' data-mini='true' id='fullname' name='fullname' style='width: 60%; margin-top: 0px; margin-bottom: 0px;' value='".$row["full_name"]."'/>";
	    		echo "</div><hr><div class='input-wrapper'><span class='prof-block'><b>Email:</b></span> ".$row["email"]."</div>";
	    	}
    	?>	
	  <!-- <hr>
		<div class="input-wrapper">		  
			<span class="prof-block"><label><b>Gender:</b></label></span>
				<fieldset id="gender" data-role="controlgroup" data-type="horizontal" data-mini="true" style="margin: 0px 0px;">
					<input type="radio" name="gender" id="radio-choice-1" value="m" />
					<label for="radio-choice-1">Male</label>
					<input type="radio" name="gender" id="radio-choice-2" value="f"  />
					<label for="radio-choice-2">Female</label>	
			  </fieldset>
		</div> -->
		<hr>
			 
		<div class="phonenumber input-wrapper">
			<span class="prof-block"><label><b>Phone:</b></label></span>
		<?php
			require_once('connectvars.php');
			$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			$userid = $_SESSION['userid'];
			$query = "SELECT * FROM users WHERE id = '$userid'";
    		$result = mysqli_query($dbc, $query);
    		while ($row = mysqli_fetch_assoc($result)) {
    			echo "<input data-mini='true' autocomplete='off' type='text'  id='phonenumber' name='phonenumber' style='margin-top: 0px; margin-bottom: 0px; width: 60%;' value='".$row["phone_number"]."'/>";
	    	}
    	?>	
		</div><hr>
	
		<div class="input-wrapper">
			<button type="submit"  name="submit" class="btn btn-primary" style="margin-left: 10px; margin-right: 10px;">Update Profile Information</button>
		</div>
	</form>
	
</div>

	<div data-role="footer" data-id="samebar" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" data-grid="b">
		<ul>
			<li><a href="profile.php" class="ui-btn-active ui-state-persist">Profile</a></li>
			<li><a href="buyerPage.php">Buy</a></li>
			<li><a href="sellerPage.php">Sell</a></li>
			<!--<li><a href="messages.php" id="skull" data-icon="custom">Messages</a></li> -->
		</ul>
		</div>
	</div> <!-- footer -->
	

</div><!-- /page -->


</body>
</html>