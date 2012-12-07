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
	<title>Bookly</title> 
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
		<a href="sellerPage.php" data-icon="back" id="left-action-btn">Back</a>
		<h1>Add Book To Sell</h1>

	</div><!-- /header -->
<div data-role="content">
  <form action="confirmationPageAddSellItem.php" method="post" data-ajax="false">

	Select Department:
	<select data-mini="true">
	  <option>CS</option>
	  <option>ECON</option>
	  <option>CME</option>
	</select><hr>
	
	Select Course Number:
	<select data-mini="true">
	  <option>147</option>
	  <option>1A</option>
	  <option>102</option>
	</select><hr>
	
	<label for="books">Select Book:</label>
		<select name="books" data-mini="true">
		<?php
		include("config.php");
		$query = "SELECT * FROM textbooks";
		$result = mysql_query($query);
		while ($row = mysql_fetch_assoc($result)) {
			echo "<option value='".$row["id"]."'>".$row["author"]." - ".$row["title"]."</option>";
		
		}
		?>
	</select><hr>

	<label for = "price">Price:</label>
	<input name="price" id="amount" data-mini="true"/>
  	<label><input option value="neg" type="checkbox" name="neg" data-mini="true" /> Price is negotiable </label>
	<hr>


    <span class="w-button-common w-button-bright"><input name="commit" type="submit" value="Finish Adding Book" /></span>

  </form>
  
  </div>
  
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