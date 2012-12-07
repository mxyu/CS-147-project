<?php
	
	require_once('connectvars.php');
	session_start();
	
	// If the session vars aren't set, try to set them with a cookie.
	if (!isset($_SESSION['userid'])) {
 	   if (isset($_COOKIE['userid'])) {
			$_SESSION['userid'] = $_COOKIE['userid'];
    	}
	}
		
	if (isset($_POST['submit'])){

		// Connect to the database.
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
		// Grab the submitted data from the POST.
		$emailaddress = mysqli_real_escape_string($dbc, trim($_POST['emailaddress']));
		$password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));		
		$password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));	
	
		if (!empty($emailaddress) && !empty($password1) && !empty($password2) && ($password1==$password2)){
		
			// Ensure that this email address hasn't already been registered.
			$query = "SELECT * FROM users WHERE email = '$emailaddress'";
			$existing = mysqli_query($dbc, $query);
			// If the number of existing rows matching the new input is zero, we now know the email is unique.
			if (mysqli_num_rows($existing) == 0){
			
				// Now we can insert the data into the database, creating a new row (and leaving the other values NULL for now).
				$query = "INSERT INTO users (email, password) VALUES ('".$emailaddress."', SHA('".$password1."'))";
				
				mysqli_query($dbc, $query);
				
				// Next, store the user's ID into a session variable and cookie.
				$query = "SELECT id FROM users WHERE email='".$emailaddress."'";
				$data = mysqli_query($dbc, $query);
				$row = mysqli_fetch_array($data);
				$_SESSION['userid'] = $row['id'];
				setcookie ('userid', $_SESSION['userid'], time() + (60 * 60 * 24 * 30));		// Expires in 30 days.
				// Close the database and redirect to index.php.
				mysqli_close($dbc);
				header("Location: help.php");
				
			}
			
			else{
				mysqli_close($dbc);
				echo('<p>This email address has already been registered. Click <a href="index.html">here</a> to return to the main page.</p>');
			}

		}
		
		else{
			mysqli_close($dbc);
			echo('<p>There was a problem. Click <a href="index.html">here</a> to return to the main page.</p>');
		}
	
	}
	
	exit();
		
?>