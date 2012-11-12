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
		<a href="addBookBuy.php" data-icon="plus">Add to list</a>



	</div><!-- /header -->
	

	<div data-role="content">
<?php
	$selected = htmlspecialchars($_GET["selected"]);
	if ($selected) {
		$addedbooks = explode("-", $selected);
	}


?>

		<div class="content-primary">
						
		<ul data-role="listview" data-theme="d" data-divider-theme="d">
			<?php
			require_once('connectvars.php');

			$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

			$userid = $_SESSION['userid'];
			$buying = 1;
			//put new books into buy, if any
			if($selected){
				foreach($addedbooks as $i => $value) {
					$checkQuery = "SELECT * FROM user_trade_objects WHERE user_id = $userid AND trade_object_id = $value AND buying = $buying";
					$check = mysqli_query($dbc, $checkQuery);
					if (!mysqli_fetch_assoc($check)) {
						$query = "INSERT INTO user_trade_objects (trade_object_id, user_id, buying)  VALUES ( ".$value.", ".$userid.", 1)";
						mysqli_query($dbc, $query);
					}
				}
			}

			//find all the books that the user is looking to buy by using the userid stored in the session
			$query = "SELECT * FROM user_trade_objects WHERE buying = 1 AND user_id = '$userid'";
			$result = mysqli_query($dbc, $query);

			$coursemap = array();

			//now we need to loop through each book and find all the matching sellers for each book			
			while ($row = mysqli_fetch_assoc($result)) {
				$textbook_id = $row["trade_object_id"] ;
				//map textbooks to course
				$query_courses = "SELECT * FROM course_book WHERE book_id = $textbook_id";
				$result_courses = mysqli_query($dbc, $query_courses);
				while ($courserow = mysqli_fetch_assoc($result_courses)) {
					$key = $courserow["course_id"];
					if (array_key_exists($key, $coursemap)) {
						$arr = $coursemap[$key];
						array_push($arr, $textbook_id);
						$coursemap[$key] = $arr;
					} else {
						$newArray = array($key => $textbook_id);
						$coursemap[$key] = $newArray;
					}
				}
			}


			foreach ($coursemap as $courseid => $textbookArr) {
				$query_cname = "SELECT * FROM courses WHERE course_id = $courseid";
				$result_cname = mysqli_query($dbc, $query_cname);
				while ($row = mysqli_fetch_assoc($result_cname)){
					echo("<li data-role=\"list-divider\">".$row["course_number"]."</li>");
				}
				foreach ($textbookArr as $i => $textbook_id) {
					$query_bname = "SELECT * FROM textbooks WHERE id = $textbook_id";
					$result_bname = mysqli_query($dbc, $query_bname);
					while ($row = mysqli_fetch_assoc($result_bname)){
						echo("<li><a href=\"buyerPageList.php?textbook_id=".$textbook_id."\"><h3>".$row["title"]."</h3><p>".$row["author"]."</p></a></li>");
					}
				}
			}



			//find the book that matches the textbook(trade_object) id to print the name of the book
			//while loop shouldn't be necessary here since there should only be 1 result (textbook ids are unique)

		?>
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