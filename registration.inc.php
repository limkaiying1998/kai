<?php
if (isset($_POST['register-submit']))
{
	require 'dbh.php';

	$username = $_POST['usn'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirmPassword = $_POST['confirm_password'];
	//password formating
	$uppercase = preg_match('@[A-Z]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);
	$number    = preg_match('@[0-9]@', $password);
	$specialChars = preg_match('@[^\w]@', $password);

	if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8)
	{
		header("Location:./registration.php?error=passwordvalidation");
		exit();
	}
	else if($password !== $confirmPassword)
	{
		header("Location:./registration.php?error=passwordcheck");
		exit();
	}
	else
	{
		$sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql))
		{
			header("Location:./registration.php?error=sqlerror");
			exit();
		}
		else
		{
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);

			if($resultCheck > 0){
				header("Location:./registration.php?error=usertaken");
				exit();
		}
		else
		{
			$sql = "INSERT INTO users(uidUsers, emailUsers, pwdUsers, isAdmin ) VALUES (?, ?, ?, FALSE)";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $sql))
			{
				header("Location:./registration.php?error=sqlerror");
				exit();
			}
			else
			{
				$hashedPwd = password_hash($password, PASSWORD_DEFAULT );

				mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
				mysqli_stmt_execute($stmt);
				header("Location:./registration.php?registration=success");
				exit();
			}
		}
	}
}
		mysqli_stmt_close($stmt);
		mysql_close($conn);
}
		else
		{
			header("Location:./login.php");
			exit();
		}

?>