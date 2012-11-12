<?php

	session_start();
	
	// If the session vars aren't set, try to set them with a cookie.
	if (!isset($_SESSION['userid'])) {
	if (isset($_COOKIE['userid'])) {
	$_SESSION['userid'] = $_COOKIE['userid'];
	}
	}
	
	if (!isset($_SESSION['userid'])) {
	header("Location: index.html");
	exit();
	}
	
	// Connect to the database.
	require_once('connectvars.php');
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
	// Begin by grabbing the user id, first name, school id, and last name of the user. Stash them away in variables.
	$userid = $_SESSION['userid'];
	$bookid= $_POST['books'];
	$buying=1;
	$query = "INSERT INTO user_trade_objects(trade_object_id, user_id, buying) VALUES('$bookid', '$userid', '$buying')";
	echo $query;
	// Make a query, add the textbook.
	mysqli_query($dbc, $query);
	
	
	mysqli_close($dbc);
	//redirect to the page you want to go after adding the book (in this case it was home.php)
	header("Location: buyerPage.php"); 

?>

<!--
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

<div data-role="page" id="page1">
    <div data-theme="a" data-role="header">
        <h3>
            Add Complete
        </h3>
    </div>
    <div data-role="content">
        <a data-role="button" data-theme="e" href="buyerPage.php"
        data-icon="check" data-iconpos="left">
            Return to Buy Page
        </a>
    </div>
</div>


</body>
</html>
-->