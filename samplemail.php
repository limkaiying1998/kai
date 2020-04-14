<?php
/*
From http://www.html-form-guide.com 
This is the simplest emailer one can have in PHP.
If this does not work, then the PHP email configuration is bad!
*/
$msg="";
if(isset($_POST['submit']))
{
	if(isset($_POST['SUBMIT'])){
		require 'phpmaler/PHPMailerAutoload.php';
		$mail = new PHPMailer;

		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
		$mail->isSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tls';

		$mail->Username = 'spw19159323@gmail.com';
		$mail->Password = 'kaiying98';
		$mail->SetFrom('spw19159323@gmail.com');
		$mail->isHTML(true);
		$mail->Subject = "Hello World";
		$mail->Body = 'A test email!';
		$mail->AddAddress('limkaiying98@gmail.com');

		if(!$mail->send()){
			echo 'fail';
		}
		else{
			echo'success';
		}
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Test form to email</title>
</head>

<body>
<?php echo $msg ?>
<p>
<form action='<?php echo htmlentities($_SERVER['PHP_SELF']); ?>' method='post'>
<input type='submit' name='submit' value='Submit'>
</form>
</p>


</body>
</html>
