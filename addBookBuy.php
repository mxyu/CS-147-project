<!DOCTYPE html> 
<html>

<head>
	<title>Bookends</title> 
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="jquery.mobile-1.2.0.css" />
	<link rel="stylesheet" href="style.css" />
	<link rel="apple-touch-icon" href="appicon.png" />
	<link rel="apple-touch-startup-image" href="startup.png">
	
	<script src="//cdn.optimizely.com/js/141321804.js"></script>
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>

</head> 
<body> 

<div data-role="page" id="filter">
	<style>
		.filter-search.ui-listview-filter.ui-input-search.ui-input-clear.ui-btn-corner-all {
			border-radius: 1em;
			height: 20px;
			width: 20px;
		}
		</style>

	<div data-role="header">
		<h1>Find Your Books</h1>
		<a href="buyerPage.php" data-icon="back" id="left-action-btn">Back</a>

	</div><!-- /header -->
		<?php
			echo $_SESSION['userid'];
		
		?>

<div data-role="content">
		<div class="content-primary">	
  			<ul data-role="listview" class="filter-search" data-filter="true" data-filter-placeholder="Search Courses...">
  				<?php
				include("config.php");
				//all courses in courses database
				$query = "SELECT * FROM courses ORDER BY course_number ASC";
				$result = mysql_query($query);
				while ($row = mysql_fetch_assoc($result)) {
					echo "<li><a data-transition='slide' href=addBookBuyList.php?courseid=".$row["course_id"].">".$row["course_number"]."</a></li>";
				}
				?>
			</ul>
			
			</div><!--/content-primary -->		
		</div> <!-- content -->
		
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