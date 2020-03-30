<?php
	// blocking that the user can acess mainArea.html directly
	session_start();
	$_SESSION["user"] = "user";
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- favicon -->
	<link href="favicon.ico" rel="icon" type="image/x-icon"/>

	<!-- individual styles -->
	<link rel="stylesheet" type="text/css" href="styles/general-styles.css">
	<link rel="stylesheet" type="text/css" href="styles/enter-page-styles.css">

</head>
<body>

	<video id="videoBG" autoplay muted loop>
    	<source src="videos/backgroundVideo.mp4" type="video/mp4">
	</video>

	<div id="enter_flex_horizontally">
		<div id="enter_flex_vertically">
			<a id="enter_link" href="mainArea.php">
				Enter the quiz
			</a>
		</div>	
	</div>

</body>
</html>