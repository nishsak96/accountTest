<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
</head>
<body>

	<div style="text-align:center; border:2px solid black; border-radius:15%; width: 350px; padding-top:20px; padding-bottom:10px; margin-left:500px; margin-top:150px;">
	<?php
		require 'loginsession.php';
		$referer=@$_SERVER['HTTP_REFERER'];
		$x=strlen($referer);
		$past=substr($referer, $x-9);

		if($past=='login.php')
		{
			echo 'Congratulations. You are logged in. <br><br><a href="logout.php">Logout</a>';
		}
		else
		{
			echo 'You are not logged in. Please sign-in here. <br><br><a href="login.php">LogIN</a>';
		}
	?>
		
		
	</div>
</body>
</html>