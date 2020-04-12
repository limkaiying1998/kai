<?php
if (isset($_POST['login-submit'])){

	require 'dbh.php';
	$username = $_POST['usn'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM users WHERE uidUsers=?;";
	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt, $sql))
	{
		header("Location:./index.php?error=sqlerror");
		exit();
	}
	else
	{
		mysqli_stmt_bind_param($stmt, "s", $username);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		if($row = mysqli_fetch_assoc($result))
		{
			$pwdCheck = password_verify($password, $row['pwdUsers']);
			if($pwdCheck == false)
			{
				header("Location:./login.php?error=wrongpwd");
				exit();
			}
			elseif ($pwdCheck == true)
			{
				session_start();
				$_SESSION['userID'] = $row['idUsers'];
				$_SESSION['usnname'] = $row['uidUsers'];
				$_SESSION['isanAdmin'] = $row['isAdmin'];

				header("Location:./index.php?login=success");
				exit();

			}
		}
		else
		{
			header("Location:./login.php?error=nouser");
			exit();
		}
	}

}
else
{
	header("Location:./index.php");
	exit();
}

?>