<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
</head>
<body>


	<div style="text-align:center; border:2px solid black; border-radius:15%; width: 350px; padding-top:20px; padding-bottom:10px; margin-left:500px; margin-top:150px;">


	<?php
		require 'connect.php';

		if(isset($_POST['fname'])&&isset($_POST['lname'])&&isset($_POST['uname'])&&isset($_POST['password'])&&isset($_POST['rpassword']))
		{
			$fname=$_POST['fname'];
			$lname=$_POST['lname'];
			$uname=$_POST['uname'];
			$password=$_POST['password'];
			$rpassword=$_POST['rpassword'];

			if(!empty($fname)&&!empty($lname)&&!empty($uname)&&!empty($password)&&!empty($rpassword))
			{
				if($password==$rpassword)
				{
					$password=md5($password);
					$query='INSERT INTO `usertable`(`date`, `fname`, `lname`, `uname`, `password`) VALUES (\''.date("d/m/y").'\',\''.$fname.'\',\''.$lname.'\',\''.$uname.'\',\''.$password.'\')';
					$result=mysql_query($query);

					echo '<p align="center">You are Registered. Please Sign-in now!</p>';
				}
				else
				{
					echo '<p align="center">Passwords do not match</p>';
					//header('Location: registration.php');
				}

			}
			else
			{
				echo '<p align="center">Fill all the fields properly!</p>';
				//header('Location: registration.php');
			}
		}

	?>

	
		<form action="registration.php" method="POST">
			First name: <input type="text" name="fname" maxlength="25"><br><br>
			Last name: <input type="text" name="lname" maxlength="25"><br><br>
			Username: <input type="text" name="uname" maxlength="8"><br><br>
			Password: <input type="password" name="password"><br><br>
			Re-enter Password: <input type="password" name="rpassword"><br><br>
			<input type="Submit" value="Register">
			<p>Already registered? <a href="login.php">Sign-in</a></p>
		</form>
	</div>
</body>
</html>