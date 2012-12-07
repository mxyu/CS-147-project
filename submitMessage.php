
		
		<div class="orderarea">
		<?php
		
			include("config.php");
			function sendmail($email, $name, $textbook_name, $message)
			{
			    
			    $to      = $email;
			    $subject = 'Inquiry about your ';
			    $headers = 'From: CS 147 Bookly <kchiu20@gmail.com>' . "\r\n" .
			    'MIME-Version: 1.0' . "\r\n" .
			    'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
			    'Reply-To: Maya Book Service <mayabooks@mayabooks.com>' . "\r\n" .
			    'X-Mailer: PHP/' . phpversion();
			    
			    mail($to, $subject, $message, $headers);
			    
			}
			
			// Take in parameters
			$sender_name = $_POST["sender_name"];
			$email = $_POST["receiver_email"];
			$textbook_name = $_POST["textbook_name"];			
			$message = $_POST["message"];
			$t = time();
			
			// Insert into orders
			// but oops query is not defined... yet
			
			$query = "INSERT INTO orders VALUES ('".$name."', '".$email."','".$t."','".$book."')";
			
			$result = mysql_query($query);
			
			if ($result) {
				// What do the following lines do? Answer -> #1
				$query2 = "SELECT * from books where asin = '".$book."'";
				$result2 = mysql_query($query2);
				$row2 = mysql_fetch_assoc($result2);
				sendmail($email, $name, $row2["title"]);
				echo "<p>Email has been sent to $receiver_name.</p>";
					
			}
			
			
			?>
		</div>
