<!DOCTYPE php> 
<html>

<head>
	<title>Books and Notes App</title> 
	<meta charset="utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
 	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="jquery.mobile-1.2.0.css" />
	<link rel="stylesheet" href="style.css" />
	<link rel="apple-touch-icon" href="appicon.png" />
	<link rel="apple-touch-startup-image" href="startup.png">
	
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>
	<style>
	#price {
		font-size: 25px;
		text-align: right;
		padding-top: 20px;
		color: #2E2E2E;
	}
	#negotiable {
		font-size: 12px;
		text-align: right;
		margin-top: -15px;
		color: green;
	}

	#n-negotiable {
		font-size: 12px;
		text-align: right;
		margin-top: -15px;
		color: black;
	}

	.description_notes{

	}

	.seller-info {
		width:100%;
	}

/*	.ui-icon-message {
		background-image: url("08-chat.png");
	}*/
	</style>

</head> 
<body> 

<div data-role="page" id="filter">

	<div data-role="header">
		<h1>Who has "Current Book?"</h1>
		<a href="buyerPage.php" data-icon="back">Back</a>

	</div><!-- /header -->
	
	<div data-role="content">
		<div class="content-primary">

		<ul data-role="listview" data-icon="false" data-theme="d" data-divider-theme="d">
			
			<li><a href="#message" data-rel="popup" data-position-to="window" data-transition="pop">
				<table class="seller-info">
					<tr><td>
					<div>
						<h3>John Appleseed</h3>
						<p class="description_notes">Like new, notes included</p>
					</div></td><td>
					<div class="price_info">
					<p id="price"><strong>$20 </strong></p>
					<p id="negotiable">negotiable</p>
				</div>
				</td></tr>
				</table>
			</li>
				
			</a></li>
			<li><a href="#message" data-rel="popup" data-position-to="window" data-transition="pop">
				<table class="seller-info">
					<tr><td>
					<div>
						<h3>Nextdoor Neighbor</h3>
						<!-- <p class="description_notes">Notes included</p> -->
					</div></td><td>
					<div class="price_info">
					<p id="price"><strong>$50 </strong></p>
					<p id="n-negotiable">Take it or leave it</p>
				</div>
				</td></tr>
				</table>
			</a></li>
			<li><a href="#message" data-rel="popup" data-position-to="window" data-transition="pop">
				<table class="seller-info">
					<tr><td>
					<div>
						<h3>Predatory RA</h3>
						<!-- <p class="description_notes">Notes included</p> -->
					</div></td><td>
					<div class="price_info">
					<p id="price"><strong>$64 </strong></p>
					<p id="negotiable">negotiable</p>
				</div>
				</td></tr>
				</table>
			</a></li>

		</ul>
		<div data-role="popup" id="message" data-theme="d" data-overlay-theme="b" class="ui-content" style="max-width:340px;">
			<label for="textarea-a">Message Person#:</label>
			<textarea name="textarea" id="textarea-a">Hi Person#, I'm interested in purchasing Current Book from you!
			</textarea>
			<a href="buyerPageList.php" data-role="button" data-rel="popup" data-theme="b" data-icon="check" data-inline="true" data-mini="true" data-transition="pop">Send</a>
			<a href="buyerPageList.php" data-role="button" data-rel="back" data-inline="true" data-mini="true">Cancel</a>	
		</div><!-- popup message -->

		<!-- <div data-role="popup" id="message-sent" data-theme="d" data-overlay-theme="b" class="ui-content" style="max-width:340px;">
			<h3>Message sent!</h3>
			<a href="buyerPageList.php" data-role="button" data-rel="back" data-inline="true" data-mini="true">Back</a>	
		</div> --><!-- popup message sent -->

		</div><!-- content primary-->
	</div><!-- content -->
		


	<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example" data-grid="c">
		<ul>
			<li><a href="profile.php" id="home" data-icon="custom">Profile</a></li>
			<li><a href="buyerPage.php" id="key" data-icon="custom" class="ui-btn-active">Buy</a></li>
			<li><a href="sellerPage.php" id="beer" data-icon="custom">Sell</a></li>
			<li><a href="messages.php" id="skull" data-icon="custom">Messages</a></li>
		</ul>
		</div>
	</div> <!-- footer -->
	

</div><!-- /page -->


</body>
</html>