<!DOCTYPE html> 
<html>

<head>
	<title>Bookends</title> 
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

<!-- Home -->
<div data-role="page" id="page1">
    <div data-theme="a" data-role="header">
        <h3>
            Delete Book
        </h3>
    </div>
    <h4>Are you sure  you want to delete this book from your list?</h4>
    <div data-role="content">
        <a data-role="button" data-theme="e" href="sellerPage.php"
        data-icon="check" data-iconpos="left">
            Delete
        </a>
    </div>
    <div data-role="content">
        <a data-role="button" data-theme="e" href="sellerPage.php"
        data-icon="check" data-iconpos="left">
            Cancel
        </a>
    </div>
</div>


</body>
</html>