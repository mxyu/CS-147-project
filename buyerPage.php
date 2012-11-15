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
?>



<!DOCTYPE> 
<html>

<head>
	<title>Bookly</title> 
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


</head> 
<body> 

<div data-role="page" id="buyerpage">
	
	<style>
	.price {
		font-size: 22px;
		display: block;
		margin-top: 10px;
		vertical-align: middle;
		margin-right: 10px;
	}
	.cbox.ui-btn-corner-all, .cbox-on.ui-btn-corner-all {
		border-radius: 1em;
		height: 20px;
		width: 20px;
	}	
	
	.ui-btn-icon-notext .ui-btn-inner .ui-icon {
		margin: 1px 0px 0px 2px;
		height: 16px;
		float: left;
		width: 16px;
	}
	
	.ui-icon.ui-icon-check.ui-icon-shadow {
		background-color: #A82226;
	}
	
	.ui-btn-inner {
		border-color: transparent;
	}
	</style>

	<div data-role="header">
		<h1>Buy</h1>
		<a href="#" class="edit-btn ui-btn-right" id="edit-btn">Edit</a>
			
	</div><!-- /header -->
	
	<script>
	    var removeBuy = function() {
         var selected = [];
         $(".y-selected").each(function() {
           selected.push($(this).attr('id'));
         });
         var remove = selected.join('-');
         window.location = "buyerPage.php?remove="+remove;
         return false;
			};
	
			$("#buyerpage").live('pageinit', function() {
			  
				$(".cbox-on").hide();
				$(".edit-commands").hide();
				$(".cbox").each(function() {
					$(this).css('opacity', 0);
				});
				
				var entryDefault = {
					'position': 'relative',
					'top': '0px',
					'marginLeft': '0px'
			    };
				
				$('.entry').each(function() {
					$(this).css(entryDefault);
				});
				var editing = false;
				var restoreDefaults = function(){
					editing = false;	
					$(".edit-commands").hide();
					$(".edit-commands-off").show();	
					$('#edit-btn .ui-btn-text').fadeOut(50, function() {
						$('#edit-btn .ui-btn-text').text('Edit').fadeIn(50);												
					});						
					$('.entry').each(function() {
						$(this).animate({
							marginLeft: '0px'
						}, 250);
					});
					$('.cbox').each(function() {
						$(this).animate({
							left: '-20px',
							opacity: 0
						}, 250, function(){
							$(this).css('left', '-20px').show();
						});
					});
					$('.cbox-on').each(function() {
						$(this).animate({
							left: '-20px',
							opacity: 0
						}, 250, function(){
							$(this).css('left', '8px').hide().css('opacity','1');
							
						});
					});
					$(".ui-btn-inner.ui-li").css("background-color", "transparent");
				};
				
				restoreDefaults();
				
				$(".edit-btn").click(function(){
					if(!editing) {
					  					  
						editing = true;	
						$(".edit-commands").show();
						$(".edit-commands-off").hide();
						$('.edit-btn .ui-btn-text').fadeOut(50, function() {
							$('.edit-btn .ui-btn-text').text('Cancel').fadeIn(50);												
						});						
						$('.entry').each(function() {
							$(this).animate({
								marginLeft: '30px'
							}, 250);
						});
						$('.cbox').each(function() {
							$(this).animate({
								left: '8px',
								opacity: 1
							}, 250);
						});	
						
					} else {
						restoreDefaults();					  
					}
				});
								
				//button appearance changes
				$("#buyList a").click(function(event){
					if (editing) {
						event.preventDefault();
						event.stopImmediatePropagation();
						$(this).prev().prev().toggle();
						$(this).prev().toggle();	
						if ($(this).parent().parent().css("background-color") == 'rgb(231, 222, 222)') {
							$(this).parent().parent().css("background-color", "transparent");
							$(this).removeClass("y-selected");
						} else {
							$(this).parent().parent().css("background-color", "#e7dede");
							$(this).addClass("y-selected");
						}
					}
				});
				
				$(".cbox").click(function(event){
					$(this).hide();
					$(this).next().show();
					if ($(this).parent().parent().css("background-color") == 'rgb(231, 222, 222)') {
						$(this).parent().parent().css("background-color", "transparent");
						$(this).next().next().removeClass("y-selected");
					} else {
						$(this).parent().parent().css("background-color", "#e7dede");
						$(this).next().next().addClass("y-selected");
					}
				});
				
				$(".cbox-on").click(function(event){
					$(this).hide();
					$(this).prev().show();
					if ($(this).parent().parent().css("background-color") == 'rgb(231, 222, 222)') {
						$(this).parent().parent().css("background-color", "transparent");
						$(this).next().removeClass("y-selected");
					} else {
						$(this).parent().parent().css("background-color", "#e7dede");
						$(this).next().addClass("y-selected");
					}
				});
				
				//click Mark bought
				$(".b-mark.btn").button("disable");
				// $(".b-mark-btn").click(function(event){				  
				// 					$('#bboughtConfirm').popup("open");
				// 				});
				// 				$("#confirm-bought").click(function(event){
				// 					var selected = [];
				// 					$(".y-selected").each(function() {
				// 						selected.push($(this).attr('id'));
				// 					});
				// 					var mark = selected.join('-');
				// 					window.location = "buyerPage.php?mark="+mark;
				// 					return false;
				// 				});
				
			});
			
	</script>
	

	<div data-role="content">
