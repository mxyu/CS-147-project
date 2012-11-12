<?php

	session_start();
	require_once('connectvars.php');
	
	// If the session vars aren't set, try to set them with a cookie.
	if (!isset($_SESSION['userid'])) {
 	   if (isset($_COOKIE['userid'])) {
			$_SESSION['userid'] = $_COOKIE['userid'];
    	}
	}
		

	if (isset($_POST['submit'])){
		// Connect to the database.
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			
		// Grab the user-entered email address and password.
		$emailaddress = mysqli_real_escape_string($dbc, trim($_POST['emailaddress']));
		$password = mysqli_real_escape_string($dbc, trim($_POST['password']));
			
		if (!empty($emailaddress) && !empty($password)){
			// Look up the email address and password in the database.
			$query = "SELECT id FROM users WHERE email = '".$emailaddress."' AND password = SHA('".$password."')";
			$data1 = mysqli_query($dbc, $query);
			if (mysqli_num_rows($data1) == 1){
				// The login was successful. Set both the user ID and emailaddress session vars (and cookies), and redirect the user to index.php.
				$query = "SELECT id FROM users WHERE email='".$emailaddress."'";
				$data = mysqli_query($dbc, $query);
				$row = mysqli_fetch_array($data);
				$_SESSION['userid'] = $row['id'];
				setcookie ('userid', $_SESSION['userid'], time() + (60 * 60 * 24 * 30));		// Expires in 30 days.
				// Close the database and redirect to index.php.
				mysqli_close($dbc);
				header("Location: profile.php");
			}else{
				mysqli_close($dbc);
				echo('<p>There was a problem. Click <a href="login.php">here</a> to return to the main page.</p>');
			}

		}
		
		else{
			mysqli_close($dbc);
			echo('<p>Have you signed up yet? Click <a href="login.php">here</a> to return to the main page.</p>');
		}
		
	}					
		
	exit();

?>