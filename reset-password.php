<?php
	require "header.php";
?>


		<form action="reset-request.inc.php" method="post">

		  <h2>Reset your password</h2>

		<p>*An email will be sent to you with instructions on how to reset your password.</p>
		  <p>
					<label for="Email" class="floatLabel">Email</label>
					<input id="email" name="email" type="email" required="required" placeholder="example@gmail.com">
			</p>
		

			<p>
					<input type="submit" name="reset-request-submit" value="Request Reset Password" id="submit">
			</p>
		</form>
		  <?php
		        if (isset($_GET["reset"])) {
		          if ($_GET["reset"] == "success") {
		            echo '<p class="signupsuccess">Check your e-mail!</p>';
		          }
		        }
     	 ?>
		<br>
		<br>

<?php
	require "footer.php";
?>