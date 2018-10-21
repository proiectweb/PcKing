<?php session_start(); ?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Categories</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/stilus.css">
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
					<a href="../index.php" class="navbar-brand">PC-KING</a>
				</div>
				<!-- menu --> 
				<div class="collapse navbar-collapse" id="mainNavBar">
				<div>
					<ul class="nav navbar-nav">
						<li><a href="../index.php">Home</a></li>
						<li   class="active"><a href="kategoriak.php">Products</a></li>
						<li><a href="blog.php">Blog</a></li>
						<li><a href="contact.php">Contact</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php
							if (isset($_SESSION["user"])) {
								echo "<li><a href=\"user.php\">Welcome, ".$_SESSION["user"]; echo "!</a></li>";
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
		<br>
		<div class="container">
			<h1>Categories</h1>
		</div>
		<hr>
		<br><br>
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-centered" ><a href="termekek.php?tipus=proc"><img class="img-rounded center-block" src="../img/proci.jpg" width="200" height="200"></a><h3 align="center">Processor</h3>
					<p align="center">A processor is the logic circuitry that responds to and processes the basic instructions that drive a computer.</p><br>
				</div>
				<div class="col-md-4 col-centered" ><a href="termekek.php?tipus=hdd"><img class="img-rounded center-block" src="../img/hdd.jpg" width="200" height="200"></a><h3 align="center">HDD</h3>
					<p align="center">In a personal computer, a hard disk drive (HDD) is the data storage for the PC.</p><br>
				</div>
				<div class="col-md-4 col-centered"><a href="termekek.php?tipus=video"><img class="img-rounded center-block" src="../img/vcard.jpg" width="200" height="200"></a><h3 align="center">Video Card</h3>
					<p align="center">A video card is a circuit board, that provides 2D, 3D and basic graphics processing (GPGPU) calculations for a pc.</p><br>
				</div>
			</div>
		</div>
		<br>
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-centered"><a href="termekek.php?tipus=mem"><img class="img-rounded center-block" src="../img/ram1.png" width="200" height="200"></a><h3 align="center">RAM</h3>
					<p align="center">"Random Access Memory" is the place in a pc where the operating system, application programs, and data in current use are kept so that they can be quickly reached by the pc's processor.</p><br>
				</div>
				<div class="col-md-4 col-centered"><a href="termekek.php?tipus=audio"><img class="img-rounded center-block" src="../img/soundcard1.png" width="200" height="200"></a><h3 align="center">Sound Card</h3>
					<p align="center">A sound card is a peripheral device that attaches to the ISA or PCI slot on a motherboard to enable the computer to input, process, and deliver sound.</p><br>
				</div>
				<div class="col-md-4 col-centered"><a href="termekek.php?tipus=cooler"><img class="img-rounded center-block" src="../img/coler.jpg" width="200" height="200"></a><h3 align="center">Cooler</h3>
					<p align="center">A device that draws heat away from a CPU chip and other hot-running chips such as a graphics processor (GPU). </p><br>
				</div>
			</div>
		</div>
	<footer class="site-footer navbar-bottom">
		<marquee width="100%"><p id="copyright"> @Copyright: PC-KING </p></marquee>
	</footer>
	</body>
</html>