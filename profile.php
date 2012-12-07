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
		<h1>Your Profile</h1>
		<a href="logout.php" data-ajax="false" data-transition="flip" id="left-action-btn">Logout</a>
		<a href="editProfile.php" id="edit-btn">Edit</a>

	</div><!-- /header -->

  <div data-role="content">

    	<?php
			require_once('connectvars.php');

			$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

			$userid = $_SESSION['userid'];
			$query = "SELECT * FROM users WHERE id = '$userid'";
			$result = mysqli_query($dbc, $query);

		//now we need to loop through each book and find all the matching sellers for each book			
			while ($row = mysqli_fetch_assoc($result)) {
	    		echo "<div class><span class='prof-block'><b>Name:</b></span> ".$row["full_name"]."</div><hr>";
	    	}
    	?>

    	<?php
    		$result = mysqli_query($dbc, $query);
    		while ($row = mysqli_fetch_assoc($result)) {
	    		// echo "<p>Gender: ".$row["gender"]."</p>";
	    		echo "<div><span class='prof-block'><b>Email:</b></span> ".$row["email"]."</div><hr>";
	    		echo "<div><span class='prof-block'><b>Phone:</b></span> ".$row["phone_number"]."</div><hr>";
	    	}
    	?>


  <!-- <p> Add books/notes you're looking to buy in the Buy section and books/notes you're looking to sell in the Sell section.</p>
  <p>  Then immediately see which students fill your need and directly message them right away!</p> -->

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