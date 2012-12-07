<?php
	include("config.php");
	$course_id = $_GET["course_id"];

	echo "<label for='books'>Select Book:</label><br>";
	echo "<select name='books' data-mini='true' >";
	echo "<option>Select Your Book </option>";
	$query = "SELECT * FROM course_book WHERE course_id = $course_id";
	$result = mysql_query($query);
	while ($row = mysql_fetch_assoc($result)) {
		$textbook_id = $row["book_id"];
		$query2 = "SELECT * FROM textbooks WHERE id = $textbook_id";
		$result2 = mysql_query($query2);
		while ($row2 = mysql_fetch_assoc($result2)) {			
			echo "<option value='".$row2["id"]."'>".$row2["author"]." - ".$row2["title"]."</option>";
		
		}			
	}
	echo "</select><hr>";
?>