<?php
	require "header.php";
?>

		<form action="registration.inc.php" method="post">
		  <h2>Sign Up</h2>
		  <?php
		  	if(isset($_GET['error'])){
		  		if($_GET['error'] == "passwordvalidation"){
		  			echo'<p style="color:red">Your passwords do not contain the required validation format!</p>';
		  		}
		  		else if($_GET['error'] == "passwordcheck"){
		  			echo'<p style="color:red">Your passwords do not match!</p>';
		  		}
		  		else if ($_GET["error"] == "usertaken"){
		  			echo'<p style="color:red">Username has been taken!</p>';
		  		}
		  	}
			else if($_GET["registration"] == "success"){
		  			echo'<p style="color:blue">Account created successfully proceed to login page!</p>';

		  		}
		  ?>
		  		<p>
					<label for="usn" class="floatLabel">Username</label>
					<input id="usn" name="usn" type="text" required="required" placeholder="username">
				</p>
				<p>
					<label for="Email" class="floatLabel">Email</label>
					<input id="email" name="email" type="email" required="required" placeholder="example@gmail.com">
				</p>
				<p>
					<label for="password" class="floatLabel">Password</label>
					<input id="password" name="password" type="password" required="required" placeholder="password">
					<div>
						<ul>
							<li>Your password must contain at least 8 characters.</li>
							<li>Your password must contain a upper and lower case character.</li>
							<li>Your password must contain a number (eg:0-9) </li>
							<li>Your password must contain a special character (eg: !#$%^*)</li>
					</div>

				</p>
				<p>
					<label for="confirm_password" class="floatLabel">Confirm Password</label>
					<input id="confirm_password" name="confirm_password" type="password" required="required" placeholder="repeat password">
				</p>
			
					<input type="submit" name="register-submit" value="Create My Account" id="submit">
				</p>
			</form>
			<br>
			<Br>


<?php
	require "footer.php";
?>
