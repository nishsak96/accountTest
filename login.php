<!DOCTYPE html>
<html>
<head>
	<title>Sign-in</title>
</head>
<body>

	<?php
		//echo $referer=$_SERVER['HTTP_REFERER'];
	?>



	<div style="text-align:center; border:2px solid black; border-radius:15%; width: 350px; padding-top:20px; padding-bottom:10px; margin-left:500px; margin-top:150px;">


	<?php
		
		require 'connect.php';
		
		if(isset($_POST['uname'])&&isset($_POST['password']))
		{
			$uname=$_POST['uname'];
			$password=$_POST['password'];

			if(!empty($uname)&&!empty($password))
			{	
					$password=md5($password);
					$query='SELECT `password` FROM `usertable` WHERE `uname`=\''.$uname.'\'';
					$result=mysql_query($query);

					if(mysql_num_rows($result)==0)
					{
						echo '<p align="center">User not Registered. Please <a href="registration.php">register</a> now!</p>';
					}
					else if(mysql_num_rows($result)==1)
					{
						$data=mysql_fetch_assoc($result);
						if($password==$data['password'])
						{
							session_start();
							header('Location: account.php');
						}
						else
						{
							echo '<p align="center">Username and password do not match. Try again</p>';
						}
					}

			}
			else
			{
				echo '<p align="center">Fill all the fields properly!</p>';
			}
		}
	?>


		<form action="login.php" method="POST">
			Username: <input type="text" name="uname"><br><br>
			Password: <input type="password" name="password"><br><br>
			<input type="Submit" value="Sign-in">
			<p>Not registered? <a href="registration.php">Register</a></p>
		</form>
	</div>
</body>
</html>