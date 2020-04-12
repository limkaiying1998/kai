<?php

	error_reporting (E_ALL ^ E_NOTICE);
	require "header.php";

	if (isset($_SESSION["locked"])){
		$difference = time() - $_SESSION["locked"];
		if($difference > 10){
			unset($_SESSION["locked"]);
			unset($_SESSION["login_attempts"]);
		}
	}

?>
		<form action="login.inc.php" method="post">
		  <h2>Login</h2>
		  <?php if (isset($_SESSION["error"])) {?> 
		  	<p style="color: red;"><?= $_SESSION["error"]; ?></p> 
		  <?php unset($_SESSION["error"]); } ?>

		  <?php
		  	if (isset($_GET['error'])){
		  		if($_GET['error'] == "nouser"){
		  			$_SESSION["login_attempts"] += 1;
		  			echo'<p style="color:red">User does not exist!</p> ';
		  		}
		  		else if($_GET['error'] == "wrongpwd"){
		  			$_SESSION["login_attempts"] += 1;
		  			echo'<p style="color:red">Incorrect Password</p> ';
		  		}
		  		else if($_GET['error'] == "notauser"){
		  			echo'<p style="color:red">You do not have access to the page! Please login as a user!</p> ';
		  		}

		  	}
		  ?>
				<p>
					<label for="usn" class="floatLabel">Username</label>
					<input id="usn" name="usn" type="text" required="required" placeholder="username">
				</p>
				<p>
					<label for="password" class="floatLabel">Password</label>
					<input id="password" name="password" type="password" required="required" placeholder="password">
				</p>

				<p>
					<a style="color: black;"href="registration.php">No Account? Register Now!</a>
					<br>
					<?php
						if($_SESSION["login_attempts"] > 2){

							//Logging User Details 
							$iplogfile = 'log.txt';
							$ipaddress = $_SERVER['REMOTE_ADDR'];
							$webpage = $_SERVER['SCRIPT_NAME'];
							$timestamp = date('d/m/Y h:i:s');
							$browser = $_SERVER['HTTP_USER_AGENT'];
							$fp = fopen($iplogfile, 'a+');
							chmod($iplogfile, 0777);
							fwrite($fp, '['.$timestamp.']: '.$ipaddress.' '.$webpage.' '.$browser. "\n<br><br>");
							fclose($fp);

							$_SESSION["locked"] = time();
							echo'<p style="color:red">You IP has been logged</p> ';
							echo'<p style="color:red">You have exceeded the login attempts. Please wait 10 seconds, refresh the page and try again</p> ';
						}
						else{
					?>
					<input type="submit" name="login-submit" value="Login">
					<?php } ?>
				</p>
			</form>
			<br>
			<Br>
<?php
	require "footer.php";
?>