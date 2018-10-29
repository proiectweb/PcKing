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
						<li><a href="kategoriak.php">Products</a></li>
						<li class="active"><a href="../blog.php">Blog</a></li>
						<li><a href="../contact.php">Contact</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php
							if (isset($_SESSION["user"])) {
								echo "<li><a href=\"../user.php\">Welcome, ".$_SESSION["user"]; echo "!</a></li>";
                                if (!isset($_SESSION["cart"]))
                                    echo "<li><a href=\"../rendeles.php\">Items in cart: 0</a></li>";
                                else {
                                    $kosar = $_SESSION["cart"];
                                    $db_connection = mysql_connect("localhost", "root", "");
                                    mysql_select_db("webshop", $db_connection);

                                    $sum = 0;
                                    foreach ($kosar as &$elem) {
                                        $items = explode(",", $elem);
                                        $result = mysql_query("SELECT name, quantity FROM products WHERE id=$items[0]");
                                        $row = mysql_fetch_array($result, MYSQL_NUM);
                                        $sum += intval($items[1]);
                                    }

                                    echo "<li><a href=\"../rendeles.php\">Items in cart: $sum</a></li>";
                                }
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
					<br><img src="../../img/blog2.png" class="center-block img-responsive" width="345px" height="190px">
				</div>
				<div class="col-md-8">
					<h2>RAZER MOUSE + MOUSEPAD GIFT</h2>
					<h3 id="newsnbloggreyfont">OCT 07</h4>
					<div class="row">
						<div class="col-md-11">
						<hr>
						<h4>Razer company</h4>
						<p>
							Firstly, let us tell you about the "Razer inc."!</p>
						<p>
							Razer Inc. is an American company founded by Min-Liang Tan, Matthew Thompson and Robert Krakoff, 
							which specializes in products marketed specifically to gamers. 
							Razer is dedicated to the creation and development of products mainly focused on PC gaming such as gaming laptops, 
							gaming tablet computer, various PC gaming peripherals, wearables and accessories. </p>
							<p>
							The Razer brand is currently being marketed under Razer USA Ltd. Razer has become a very popular brand among PC gamers around the world.
							Razer was founded in 2005 by a team of marketers and engineers to develop and market a high end computer gaming mouse, the Boomslang, targeted to computer gamers.</p>
							<p>
							At Consumer Electronics Show 2011, Razer unveiled the Razer Switchblade, a handheld gaming device prototype.</p>
							<p>
							At CES 2013, Razer unveiled its Razer Edge gaming tablet computer, which was previously known as Project Fiona. The tablet uses the Windows 8 operating system and is designed with gaming in mind.</p>
							<p>
							In May 2014, Razer unveiled the 14-inch Razer Blade and 17-inch Razer Blade Pro gaming laptops with 4th-generation Intel Haswell processors. The Razer Blade 14-inch portable gaming laptop was dubbed the "world's thinnest gaming laptop" which weighed just 4.1 lbs., while the 17-inch screen Razer Blade Pro featured the built-in 'Switchblade' LCD display.</p>
							<p>
							At CES 2016, Razer unveiled Project Christine, a modular gaming PC. Each of the branches on the PC is a discrete component—a CPU, a GPU, a hard drive, memory—that simply plugs into the central backbone. Once slotted in, Project Christine automatically syncs the newly added module through PCI-Express (the same serial bus that discrete graphics cards and other components currently use).</p>
							<p>
							In July 2017, Razer announced it was purchasing the software division of video-game company Ouya.</p>
							<p>
							At Consumer Electronics Show 2018, Razer has been selected for People's Choice Winner for Razer Blade Stealth Ultrabook.The company won last year for the Razer Forge TV, and this year, it takes home the prize for the Razer Blade Stealth Ultrabook, a super-slim gaming laptop.
						</p><br>
						<p id="newsnbloggreyfont">Recently, this famous brand, the "Razer" just became a sponsor of our webpage! From now on, every third order from the same account will get a gift:
						A "Megasoma 2" Razer mousepad and a Brand new "Taipan" Razer gaming mice!</p>
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