<!DOCTYPE html> 
<html>

<head>
	<title>Bookly</title> 
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

<div data-role="page" id="filter">

	<div data-role="header">
		<a href="sellerPage.php" data-icon="delete">Back</a>
		<h1>Add Notes</h1>

	</div><!-- /header -->

  <form action="confirmationPageAddSellItem.php" method="post">

	<p>Select Department:<p>
	<select>
	  <option>CS</option>
	  <option>ECON</option>
	  <option>CME</option>
	</select>
	
	<p>Select Course Number:<p>
	<select>
	  <option>147</option>
	  <option>1A</option>
	  <option>102</option>
	</select>
	
	<p>Type of Notes:<p>
	 <input type = "checkbox" id = "writtenNotes" />
	 <label for = "writtenNotes">Written Notes</label>
	 <input type = "checkbox" id = "typedNotes"  />
	 <label for = "typedNotes">Typed Notes</label>
	 <input type = "checkbox" id = "tests" />
	 <label for = "tests">Old Exams</label>
	 <input type = "checkbox" id = "psets" />
	 <label for = "psets">Old Problem Sets</label>
	 
	 <label for = "notesDescription">Description:</label>
	 <textarea rows="10" cols="10" class="tweetbox" id="notesDescription"></textarea>

	 <label for = "previewImage">Upload Preview:</label>
     <input id="previewImage" type="file" accept="image/*" name="media" class="camera-upload" />
     <span class="w-button-common w-button-bright"><input name="commit" type="submit" value="Finish Adding Notes" /></span>

  </form>

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