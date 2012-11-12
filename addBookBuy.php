<!DOCTYPE html> 
<html>

<head>
	<title>Books and Notes App</title> 
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
		<h1>Find Your Books</h1>
		<a href="buyerPage.php" data-icon="back">Back</a>

	</div><!-- /header -->
		<?php
			echo $_SESSION['userid'];
		
		?>

  <form action="confirmationPageAddBuyBook.php" method="post" data-ajax="false">

<div data-role="content">
		<div class="content-primary">	
  			<ul data-role="listview" data-filter="true" data-filter-placeholder="Search Courses...">
  				<?php
				include("config.php");
				//all courses in courses database
				$query = "SELECT * FROM courses ORDER BY course_number ASC";
				$result = mysql_query($query);
				while ($row = mysql_fetch_assoc($result)) {
					echo "<li><a href=addBookBuyList.php?courseid=".$row["course_id"].">".$row["course_number"]."</a></li>";
				}
				?>
			</ul>
	
			</div><!--/content-primary -->		
		</div> <!-- content -->
  	<!-- 
	<p>Select Department:<p>
	<select>
	  <option>CS</option>
	</select>
	
	<p>Select Course Number:<p>
	<select>
	  <option>106B</option>
	</select> -->
	
<!-- 	<label for="books">Select Book:</label>
	<select name="books">
			<?php
			include("config.php");
			//get all books in the textbooks database and list them as an option in the select input (google "select html")
			$query = "SELECT * FROM textbooks";
			$result = mysql_query($query);
			while ($row = mysql_fetch_assoc($result)) {
			
				echo "<option value='".$row["id"]."'>".$row["title"]."</option>";
			
			}
			?>
	</select> 


		<button type="submit"  name="submit" class="btn btn-primary" style="margin-top:10px;">Finish Adding Book</button>	-->	
  </form>

	<div data-role="footer" data-id="samebar" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" data-grid="b">
		<ul>
			<li><a href="profile.php">Profile</a></li>
			<li><a href="buyerPage.php" class="ui-btn-active">Buy</a></li>
			<li><a href="sellerPage.php">Sell</a></li>
			<!--<li><a href="messages.php" id="skull" data-icon="custom">Messages</a></li> -->
		</ul>
		</div>
	</div> <!-- footer -->
	

</div><!-- /page -->


</body>
</html>