<?php
	$selected = htmlspecialchars($_GET["selected"]);
	if ($selected) {
		$addedbooks = explode("-", $selected);
	}
	
	$remove = htmlspecialchars($_GET["remove"]);
	if ($remove) {
		$removebooks = explode("-", $remove);
	}
	
	$mark = htmlspecialchars($_GET["mark"]);
	if ($mark) {
		$markbooks = explode("-", $mark);
	}

?>
		<div class="content-primary">

		<a class="edit-commands-off" href="addBookBuy.php" data-role="button" style="margin-top:-5px;  margin-bottom:25px;">Find and add books</a>
		<center><div class="edit-commands">
			<a href="#" class="b-mark-btn" data-role="button" data-inline="true" style="margin-top:-5px;  margin-bottom:25px;">Mark bought</a>
			<a href="#b-pop" data-transition="pop" data-rel="popup" class="b-rmv-btn" data-role="button" data-inline="true" style="margin-top:-5px;  margin-bottom:25px;">Remove</a>
		</div></center>
		<ul id="buyList" data-role="listview" data-theme="d" data-divider-theme="d">
			<?php
			require_once('connectvars.php');

			$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

			$userid = $_SESSION['userid'];
			$buying = 1;
			//put new books into buy, if any
			if($selected){
				foreach($addedbooks as $i => $value) {
					$checkQuery = "SELECT * FROM user_trade_objects WHERE user_id = $userid AND trade_object_id = $value AND buying = $buying";
					$check = mysqli_query($dbc, $checkQuery);
					if (!mysqli_fetch_assoc($check)) {
						$query = "INSERT INTO user_trade_objects (trade_object_id, user_id, buying)  VALUES ( ".$value.", ".$userid.", 1)";
						mysqli_query($dbc, $query);
					}
				}
			}
			
			//remove books from buy
			if($remove){
				foreach($removebooks as $i => $value) {
					$query_remove = "DELETE FROM user_trade_objects WHERE user_id = $userid AND trade_object_id = $value AND buying = $buying";
					mysqli_query($dbc, $query_remove);
				}
				?>
				<script>
					alert('Books successfully removed');
				</script>
				<?php
			}
			
			//remove books from buy, marked as bought
			if($mark){
				foreach($markbooks as $i => $value) {
					$query_mark = "UPDATE user_trade_objects SET completed = '1' WHERE user_id = $userid AND trade_object_id = $value AND buying = $buying";
					mysqli_query($dbc, $query_mark);
				}
				?>
				<script>
					alert('Books successfully marked');
				</script>
				<?php
			}

			//find all the books that the user is looking to buy by using the userid stored in the session
			$query = "SELECT * FROM user_trade_objects WHERE buying = '$buying' AND user_id = '$userid' ";
			$result = mysqli_query($dbc, $query);
			$empty = 1;

			$coursemap = array();

			//now we need to loop through each book and find all the matching courses for each book			
			while ($row = mysqli_fetch_assoc($result)) {
				$textbook_id = $row["trade_object_id"] ;
				$empty = 0;
				//map textbooks to course
				$query_courses = "SELECT * FROM course_book WHERE book_id = $textbook_id";
				$result_courses = mysqli_query($dbc, $query_courses);
				while ($courserow = mysqli_fetch_assoc($result_courses)) {
					$key = $courserow["course_id"];
					if (array_key_exists($key, $coursemap)) {
						$arr = $coursemap[$key];
						array_push($arr, $textbook_id);
						$coursemap[$key] = $arr;
					} else {
						$newArray = array($key => $textbook_id);
						$coursemap[$key] = $newArray;
					}
				}
			}

			krsort($coursemap);
			foreach ($coursemap as $courseid => $textbookArr) {
				$query_cname = "SELECT * FROM courses WHERE course_id = $courseid";
				$result_cname = mysqli_query($dbc, $query_cname);
				while ($row = mysqli_fetch_assoc($result_cname)){
					echo("<li data-role=\"list-divider\">".$row["course_number"]."</li>");
				}
				foreach ($textbookArr as $i => $textbook_id) {
					$query_bname = "SELECT * FROM textbooks WHERE id = $textbook_id";
					$result_bname = mysqli_query($dbc, $query_bname);
					while ($row = mysqli_fetch_assoc($result_bname)){
						echo("<li><div style='position:absolute;left:-20px;top:22px;' class='cbox' data-role='button' data-icon='' data-iconpos='notext' data-mini='true' data-inline='true'></div><div style='position:absolute;left:8px;top:22px;' class='cbox-on' data-role='button' data-icon='check' data-iconpos='notext' data-mini='true' data-inline='true'></div><a id='".$textbook_id."' data-transition='slide' href=\"buyerPageList.php?textbook_id=".$textbook_id."\"><div style='position:relative; top: 0px;' class='entry'><h3>".$row["title"]."</h3><p>".$row["author"]."</p></div></a></li>");
					}
				}
			}

			//empty page? Get started here!
			if($empty) {
				echo "<style>
				.ui-body-c{  
					background: -webkit-linear-gradient(top, #f9f9f9, #f9f9f9);
					background: -moz-linear-gradient(top, #f9f9f9, #f9f9f9);
				}
				#nobooks {
					font-family: HelveticaNeue, Helvetica;
					font-weight: bold;
					font-size: 24px;
				}
				</style>";
				echo "<img style='position: absolute; left: 60px;' width='180px' src='images/getstarted-sm.png' />
				<div id='nobooks' style='position: absolute; left: 50px; top: 260px;'>You have no books <br>in your buy list.</div>";
			}

			//find the book that matches the textbook(trade_object) id to print the name of the book
			//while loop shouldn't be necessary here since there should only be 1 result (textbook ids are unique)

		?>
		</ul>
		
		<div data-role="popup" id="b-pop" data-overlay-theme="d" data-theme="c" style="max-width:500px;" class="ui-corner-all">
					<div data-role="header" data-theme="d" class="ui-corner-top">
						<h1>Confirm</h1>
					</div>
					<div data-role="content" data-theme="d" style="padding:15px;" class="ui-corner-bottom">
						<h2>Remove books?</h2>
						<p style="margin-bottom: 20px;">The books you have selected will be removed from your buy list.</p>
						<a style="margin-bottom: 10px;" data-role="button" data-mini="true" data-theme="b" onclick="removeBuy();">Remove</a>       
						<a data-role="button" data-rel="back" data-mini="true" data-theme="c">Cancel</a>    
					</div>
		</div>
		
    <!-- <div data-role="popup" id="b-pop" data-overlay-theme="a" data-theme="c" style="max-width:400px;" class="ui-corner-all">
                <div data-role="content" data-theme="d" class="ui-corner-bottom ui-content">
                    <p>Remove selected books from list?</p>
                    <a href="#" data-role="button" data-inline="true" data-rel="back" data-theme="c">Cancel</a>    
                    <a class="b-confirm-remove" href="#" data-role="button" data-inline="true" data-rel="back" data-transition="flow" data-theme="b">Remove</a>  
                </div>
            </div> -->
		
		<div data-role="popup" id="bboughtConfirm" data-overlay-theme="a" data-theme="c" style="max-width:400px;" class="ui-corner-all">
		            <div data-role="content" data-theme="d" class="ui-corner-bottom ui-content">
		                <h3>Would you like to mark the selected books as bought?</h3>
						<p>These items will be removed from this list and the action cannot be undone.</p>
		                <a href="#" data-role="button" data-inline="true" data-rel="back" data-theme="c">Cancel</a>    
		                <a id="confirm-bought" href="#" data-role="button" data-inline="true" data-rel="back" data-transition="flow" data-theme="b">Mark bought</a>  
		            </div>
		        </div>
		

				<div data-role="popup" id="success" class="ui-content">
					<p>Books successfully removed!</p>
				</div>
		
		</div><!-- content-primary -->
	</div><!-- content -->

	

	<div data-role="footer" data-id="samebar" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" data-grid="b">
		<ul>
			<li><a href="profile.php">Profile</a></li>
			<li><a href="buyerPage.php" class="ui-btn-active ui-state-persist">Buy</a></li>
			<li><a href="sellerPage.php">Sell</a></li>
			<!--<li><a href="messages.php" id="skull" data-icon="custom">Messages</a></li> -->
		</ul>
		</div>
	</div> <!-- footer -->
	

	

</div><!-- /page -->


</body>
</html>