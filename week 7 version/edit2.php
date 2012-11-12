<?php

	session_start();
	require_once('connectvars.php');
	
	// If the session vars aren't set, try to set them with a cookie.
	
	if (!isset($_SESSION['userid'])) {
 	   if (isset($_COOKIE['userid'])) {
			$_SESSION['userid'] = $_COOKIE['userid'];
    	}
	}
		

	//if (isset($_POST['submit'])){
		
		// Connect to the database.
		
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			
		// Grab the user-entered data.
		// how do i set the current session email into a variable
		$fullname = mysqli_real_escape_string($dbc, trim($_POST['fullname']));
		$gender = mysqli_real_escape_string($dbc, trim($_POST['gender']));
		$phonenumber = mysqli_real_escape_string($dbc, trim($_POST['phonenumber']));
		$email = $_SESSION['emailaddress'];
		$userid = $_SESSION['userid'];
		
		echo $email;
		
			
		
			$sql = "UPDATE users ".
				   "SET gender = '$gender', phone_number = '$phonenumber', full_name = '$fullname' ".
				   "WHERE id = $userid";
			
			
			mysqli_query($dbc, $sql); 
			
			//$sql2 = "UPDATE users ".
				   //	"SET phone_number = $phonenumber ".
				   //	"WHERE id = userid"; 
		
			
			//$sql3 = "UPDATE users ".
				   	//"SET full_name = $fullname ".
				   	//"WHERE id = userid";  
	
			
//			if (mysqli_num_rows($data1) == 1){
			
//				echo "Updated data successfully\n";
				
				// Close the database and redirect to profile.php.
				
				mysqli_close($dbc);
				
//			}
				header("Location: profile.php");
			
//			else{
//				mysqli_close($dbc);
//				echo('<p> Couldnt Enter information </p>');
//			}

		
			
	//}
	
	exit();

?>
				