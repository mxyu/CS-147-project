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

<!DOCTYPE> 
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
	<style>
	.price {
		font-size: 22px;
		display: block;
		margin-top: 10px;
		vertical-align: middle;
		margin-right: 10px;
	}
	</style>

</head> 
<body> 

<div data-role="page" id="filter">

	<div data-role="header">
		<h1>Buy</h1>
		<a href="addBookBuy.php" data-icon="plus">Add</a>



	</div><!-- /header -->
	

	<div data-role="content">
		<div class="content-primary">
						
		<ul data-role="listview" data-theme="d" data-divider-theme="d">
			<?php
			require_once('connectvars.php');

			$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

			$userid = $_SESSION['userid'];
			//find all the books that the user is looking to buy by using the userid stored in the session
			$query = "SELECT * FROM user_trade_objects WHERE buying = 1 AND user_id = '$userid'";
			$result = mysqli_query($dbc, $query);

			//now we need to loop through each book and find all the matching sellers for each book			
			while ($row = mysqli_fetch_assoc($result)) {
				$textbook_id = $row["trade_object_id"] ;
			//find the book that matches the textbook(trade_object) id to print the name of the book
			//while loop shouldn't be necessary here since there should only be 1 result (textbook ids are unique)
				$query4 = "SELECT * FROM textbooks WHERE id = '$textbook_id'";
				$result4 = mysqli_query($dbc, $query4);
				while ($row4 = mysqli_fetch_assoc($result4)) {
					$textbook_name = $row4["title"];
					$author = $row4["author"];
					echo "<li><a href='buyerPageList.php?textbook_id=";
					echo $textbook_id;
					echo "'>";
					echo "<h3>".$textbook_name."</h3>";
					echo "<p>".$author."</p>";
					echo "</a></li>";
				}

			}
		?>
		
		
<!--			<li data-role="list-divider">CS106B </li>
			<li><a href="buyerPageList.php">
				
					<div><h3>Course Reader</h3>
					<p>Author</p></div> 
				
			</a></li>
			<li><a href="buyerPageList.php">
					
					<h3>Other book</h3>
					<p>Author</p>
					
				
			</a></li>
-->
		</ul>
		</div><!-- content-primary -->
	</div><!-- content -->



	<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example" data-grid="b">
			<ul>
				<li><a href="profile.php" id="home" data-icon="custom">Profile</a></li>
				<li><a href="buyerPage.php" id="key" data-icon="custom" class="ui-btn-active">Buy</a></li>
				<li><a href="sellerPage.php" id="beer" data-icon="custom">Sell</a></li>
<!--				<li><a href="messages.php" id="skull" data-icon="custom">Messages</a></li>-->
			</ul>
		</div>
	</div> <!-- footer -->
	

</div><!-- /page -->


</body>
</html>