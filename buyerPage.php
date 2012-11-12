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
	</style>

</head> 
<body> 

<div data-role="page" id="filter">

	<div data-role="header">
		<h1>Reading List</h1>
		<a href="addBookBuy.php" data-icon="plus">Add</a>



	</div><!-- /header -->
	

	<div data-role="content">
					<div class="content-primary">
						
		<ul data-role="listview" data-theme="d" data-divider-theme="d">
			<li data-role="list-divider">CS106B 
			<li><a href="buyerPageList.php">
				
					<div><h3>Course Reader</h3>
					<p>Author</p></div> <!-- <span class="ui-li-count">2</span></li> -->
					<!-- <p class="ui-li-aside"><strong class="price">$36</strong></p> -->
				
			</a></li>
			<li><a href="buyerPageList.php">
					<!-- <img src="http://supost.com/uploads/post/115358a" /> -->
					<h3>Other book</h3>
					<p>Author</p>
					<!-- <p class="ui-li-aside"><strong class="price">$80</strong></p> -->
				
			</a></li>
			<li data-role="list-divider">Class 2 
			<li><a href="buyerPageList.php">
				
					<h3>Other book</h3>
					<p>Author</p>
					<!-- <p class="ui-li-aside"><strong class="price">$50</strong></p> -->
				
			</a></li>
			<li data-role="list-divider">Class 3 
			<li><a href="buyerPageList.php">
				
					<h3>Other book</h3>
					<p>Author</p>
					<!-- <p class="ui-li-aside"><strong class="price">$80</strong></p> -->
				
			</a></li>			<li><a href="buyerPageList.php">
				
					<h3>Other book</h3>
					<p>Author</p>
					<!-- <p class="ui-li-aside"><strong class="price">$80</strong></p> -->
				
			</a></li>			<li><a href="buyerPageList.php">
				
					<h3>Other book</h3>
					<p>Author</p>
					<!-- <p class="ui-li-aside"><strong class="price">$80</strong></p> -->
				
			</a></li>
		</ul>
		</div>
	



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