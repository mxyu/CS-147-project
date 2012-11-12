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
		<?php
			require_once('connectvars.php');
			$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			$textbook_id = $_GET["textbook_id"];
			$query4 = "SELECT * FROM textbooks WHERE id = '$textbook_id'";
			$result4 = mysqli_query($dbc, $query4);
			while ($row4 = mysqli_fetch_assoc($result4)) {
				$textbook_name = $row4["title"];
				echo "<h1>Who is selling ".$textbook_name."?</h1>";
			}		
		?>
		<a href="buyerPage.php" data-icon="back">Back</a>

	</div><!-- /header -->
	
	<div data-role="content">
		<div class="content-primary">

		<ul data-role="listview" data-icon="false" data-theme="d" data-divider-theme="d">
			
			<?php
				$textbook_id = $_GET["textbook_id"];				
				$query2 = "SELECT * FROM user_trade_objects WHERE selling = 1 AND trade_object_id = '$textbook_id'";
				$result2 = mysqli_query($dbc, $query2);
				while ($row2 = mysqli_fetch_assoc($result2)) {
					echo "<li><a href='#message' data-rel='popup' data-position-to='window' data-transition='pop'>";
					$user_id = $row2["user_id"];
					$price = $row2["price"];
					$negotiable = $row2["negotiable"];
					$query3 = "SELECT * FROM users WHERE id = '$user_id'";
					$result3 = mysqli_query($dbc, $query3);
					while ($row3 = mysqli_fetch_assoc($result3)){
						echo "<h3>".$row3["email"]."</h3>";
					}
					echo "<p class=\"ui-li-aside ui-li-desc\"><strong style=\"margin-top:8px; font-size:22px;\">$".$price."</strong>";
					if($negotiable == 1){
						echo "<br><span style='font-size:12px'>negotiable</span></p>";
					}else{
						echo "<br><span style='font-size:12px'>non-negotiable</span></p>";				
					}
					echo "</a></li>";
				}			
			?>

<!--			
			<li><a href="#message" data-rel="popup" data-position-to="window" data-transition="pop">
				<table class="seller-info">
					<tr><td><div>
						<h3>John Appleseed</h3>
						<p class="description_notes">Like new, notes included</p>
					</div></td><td><div class="price_info">
						<p id="price"><strong>$20 </strong></p>
						<p id="negotiable">negotiable</p>
					</div></td></tr>
				</table>
			</li>
-->			


		</ul>
		<div data-role="popup" id="message" data-theme="d" data-overlay-theme="b" class="ui-content" style="max-width:340px;">
			<label for="textarea-a">Message Person#:</label>
			<?php
				echo "";
			?>
			<textarea name="textarea" id="textarea-a">Hi Person#, I'm interested in purchasing Current Book from you!
			</textarea>
			<a href="buyerPageList.php" data-role="button" data-rel="popup" data-theme="b" data-icon="check" data-inline="true" data-mini="true" data-transition="pop">Send</a>
			<a href="buyerPageList.php" data-role="button" data-rel="back" data-inline="true" data-mini="true">Cancel</a>	
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
			<li><a href="buyerPage.php" class="ui-btn-active ui-state-persist">Buy</a></li>
			<li><a href="sellerPage.php">Sell</a></li>
			<!--<li><a href="messages.php" id="skull" data-icon="custom">Messages</a></li> -->
		</ul>
		</div>
	</div> <!-- footer -->
	

</div><!-- /page -->


</body>
</html>