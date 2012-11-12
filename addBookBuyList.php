<!DOCTYPE html> 
<?php
	$courseid = htmlspecialchars($_GET["courseid"]);
?>

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

<div data-role="page" id="bookList">
<script>

$(document).bind('pageinit', function() {

	$("input[type='checkbox']:checked").each(function() {
		$(this).attr('checked', false);
		$(this).checkboxradio('refresh');
	});

	$('.doneButton').click(function() {
		var checked = [];
			$("input[type='checkbox']:checked").each(function() {
				checked.push($(this).attr('id'));
			});
			var selected = checked.join('-');
			window.location = "buyerPage.php?selected="+selected;
	});
});

</script>

	<div data-role="header">
		<h1>Find Your Books</h1>
		<a href="addBookBuy.php" data-icon="back">Back</a>
		<a class="doneButton" href="#" data-icon="check">Done</a>
	</div><!-- /header -->
		<?php
			echo $_SESSION['userid'];	
		?>

  <form action="confirmationPageAddBuyBook.php" method="post" data-ajax="false">

<div data-role="content">
		<div class="content-primary">	
			<div  data-role="fieldcontain">
			 	<fieldset data-role="controlgroup">
			 		<?php
					include("config.php");
					//all books for a course
					$query = "SELECT * FROM courses WHERE course_id=$courseid";
					$result = mysql_query($query);
					$course = mysql_fetch_assoc($result);
					echo ("<h3 style=\"margin-top: -15px; margin-bottom: 12px;\">".$course[course_number]." books:</h3>");

					// $query_userbooks = "SELECT * FROM user_trade_objects WHERE user_id=userid";
					// $result_userbooks = mysql_query($query_userbooks);
					// while ($userbooks_row = mysql_fetch_assoc($result_userbooks)){
						
					// }

					$query_relation = "SELECT * FROM course_book WHERE course_id=$courseid";
					$result_relation = mysql_query($query_relation);
					while ($row = mysql_fetch_assoc($result_relation)) { //book_id = $row["book_id"]
						$bookid = $row["book_id"];
						$query_books = "SELECT * FROM textbooks WHERE id=$bookid";
						$result_books = mysql_query($query_books);
						
						while($bookrow = mysql_fetch_assoc($result_books)){
							echo ("<input type=\"checkbox\" name=\"".$bookid."\" id=\"".$bookid."\" class=\"custom\" />
								<label for=\"".$bookid."\">".$bookrow["title"]."</label>");
						}

						
					}
					?>
			    </fieldset>
			</div>


	
			</div><!--/content-primary -->		
		</div> <!-- content -->
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