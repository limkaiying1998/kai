<!DOCTYPE HTML>
<?php
	require "header.php";
?>
<html>
	
		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<h2>NCI Photography Club</h2>
					<?php
						if(isset($_SESSION['usnname']))
						{
							echo "Welcome  " . $_SESSION['usnname'];
							echo '<ul class="actions">';
							echo '<li><a href="viewpost.php" class="button big alt">Our Posts</a></li>';
						}
						else
						{
							echo '<ul class="actions">';
							echo '<li><a href="login.php" class="button big alt">Login</a></li>';
							echo '<li><a href="registration.php" class="button big special">Register</a></li>';
						}
					?>
				</div>
			</section>


		<!-- One -->
			<section id="one" class="wrapper style1">
				<header class="major">
					<h2>Get To Know Us</h2>
					<p>We are the NCI Photography Club! </p>
				</header>
				<div class="container">
					<div class="row">
						<div class="4u">
							<section class="special box">
								<i class="icon fa-area-chart major"></i>
								<h3>Outings</h3>
								<p>Our clubs will organise official outings and guided walkabouts across the semester for our members</p>
							</section>
						</div>
						<div class="4u">
							<section class="special box">
								<i class="icon fa-refresh major"></i>
								<h3>Courses</h3>
								<p>Our club will host free courses for students to learn about different photography techniques</p>
							</section>
						</div>
						<div class="4u">
							<section class="special box">
								<i class="icon fa-cog major"></i>
								<h3>Improve your skills</h3>
								<p>We offer free workshops to guide NCI students to hone and improve their photography skills!</p>
							</section>
						</div>
					</div>
				</div>
			</section>

	</body>
<?php
	require "footer.php";
?>
</html>
