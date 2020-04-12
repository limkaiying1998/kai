<?php
	if(isset($_POST["reset-request-submit"])){

		$selector = bin2hex(random_bytes(8));
		$token = random_bytes(32);

		$url = "localhost/19159323/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

		$expires = date("U") + 1800;

		require 'dbh.php';

		$userEmail = $_POST["email"];

		$sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			echo "There is an error!";
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt, "s", $userEmail);
			mysqli_stmt_execute($stmt);
		}

		$sql = "INSERT INTO pwdReset(pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?);";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			echo "There is an error!";
			exit();
		}
		else{
			$hashedToken = password_hash($token, PASSWORD_DEFAULT);
			mysqli_stmt_bind_param($stmt, "ssss", $userEmail,$selector,$token,$expires);
			mysqli_stmt_execute($stmt);
		}

		mysqli_stmt_close($stmt);
		mysqli_close($conn);

		$to = $userEmail;

		$subject = 'Reset your password for NCIPC';

		$message = '<p>We received a password request. The link to reset your password is below, if you did not make this request please ignore this email.</p>';
		$message .= '<p>Here is your password reset link: </br>';
		$message .= '<a href="' . $url . '">' . $url . '</a></p>';

		  $headers = "From: Kai <limkaiying98@gmail.com>\r\n";
		  $headers .= "Reply-To: limkaiying98@gmail.com\r\n";
		  $headers .= "Content-type: text/html\r\n";

		  mail($to, $subject, $message, $headers);
		
		
	if(mail($to, $subject, $message, $headers)) 
	{
		echo "mail sent";
		header("Location: ../reset-password.php?reset=success");
	} 
	else 
	{
 	   echo "mail fail to sent";
	}


	} else{
		header("Location:./index.php");
	}





?>
