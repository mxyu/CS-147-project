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
  
	if (isset($_SESSION['userid'])) {
  
    	// Delete all session vars by clearing the $_SESSION array.
    	$_SESSION = array();

    	// Delete the session cookie by setting its expiration to an hour ago (3600).
    	if (isset($_COOKIE[session_name()])) {
      		setcookie(session_name(), '', time() - 3600);
    	}

    	// Destroy the session.
		session_destroy();
    
    }

  	// Delete the user ID and username cookies by setting their expirations to an hour ago (3600).
  	setcookie('userid', '', time() - 3600);

  	// Redirect to the login page.
  	header('Location: login.php');
  
?>
