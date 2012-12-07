



<!DOCTYPE> 
<html>

<head>
	<title>Bookends</title> 
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
	<script src="//cdn.optimizely.com/js/141321804.js"></script>


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
	.numsellers{
		font-size:12px;
		color:#B51616;
		position:absolute;
		right:10px;
	}
	
	</style>

	<div data-role="header">
		
		<h1>Books to buy</h1>
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
						$(".edit-commands")
							.css("border-color", "transparent");
						$(".edit-commands").children(":first")
							.css("background", "-webkit-gradient(linear, left top, left bottom, from(#dd696d), to(#B82529))")
							.css("border-style", "transparent")
							.css("border-radius", "2px");
						$(".edit-commands").children(":first").children(":first")
							.css("color", "white")
							.css("textShadow", "black 0px 0px 5px")
							.css("outline-style", "none");
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
		<div class="content-primary">

		<a class="edit-commands-off" href="addBookBuy.php" data-role="button" style="margin-top:-5px;  margin-bottom:25px;">Add books by course</a>
		<a class="edit-commands b-rmv-btn" href="#b-pop" data-transition="pop" data-rel="popup" data-role="button" style="margin-top:-5px;  margin-bottom:25px;">Remove selected</a>
		
		<ul id="buyList" data-role="listview" data-theme="d" data-divider-theme="d">
			<li data-role="list-divider">CHEM31X</li><li><div style='position:absolute;left:-20px;top:22px;' class='cbox' data-role='button' data-icon='' data-iconpos='notext' data-mini='true' data-inline='true'></div><div style='position:absolute;left:8px;top:22px;' class='cbox-on' data-role='button' data-icon='check' data-iconpos='notext' data-mini='true' data-inline='true'></div><a id='7' data-transition='slide' href="buyerPageList.php?textbook_id=7"><div style='position:relative; top: 0px;' class='entry'><h3>Organic Chemistry as a Second Language</h3><p>Vollhardt and Schore<span class='numsellers'>3 sellers</span></p></div></a></li><li><div style='position:absolute;left:-20px;top:22px;' class='cbox' data-role='button' data-icon='' data-iconpos='notext' data-mini='true' data-inline='true'></div><div style='position:absolute;left:8px;top:22px;' class='cbox-on' data-role='button' data-icon='check' data-iconpos='notext' data-mini='true' data-inline='true'></div><a id='3' data-transition='slide' href="buyerPageList.php?textbook_id=3"><div style='position:relative; top: 0px;' class='entry'><h3>General Chemistry</h3><p>Vollhardt Bergman<span class='numsellers'>0 sellers</span></p></div></a></li><li data-role="list-divider">CS106A</li><li><div style='position:absolute;left:-20px;top:22px;' class='cbox' data-role='button' data-icon='' data-iconpos='notext' data-mini='true' data-inline='true'></div><div style='position:absolute;left:8px;top:22px;' class='cbox-on' data-role='button' data-icon='check' data-iconpos='notext' data-mini='true' data-inline='true'></div><a id='2' data-transition='slide' href="buyerPageList.php?textbook_id=2"><div style='position:relative; top: 0px;' class='entry'><h3>Art and Science of Java</h3><p>Roberts<span class='numsellers'>2 sellers</span></p></div></a></li>		</ul>
		
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