<!DOCTYPE html> 
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
	<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.1/css/bootstrap-combined.min.css" rel="stylesheet">

	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>
	<script src="//cdn.optimizely.com/js/141321804.js"></script>

	<style>
		.blue {
			margin-right: 110px;
			padding-right: 15px;
			max-width: 130px;
		}
		.grey {
			margin-top: 0px;
			margin-left: 0px;
			max-width: 130px;
			padding-right: 15px;
		}
	</style>

</head> 
<body> 

<div data-role="page" id="filter">

	<div data-role="header">
		<a href="messages.php" data-icon="check">Back</a>
		<h1>Send Message</h1>

	</div><!-- /header -->


<div class="tweetsheet dmbox-container">
  <form action="confirmationPageMessages.php" class="tweetform" method="post">
    <div style="margin:0;padding:0;display:inline"><input name="authenticity_token" type="hidden" value="252ef07bf8317a89ef4f" /></div>
    <table class="tweettable">
      <tr><td colspan="2"><h1>Conversation with ____________:</h1></td></tr>
      <tr>
        <td colspan="2">
	<div style="float:left; width: 320px; margin-bottom: 10px">
		<div class="alert alert-info pull-right blue">
		  Hey _____ are you still selling _____?
		</div>
		<div class="alert alert-block pull-left grey">
		  Yeah how much would you like to buy it for?  Is $50 okay?
		</div>
		<div class="alert alert-info pull-right blue">
		  Aww come on man we were in the same IHUM section together, like best friends!  how about $40?
		</div>
		<div class="alert alert-block pull-left grey">
		  Errr alright then. Want to meet at 7pm at Axe and Palm?
		</div>
		<div class="alert alert-block pull-left grey">
		  Yeah see you then! Thanks :))
		</div>
	</div>
        </td>
      </tr>
      <tr>
        <td class="tweet-btn-container">
	<div style="float:left; width: 100%; height: 100px;">
		<div class="input-append">
		  <input width="100%" height="30px" class="span2" id="appendedInputButton" type="text">
		  <button class="btn btn-success" type="button">Send</button>
	</div>	
        </td>
      </tr>
    </table>
  </form>
</div>


	<div data-role="footer" data-id="samebar" class="nav-glyphish-example" data-position="fixed" data-tap-toggle="false">
		<div data-role="navbar" class="nav-glyphish-example" data-grid="c">
		<ul>
			<li><a href="profile.php" id="home" data-icon="custom">Profile</a></li>
			<li><a href="buyerPage.php" id="key" data-icon="custom">Buy</a></li>
			<li><a href="sellerPage.php" id="beer" data-icon="custom">Sell</a></li>
			<li><a href="messages.php" id="skull" data-icon="custom" class="ui-btn-active">Messages</a></li>
		</ul>
		</div>
	</div>
	

</div><!-- /page -->


</body>
</html>