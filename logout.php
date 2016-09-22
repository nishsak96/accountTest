<!DOCTYPE html>
<html>
<head>
	<title>456789</title>
</head>
<body>

<?php
	include 'loginsession.php';
	session_unset($loggedin);
	header('Location: login.php');
?>


</body>
</html>