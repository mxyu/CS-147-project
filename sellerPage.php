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
		<h1>Sell</h1>
		<a href="addBookSell.php" class="ui-btn-right">Edit</a>



	</div><!-- /header -->
	

	<div data-role="content">
		<div class="content-primary">	
		<a href="addBookSell.php" data-role="button" style="margin-top:-5px;  margin-bottom:25px;">Add books</a>													
			<!-- <ul data-role="listview" data-theme="d" data-divider-theme="d">
			
				<?php
					require_once('connectvars.php');		
					$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);		
					//same as above, except just switch all the "buying" with "selling" and vice versa
					$userid = $_SESSION['userid'];
					$query = "SELECT * FROM user_trade_objects WHERE selling = 1 AND user_id = '$userid'";
					$result = mysqli_query($dbc, $query);
					while ($row = mysqli_fetch_assoc($result)) {
						$textbook_id = $row["trade_object_id"];
						$price = $row["price"];
						$negotiable = $row["negotiable"];
						$query4 = "SELECT * FROM textbooks WHERE id = '$textbook_id'";
						$result4 = mysqli_query($dbc, $query4);
						while ($row4 = mysqli_fetch_assoc($result4)) {
							$textbook_name = $row4["title"];
							$author = $row4["author"];
							$id = $row4["id"];
							echo "<li><a href='sellerPageList.php?textbook_id=";
							echo $id;
							echo "'>";
							echo "<h3>".$textbook_name." by ".$author."</h3>";
							echo "<p class=\"ui-li-aside ui-li-desc\"><strong style=\"margin-top:8px; font-size:22px;\">$".$price."</strong>";
							if($negotiable == 1){
								echo "<br><span style='font-size:12px'>negotiable</span></p>";
							} else {
								echo "<br><span style='font-size:12px'>non-negotiable</span></p>";				
							}
							echo "</a></li>";
						}
		
					} 
				?> -->

			<ul data-role="listview" data-theme="d" data-divider-theme="d">
				<?php
				require_once('connectvars.php');

				$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

				$userid = $_SESSION['userid'];

				//find all the books that the user is looking to sell by using the userid stored in the session
				$query = "SELECT * FROM user_trade_objects WHERE selling = 1 AND user_id = '$userid'";
				$result = mysqli_query($dbc, $query);
				$empty = 1;

				$coursemap = array();

				//now we need to loop through each book and find all the matching sellers for each book			
				while ($row = mysqli_fetch_assoc($result)) {
					$textbook_id = $row["trade_object_id"] ;
					$empty = 0;
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
							echo("<li><a href=\"sellerPageList.php?textbook_id=".$textbook_id."\"><h3>".$row["title"]."</h3><p>".$row["author"]."</p>");
							
							
							$pquery = "SELECT * FROM user_trade_objects WHERE selling = 1 AND user_id = '$userid' AND trade_object_id = $textbook_id";
							$presult = mysqli_query($dbc, $pquery);
							while($row = mysqli_fetch_assoc($presult)) {
								$price = $row["price"];
								$negotiable = $row["negotiable"];
								echo "<p class=\"ui-li-aside ui-li-desc\"><strong style=\"margin-top:8px; font-size:22px;\">$".$price."</strong>";
								if($negotiable == 1){
									echo "<br><span style='font-size:12px'>negotiable</span></p>";
								} else {
									echo "<br><span style='font-size:12px'>non-negotiable</span></p>";				
								}
								echo "</a></li>";
							}
						}
					}
				}			
				
			?>	

			</ul>
		</div> <!-- content primary -->
	</div> <!-- content -->



	<div data-role="footer" data-id="samebar" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" data-grid="b">
		<ul>
			<li><a href="profile.php">Profile</a></li>
			<li><a href="buyerPage.php">Buy</a></li>
			<li><a href="sellerPage.php" class="ui-btn-active">Sell</a></li>
			<!--<li><a href="messages.php" id="skull" data-icon="custom">Messages</a></li> -->
		</ul>
		</div>
	</div> <!-- footer -->
	

</div><!-- /page -->


</body>
</html>