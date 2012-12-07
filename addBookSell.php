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
	<title>Booklends</title> 
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


<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36683607-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head> 
<body> 

<div data-role="page" id="filter">
	<div data-role="header">
		<a href="sellerPage.php" data-icon="back" id="left-action-btn">Back</a>
		<h1>Sell Book</h1>

	</div><!-- /header -->



<div data-role="content">
  <form action="confirmationPageAddSellItem.php" method="post" data-ajax="false">

	Select Course:
	<select id="course-list" name="courses" data-mini="true">
		<option>Select Your Course </option>
		<?php
		include("config.php");
		$query = "SELECT * FROM courses";
		$result = mysql_query($query);
		while ($row = mysql_fetch_assoc($result)) {
			echo "<option value='".$row["course_id"]."'>".$row["course_number"]." - ".$row["course_name"]."</option>";
		
		}
		?>
	</select><hr>

	<div id="select-books">
	</div>

	<div style="visibility:hidden" id="price">
		<label for = "price">Price:</label>
		<input name="price" id="amount" data-mini="true" value="0" />
	  	<label><input option value="neg" type="checkbox" name="neg" data-mini="true" /> Price is negotiable </label>
		<hr>
	    <span class="w-button-common w-button-bright"><input name="commit" type="submit" value="Finish Adding Book" /></span>
	</div>
  </form>
  
<script>
	$("#course-list").change(function(){
		var course_id = $(this).val();
		var post_url = "filter.php?course_id=" + course_id;
		$.post(post_url, function(data){
			$("#select-books").html(data);
		})

	})
	$("#select-books").change(function(){
		document.getElementById('price').style.visibility='visible';
	})

	// $("#price").change(function(){
	// 	document.getElementById('submit-button').style.visibility='visible';
	// })

</script> 


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