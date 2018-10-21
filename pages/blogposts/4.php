<?php session_start(); ?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Blog</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="../../css/bootstrap.css">
		<link rel="stylesheet" href="../../css/stilus.css">
	</head>
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
					<a href="../../index.php" class="navbar-brand">PC-KING</a>
				</div>
				<!-- menu --> 
				<div class="collapse navbar-collapse" id="mainNavBar">
				<div>
					<ul class="nav navbar-nav">
						<li><a href="../../index.php">Home</a></li>
						<li><a href="../kategoriak.php">Products</a></li>
						<li class="active"><a href="../blog.php">Blog</a></li>
						<li><a href="../contact.php">Contact</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php
							if (isset($_SESSION["user"])) {
								echo "<li><a href=\"../user.php\">Welcome, ".$_SESSION["user"]; echo "!</a></li>";
								echo "<li><a href=\"../rendeles.php\">Cart</a></li>";
								echo "<li><a href=\"../Logout.php\">Logout</a></li>";
							}
							else{
								echo "<li><a href=\"../login.php\">Login</a></li>";
								echo "<li><a href=\"../regUrlap.php\">Registration</a></li>";
							}
						?>
					</ul>
				</div>
				</div>
			</div>
		</nav>
		<br>
		<div class="container">
			<h1>Blog</h1>
		</div>
		<hr>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<br><img src="../../img/addr.png" class="center-block img-responsive" width="345px" height="190px">
				</div>
				<div class="col-md-8">
					<h2>Our shop has a new address.</h2>
					<h3 id="newsnbloggreyfont">SEP 22</h4>
					<div class="row">
						<div class="col-md-11">
						<hr>
						<p>
							The address of our new shop is: Str. Libertatii, nr. 1, Targu Mures, jud. Mures, Roumania.
						</p>
						<p>
							We finished building our brand new Shopping store on the "Libertatii" street in Targu Mures.
						</p>
						<p>
							Our team included a Google Maps image here, so you can find us easily. We are waiting you in our brand new store!
						</p><br>
						<img src="../../img/addr1.png" width="600" height="400">
						</div>	
					</div>
					</div>
				</div>
			</div>
		</div>
		<br>
	<footer class="site-footer">
		<marquee width="100%"><p id="copyright"> @Copyright: PC-KING </p></marquee>
	</footer>
	</body>
</html>

















