<?php
	session_start();
?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>NCI Photography Club</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			    <link rel="stylesheet" href="css/cssstyle.css">
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/cssstyling" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
	</head>
	<body id="top">

		<!-- Header -->
			<header id="header" class="skel-layers-fixed">

				<h1><a href="index.php">NCIPC</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="index.php">Home</a></li>
						
						<?php
							if(isset($_SESSION['userID']))
							{
								echo'<li><a href="viewpost.php">Our Posts</a></li>';

								if($_SESSION['isanAdmin'] == 1){

									echo'<li><a href="posts.php">Manage Posts</a></li>';
								}
								echo '<button type="submit" class="button special" name="logout-submit"><a href="logout.inc.php">Logout</a></button>';

							}
							else
							{
								echo '<li><a href="login.php" class="button special">Login</a></li>';
							}
						?>
						
						
					</ul>
				</nav>
			</header>
		</body>

</html>