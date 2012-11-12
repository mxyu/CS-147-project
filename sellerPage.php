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
	.price {
		font-size: 22px;
		display: block;
		margin-top: 10px;
		vertical-align: middle;
		margin-right: 10px;
	}
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
	</style>


</head> 
<body> 

<div data-role="page" id="filter">

	<div data-role="header">
		<h1>Sell</h1>
		<a href="addBookSell.php" data-icon="plus">Add</a>



	</div><!-- /header -->
	

	<div data-role="content">
					<div class="content-primary">
						
		<ul data-role="listview" data-theme="d" data-divider-theme="d">
			<li data-role="list-divider">CS147
			<li><a href="buyerPageList.php">
				<table class="seller-info">
					<tr><td>
					<div>
						<h3>Klemmer's Book of Wisdom</h3>
						<p class="description_notes">Notes included</p>
					</div></td><td>
					<div class="price_info">
					<p id="price"><strong>$170 </strong></p>
					<p id="negotiable">negotiable</p>
				</div>
				</td></tr>
				</table>
			</a></li>
			<li><a href="buyerPageList.php">
				<table class="seller-info">
					<tr><td>
					<div>
						<h3>Title of Klemmer's Book</h3>
						<p class="description_notes">Notes included</p>
					</div></td><td>
					<div class="price_info">
					<p id="price"><strong>$200 </strong></p>
					<p id="negotiable">negotiable</p>
				</div>
				</td></tr>
				</table>
			</a></li>
			<li data-role="list-divider">Athletic 101
			<li><a href="buyerPageList.php">
				<table class="seller-info">
					<tr><td>
					<div>
						<h3>Bookie</h3>
						<!-- <p class="description_notes">Notes included</p> -->
					</div></td><td>
					<div class="price_info">
					<p id="price"><strong>$20 </strong></p>
					<p id="negotiable">negotiable</p>
				</div>
				</td></tr>
				</table>
			</a></li>
			<li data-role="list-divider">CS 221
			<li><a href="buyerPageList.php">
				<table class="seller-info">
					<tr><td>
					<div>
						<h3>Book Name</h3>
						<p class="description_notes">Notes included</p>
					</div></td><td>
					<div class="price_info">
					<p id="price"><strong>$70 </strong></p>
					<p id="n-negotiable">take it or leave it</p>
				</div>
				</td></tr>
				</table>
			</a></li>			
		</ul>
		</div>
	



	<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example" data-grid="c">
		<ul>
			<li><a href="profile.php" id="home" data-icon="custom">Profile</a></li>
			<li><a href="buyerPage.php" id="key" data-icon="custom">Buy</a></li>
			<li><a href="sellerPage.php" id="beer" data-icon="custom" class="ui-btn-active">Sell</a></li>
			<li><a href="messages.php" id="skull" data-icon="custom">Messages</a></li>
		</ul>
		</div>
	</div> <!-- footer -->
	

</div><!-- /page -->


</body>
</html>