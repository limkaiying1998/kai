<?php
	require "header.php";
?>
	
	      <?php
      // First we grab the tokens from the URL.
      $selector = $_GET['selector'];
      $validator = $_GET['validator'];

      // Then we check if the tokens are here.
      if (empty($selector) || empty($validator)) {
        echo "Could not validate your request!";
      } else {
        // Here we check if all characters in our tokens are hexadecimal 'digits'. This is a boolean. Again another error check to make sure the URL wasn't changed by the user.
        // If this check returns "true", we show the form that the user uses to reset their password.
        if (ctype_xdigit( $selector ) !== false && ctype_xdigit( $validator ) !== false) {
          ?>

          
		<form action="reset-password.inc.php" method="post">

		  <input type="hidden" name="selector" value="<?php echo $selector ?>">
          <input type="hidden" name="validator" value="<?php echo $validator ?>">

		  	<p>
					<label for="password" class="floatLabel">Enter a new Password</label>
					<input name="pwd" type="password" required="required" placeholder="Enter a new password">
			</p>

			<p>
					<label for="password" class="floatLabel">Repeat your new Password</label>
					<input name="pwd-repeat" type="password" required="required" placeholder="Repeat new password">
			</p>

				<p>
					<input type="submit" name="reset-password-submit" value="Reset Password" id="submit">
				</p>

		</form>
		<br>
		<br>

          <?php
        }
      }
      ?>




<?php
	require "footer.php";
?>