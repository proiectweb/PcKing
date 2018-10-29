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
					<br><img src="../../img/blog1.png" class="center-block img-responsive" width="345px" height="190px">
				</div>
				<div class="col-md-8">
					<h2>Getting Started: Pick Your Core PC Parts</h2>
					<h3 id="newsnbloggreyfont">OCT 12</h4>
					<div class="row">
						<div class="col-md-11">
						<hr>
						<p>
                            It's important that first-time builders (like me!) understand the anatomy of a system. There are six major parts that make up a computer like the Ryzen-based PC I built.</p>
							<p>Processor: The brain of the machine. This is where your data will be crunched.</p><p>
                                Motherboard: The backbone of any system. This intricate, chip-stuffed circuit board is where the processor and RAM live, and where you plug in your SSDs, hard drives, networking cables, and peripherals. </p><p>
                                RAM: Temporary, short-term storage for tasks. In a Ryzen system like this, where the graphics chip and the processor are combined, RAM serves double duty, handling the main memory and the memory for the onscreen graphics.
                                That means it's worth buying faster RAM, but faster RAM is also more expensive.</p><p>
                                Power supply: This heavy brick of a thing converts power from the wall into the power your motherboard and processor require.
                                You'll need to decide on the rest of your components first so you know much muscle your power supply will need. It's ideal to have a little extra juice for any future upgrades.</p><p>
                                Storage: Hard drives (HDDs) and solid-state drives (SSDs) that act as long-term storage. HDDs have more capacity and are cheaper; SSDs are smaller, pricier, but way faster.</p><p>
                                Case: Where all the above components are installed. It's the box, but you'll have to navigate the case's design when routing cables and installing components.
                                Also, be sure to pick a case that fits your motherboard, power supply, and the rest of your components.
						</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<footer class="site-footer" id="marginfoot1">
		<marquee width="100%"><p id="copyright"> @Copyright: PC-KING  </p></marquee>
	</footer>
	</body>
</html>

















