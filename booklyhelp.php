
<!DOCTYPE html> 
<html>

<head>
	<title>Bookends</title> 
	
	<meta charset="utf-8" />
    <title>jQuery UI Effects - Animate demo</title>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />
    
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

<div data-role="page" id="filter">



	<div data-role="header">
		<h1 style="font-family: HelveticaNeue, Helvetica">Bookends</h1>

	</div><!-- /header -->
	<div data-role="content" style="margin-left: 30px; margin-right: 30px;">
    <div class="input-wrapper">
	  <div style="font-size: 1.5em; font-weight: bold; margin: 10px 0;">Welcome to Bookends! </div>
	  <div style="font-size: 14px; margin-bottom: 10px;"class="hint">
		The quickest way to buy and sell books on campus <a href="login.php">Sign in</a>
	  </div>
	</div>
	
	<!-- /body -->
	
	 <style>
        .toggler { width: 500px; height: 200px; position: relative; }
        #button { padding: .5em 1em; text-decoration: none; }
        #effect { width: 100px; height: 75px; padding: 0.4em; position: relative; background: #fff; }
        #effect h3 { margin: 0; padding: 0.4em; text-align: center; background:}
    </style>
    <script>
    $(function() {
        var state = true;
        $( "#button" ).click(function() {
            if ( state ) {
                $( "#effect" ).animate({
                    background: "#A82226",
                    color: "#A82226",
                    width: 600,
                    height: 175
                }, 1000 );
            } else {
                $( "#effect" ).animate({
                    background: "#fff",
                    color: "#000",
                    width: 100,
                    height: 75
                }, 1000 );
            }
            state = !state;
        });
    });
    </script>
 
<div class="toggler">
    <div id="effect" class="ui-widget-content ui-corner-all">
        <h3 <a href="#" id="button" class="ui-state-default ui-corner-all"> How to Buy Books </a> </h3>
        <p>Step 1. Click the tab labeled Buy located on the bottom button bar
        </p>
        <p>Step 2. Click the Add Book button located directly below the header (be sure you have a book SELECTED before you click Finish Adding!)
        </p>
        <p>Step 3. After adding a book, click on the book title to see a list of people selling that book; click on a person's name to send them a message!
        </p>
    </div>
</div>

<div class="toggler">
    <div id="effect" class="ui-widget-content ui-corner-all">
        <h3 <a href="#" id="button" class="ui-state-default ui-corner-all"> How to Sell Books </a> </h3>
        <p>Step 1. Click the tab labeled Sell located on the bottom button bar
        </p>
        <p>Step 2. Click the Add Book button located directly below the header (be sure you have a book SELECTED before you click Finish Adding!)
        </p>
        <p>Step 3. After adding a book, click on the book title to see a list of people buying that book; click on a person's name to send them a message!
        </p>
    </div>
</div>

<div class="toggler">
    <div id="effect" class="ui-widget-content ui-corner-all">
        <h3 <a href="#" id="button" class="ui-state-default ui-corner-all"> How to Edit Your Profile </a> </h3>
        <p>Click on the Profile button on the bottom button bar and then click the Edit button in the top right corner of the Profile page 
        </p>
    </div>
</div>
 
<!-- <a href="#" id="button" class="ui-state-default ui-corner-all">Toggle Effect</a> -->
 
 <!-- /endbody -->
	
</div>
	<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example" data-grid="c">
		<ul>
		</ul>
		</div>
	</div>
	

</div><!-- /page -->




</body>
</html>