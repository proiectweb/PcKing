<?php session_start(); ?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>User</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/stilus.css">
	</head>
	<?php
		$nev1 = $_SESSION["user"];
		$db_connection = mysql_connect("localhost", "root", "");
		if (!$db_connection) {
			header("Location: db_error.php");
		}
		mysql_select_db("webshop", $db_connection);
		$result = mysql_query("SELECT * FROM user WHERE username=\"$nev1\"");
		$row = mysql_fetch_array($result, MYSQL_NUM);
	?>
	<!-- 2:pw 3:email 4:name 5:add 6:phone-->
	<body>
		<nav class="navbar-inverse">
			<!-- Logo --> 
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="../index.php" class="navbar-brand">PC-KING</a>
				</div>
				<!-- menu --> 
				<div class="collapse navbar-collapse" id="mainNavBar">
				<div>
					<ul class="nav navbar-nav">
						<li><a href="../index.php">Home</a></li>
						<li><a href="kategoriak.php">Products</a></li>
						<li><a href="blog.php">Blog</a></li>
						<li><a href="contact.php">Contact</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php
							if (isset($_SESSION["user"])) {
								echo "<li  class=\"active\"><a href=\"user.php\">Welcome, ".$_SESSION["user"]; echo "!</a></li>";
								echo "<li><a href=\"rendeles.php\">Cart</a></li>";
								echo "<li><a href=\"Logout.php\">Logout</a></li>";
							}
							else{
								echo "<li><a href=\"login.php\">Login</a></li>";
								echo "<li><a href=\"regUrlap.php\">Registration</a></li>";
							}
						?>
					</ul>
				</div>
				</div>
			</div>
		</nav>
		<div class="container">
			<h1>Profile information</h1><hr><br>
			<div class="row">
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-3">
							<span><i class="fa fa-user fa" aria-hidden="true" id="fasize"></i></span><br>
							<br>
							<span><i class="fa fa-map-marker" aria-hidden="true" id="fasize1"></i></span><br>
							<br>
							<span><i class="fa fa-phone-square" aria-hidden="true" id="fasize"></i></span><br>
							<br>
						</div>
						<div class="col-md-9">
							<h3>Username: </h3>
							<?php
								echo "<h4>";
								echo $_SESSION["user"]; 
								echo "</h4>";
							?>
							<br>
							<h3 id="usrmarg">Address: </h3>
								<?php 
									echo "<h4>", $row[5], "</h4>"
								?>
								<br>
							<h3 id="usrmarg">Phone number: </h3>
								<?php 
									echo "<h4>", $row[6], "</h4>"
								?>
							<br>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-3">
							<span><i class="fa fa-users fa" aria-hidden="true" id="fasize"></i></span><br>
							<br>
							<span><i class="fa fa-envelope fa" aria-hidden="true" id="fasize1"></i></span><br>
							<br>
						</div>
						<div class="col-md-9">
							<h3>Personal name: </h3>
								<?php 
									echo "<h4>", $row[4], "</h4>"
								?>
							<br>
							<h3 id="usrmarg">E-mail: </h3>
								<?php 
									echo "<h4>", $row[3], "</h4>"
								?>
							<br>
						</div>
					</div>
				</div>
			</div>
			<br>
		</div>
		<div class="container">
			<h1>Change profile information</h1><hr>
			<h4>Change Username: <a href="userinfo/username.php"><i class="fa fa-user fa" aria-hidden="true" id="fasize2"></i></a></h4>
			<h4>Change Password: <a href="userinfo/password.php"><i class="fa fa-lock fa-lg" aria-hidden="true" id="fasize2"></i></a></h4>
			<h4>Change Address: <a href="userinfo/address.php"><i class="fa fa-map-marker" aria-hidden="true" id="fasize2"></i></a></h4>
			<h4>Change E-mail: <a href="userinfo/email.php"><i class="fa fa-envelope fa" aria-hidden="true" id="fasize2"></i></a></h4>
			<h4>Change Phone number: <a href="userinfo/phone.php"><i class="fa fa-phone-square" aria-hidden="true" id="fasize2"></i></a></h4>
		</div>
	<footer class="site-footer navbar-bottom">
		<marquee width="100%"><p id="copyright"> @Copyright: PC-KING  </p></marquee>
	</footer>
	</body>
</html>