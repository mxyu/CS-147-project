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


<!DOCTYPE php> 
<html>

<head>
	<title>Bookly</title> 
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
	<style>
	#price {
		font-size: 25px;
		text-align: right;
		padding-top: 20px;
		color: #2E2E2E;
	}
	#negotiable {
		font-size: 12px;
		text-align: right;
		margin-top: -15px;
		color: green;
	}

	#n-negotiable {
		font-size: 12px;
		text-align: right;
		margin-top: -15px;
		color: black;
	}

	.description_notes{

	}

	.seller-info {
		width:100%;
	}

/*	.ui-icon-message {
		background-image: url("08-chat.png");
	}*/
	</style>

</head> 
<body> 

<div data-role="page" id="filter">

	<div data-role="header">
	<?php
		require_once('connectvars.php');
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$textbook_id = $_GET["textbook_id"];
		$query4 = "SELECT * FROM textbooks WHERE id = '$textbook_id'";
		$result4 = mysqli_query($dbc, $query4);
		while ($row4 = mysqli_fetch_assoc($result4)) {
			$textbook_name = $row4["title"];
			echo "<h1>Who is buying ".$textbook_name."?</h1>";
		}		
	?>
		<a href="sellerPage.php" id="left-action-btn" data-transition='slide' data-direction='reverse' data-icon="back">Back</a>

	</div><!-- /header -->
	
	<div data-role="content">
		<div class="content-primary">
		<ul data-role="listview" data-theme="d" data-divider-theme="d">
			<?php
				$textbook_id = $_GET["textbook_id"];				
				$query2 = "SELECT * FROM user_trade_objects WHERE buying = 1 AND trade_object_id = '$textbook_id'";
				$result2 = mysqli_query($dbc, $query2);
				while ($row2 = mysqli_fetch_assoc($result2)) {
					$user_id = $row2["user_id"];
					$query3 = "SELECT * FROM users WHERE id = '$user_id'";
					$result3 = mysqli_query($dbc, $query3);
					while ($row3 = mysqli_fetch_assoc($result3)){
						echo "<li><a href='#message' data-rel='popup' data-position-to='window' data-transition='pop'>";
						echo "<h3>".$row3["email"]."</h3>";
						echo "</a></li>";
					}
				}			
			?>
		
<!--		
			<li><a href="#message" data-rel="popup" data-position-to="window" data-transition="pop">				
					<h3>Kobe Bryant</h3>
			</a></li>
			<li><a href="#message" data-rel="popup" data-position-to="window" data-transition="pop">
					<h3>Tom Cruise</h3>
			</a></li>
-->

		</ul>

		<div data-role="popup" id="message" data-theme="d" data-overlay-theme="b" class="ui-content" style="max-width:340px;">
			<label for="textarea-a"><b>Message Person:</b></label>
			<textarea style="margin-bottom:15px;" name="textarea" id="textarea-a">Hi Person, whatup?
			</textarea>
			<a href="buyerPageList.php" style="width: 41%" data-role="button" data-rel="back" data-inline="true" data-mini="true">Cancel</a>	
			<a href="buyerPageList.php" style="width: 41%; float: right;" data-role="button" data-rel="popup" data-theme="b" data-inline="true" data-mini="true" data-transition="pop">Send</a>

		</div><!-- popup message -->

		<!-- <div data-role="popup" id="message-sent" data-theme="d" data-overlay-theme="b" class="ui-content" style="max-width:340px;">
			<h3>Message sent!</h3>
			<a href="buyerPageList.php" data-role="button" data-rel="back" data-inline="true" data-mini="true">Back</a>	
		</div> --><!-- popup message sent -->

		</div><!-- content primary-->
	</div><!-- content -->
		


	<div data-role="footer" data-id="samebar" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" data-grid="b">
		<ul>
			<li><a href="profile.php">Profile</a></li>
			<li><a href="buyerPage.php">Buy</a></li>
			<li><a href="sellerPage.php" class="ui-btn-active ui-state-persist">Sell</a></li>
			<!--<li><a href="messages.php" id="skull" data-icon="custom">Messages</a></li> -->
		</ul>
		</div>
	</div> <!-- footer -->
	

</div><!-- /page -->


</body>
</html>