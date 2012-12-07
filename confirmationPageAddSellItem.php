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
	
	// Connect to the database.
	require_once('connectvars.php');
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
	// Begin by grabbing the user id, first name, school id, and last name of the user. Stash them away in variables.
	$userid = $_SESSION['userid'];
	$bookid= $_POST['books'];
	$selling=1;
	$price = $_POST['price'];
	$neg = 0;
	if($_POST['neg'] == "neg"){
		$neg = 1;
	}
	$query_check = "SELECT * FROM user_trade_objects WHERE user_id = $userid AND trade_object_id = $bookid AND selling = $selling";
	$result_check = mysqli_query($dbc, $query_check);
	$check = mysqli_fetch_assoc($result_check);
	if($check == NULL){
		$query = "INSERT INTO user_trade_objects(trade_object_id, user_id, selling, negotiable, price) VALUES('$bookid', '$userid', '$selling', '$neg', '$price')";
		// Make a query, add the textbook.
		mysqli_query($dbc, $query);
		mysqli_close($dbc);
		header("Location: sellerPage.php");
		
	}
	else{
		echo("<script>
		alert('You are already selling this book.');
		</script>
		");
	}

	

?>

<div data-role="page" id="page1">
    <div data-theme="a" data-role="header">
    </div>
    <div data-role="content">
        <a data-role="button" data-theme="e" href="sellerPage.php"
        data-icon="check" data-iconpos="left">
            Return to Sell Page
        </a>
		
    </div>
</div>


</body>
</html>
-->