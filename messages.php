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
	
	<script src="jquery-1.8.2.min.js"></script>
	<script src="jquery.mobile-1.2.0.js"></script>

</head> 
<body> 

<div data-role="page" id="filter">

	<div data-role="header">
		<h1>Your Messages</h1>

	</div><!-- /header -->



<table class="tweet">
  <tr class="tweet-header">
        <td class="avatar" rowspan="3">
          <a href=""><img alt="Kevin Chiu" src="https://si0.twimg.com/profile_images/2344348679/d7fhjj1t1mms16iq0m1p_reasonably_small.jpeg" /></a>
        </td>
      <td class="user-info">
          <strong class="fullname">Kim Kardashian</strong>
      </td>
  </tr>
  <tr class="tweet-container">
    <td colspan="2" class="tweet-content">
      <div class="tweet-text">okay Harry, let's meet at around 10pm so I can give you my notes then? ;)</div>

    </td>
  </tr>
  <tr>
        <td><a href="viewConversation.php">Reply</a></td>
		<td><a href="deletePageMessages.php" >Delete</a></td>
  </tr>
</table>

<table class="tweet">
  <tr class="tweet-header">
        <td class="avatar" rowspan="3">
          <a href=""><img alt="Kevin Chiu" src="https://si0.twimg.com/profile_images/859433636/recoveryapprovedcrop_reasonably_small.jpg" /></a>
        </td>
      <td class="user-info">
          <strong class="fullname">Marshall Mathers</strong>
      </td>
  </tr>
  <tr class="tweet-container">
    <td colspan="2" class="tweet-content">
      <div class="tweet-text">Hey Marshall, can I buy your How to Ride a Broom book?</div>

    </td>
  </tr>
  <tr>
        <td><a href="viewConversation.php">Reply</a></td>
		<td><a href="deletePageMessages.php" >Delete</a></td>
  </tr>
</table>



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