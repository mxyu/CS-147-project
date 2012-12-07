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
		<title>Bookends</title>
		<link rel="apple-touch-icon" href="appicon.png" />
		<link rel="apple-touch-startup-image" href="startup.png">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="viewport" content="width=device-width, user-scalable=no" />
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="chosen/chosen.css" />
		<script src="chosen/chosen.jquery.js" type="text/javascript"></script>

	</head>

	<body>


			<?php
				require_once('connectvars.php');
				$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
				$textbook_name = $_GET["textbook_name"];
				$receiver_id = $_GET["receiver_id"];
				$sender_name = $_GET["sender_name"];
				$buysell = $_GET["buysell"];
				$receiver_name = "";
				$receiver_email = "";
				$query3 = "SELECT * FROM users WHERE id = '$receiver_id'";
				$result3 = mysqli_query($dbc, $query3);
				while ($row3 = mysqli_fetch_assoc($result3)){
					$receiver_name = $row3["name"];
					$receiver_email = $row3["email"];
				}

			?>
			
			<div id="result"></div>
			
			<form action="submitMessage.php" id="someform" method="post">
				<?php
					echo "<label for='textarea-a'><b>Message ".$receiver_name.":</b></label>";				
				?>
				<textarea style="margin-bottom:15px;" name="message" id="textarea-a">
				<?php
					if(buysell == "buy"){
						echo "Hi $receiver_name, are you still buying $textbook_name?";									
					}else{
						echo "Hi $receiver_name, are you still selling $textbook_name?";
					}
				?>
				</textarea>
				<a href="buyerPageList.php" style="width: 41%" data-role="button" data-rel="back" data-inline="true" data-mini="true">Cancel</a>	
			

				<?php
					echo "<input type='hidden' name='receiver_email' value=".$receiver_email.">";
					echo "<input type='hidden' name='sender_name' value=".$sender_name.">";
					echo "<input type='hidden' name='textbook_name' value=".$textbook_name.">";
				?>
			
				<input type="submit" class="medium red awesome" value="Order &raquo;" />
			
		</form>
		
			

		  <script type="text/javascript">
		  $(".chzn-select").chosen();
		  </script> 
		  <script type="text/javascript">
				$("a").click(function (event) {
					event.preventDefault();
					window.location = $(this).attr("href");
				});
				$("#someform").submit(function(){
					event.preventDefault();
					$.post("submit.php", $("#someform").serialize(), function(data){
						$("#result").html(data);
					});
				});
		  </script>
 
	</body>
</html>