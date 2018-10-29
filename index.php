<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>PC-KING</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/stilus.css">
		<link rel="stylesheet" href="css/responsiveslides.css">
		<link rel="stylesheet" href="css/themes.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="js/responsiveslides.js"></script>
		<script src="js/responsiveslides.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/stylewow.css" />
		<script type="text/javascript" src="js/jquerywow.js"></script>
	</head>
	<body bgcolor="#3A7285">
	<nav class="navbar-inverse">
		<!-- Logo --> 
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="index.php" class="navbar-brand">PC-KING</a>
			</div>
		<!-- menu --> 
			<div class="collapse navbar-collapse" id="mainNavBar">
				<div>
					<ul class="nav navbar-nav">
						<li class="active"><a href="">Home</a></li>
						<li><a href="pages/kategoriak.php">Products</a></li>
						<li><a href="pages/blog.php">Blog</a></li>
						<li><a href="pages/contact.php">Contact</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php
							if (isset($_SESSION["user"])) {
								echo "<li><a href=\"pages/user.php\">Welcome, ".$_SESSION["user"]; echo "!</a></li>";

                                if (!isset($_SESSION["cart"]))
                                    echo "<li><a href=\"pages/rendeles.php\">Items in cart: 0</a></li>";
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

                                    echo "<li><a href=\"pages/rendeles.php\">Items in cart: $sum</a></li>";
                                }

								echo "<li><a href=\"pages/Logout.php\">Logout</a></li>";
							}
							else{
								echo "<li><a href=\"pages/login.php\">Login</a></li>";
								echo "<li><a href=\"pages/regUrlap.php\">Registration</a></li>";
							}
						?>
					</ul>
				</div>
			</div>
		</div>
	</nav>
	<br>
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
		<li><img src="img/1.bmp" alt="1" title="1" id="wows1_0"/></li>
		<li><img src="img/2.bmp" alt="2" title="2" id="wows1_1"/></li>
		<li><img src="img/3.bmp" alt="3" title="3" id="wows1_2"/></li>
		<li><img src="img/4.bmp" alt="4" title="4" id="wows1_3"/></li>
	</ul></div>
	<div class="ws_bullets"><div>
		<a href="#" title="1"><span><img src="img/t1.jpg" alt="1"/>1</span></a>
		<a href="#" title="2"><span><img src="img/t2.jpg" alt="2"/>2</span></a>
		<a href="#" title="3"><span><img src="img/t3.jpg" alt="3"/>3</span></a>
		<a href="#" title="4"><span><img src="img/t4.jpg" alt="4"/>4</span></a>
	</div></div><div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.com">bootstrap carousel</a> by WOWSlider.com v8.7</div>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="js/wowslider.js"></script>
	<script type="text/javascript" src="js/scriptwow.js"></script><br>

	<div class="container">
			<h2 align="center" id="tuna">- Welcome to PC-KING -</h2>
			<h4 align="center">WE WILL HELP YOU TO BUILD THE PC OF YOUR DREAMS!</h4>
	</div><br>
	<br>
	<div class="container">
			<div class="row">
				<div class="col-md-1">
					<h4> FEATURES </h4>
				</div>
				<div class="col-md-11">
					<hr>
				</div>
			</div>
	</div><br>
	<br>
	<div class="container">
		<div class="row programs text-center">
			<div class="col-lg-4 col-sm-6 col-md-3 col-xs-10 ">
				<span class="fa fa-truck"></span>
				<br><br>
				<p class="lead "> FAST DELIVERY </p>
				<p class="img_padding paragraph_padding" id="lata">
					Our partners will make every effort to ensure your product is delivered to you on time and in great condition.
				</p>
			</div>
			<div class="col-lg-4 col-sm-6 col-md-3 col-xs-10 ">
				<span class="fa fa-credit-card-alt"></span>
				<br><br>
				<p class="lead "> CREDIT CARD POSSIBILITY</p>
				<p class="img_padding paragraph_padding" id="lata">
					Now you can use your credit card for the purchases on PC-KING.
				</p>
			</div>
			<div class="col-lg-4 col-sm-6 col-md-3 col-xs-10 ">
				<span class="fa fa-repeat"></span>
				<br><br>
				<p class="lead ">RETURN POLICY</p>
				<p class="img_padding paragraph_padding" id="lata">
					You can return your product to our store within 3 months for a 100% refund.
				</p>
			</div>
		</div>
	</div>
	<br><br>
	<div class="container">
			<div class="row">
				<div class="col-md-1">
					<h4> NEWS/BLOG </h4>
				</div>
				<div class="col-md-11">
					<hr>
				</div>
			</div>
	</div><br>
		<br>
		<div class="container">
			<div class="row">
				<div class="container-fluid">
					<div class="col-md-4 col-centered">
						<a href="pages/blogposts/1.php">
							<img src="img/blog1.png" class="center-block img-responsive" width="345px" height="190px"></a><br>
						<div class="row" id="newsnblogrow">
							<div class="col-md-2" style="border-right:1px solid gray"><h4 id="newsnbloggreyfont">OCT</h4><h4 id="newsnbloggreyfont">12</h4></div>
							<div class="col-md-10" ><h4>HOW TO BUILD A PC</h4></div>
							<div class="row" id="newsnblogrow1">
								<div class="col-md-12">
									<p>
                                        These days, most consumers have only ever bought prefab systems, no assembly required. However, many gamers and computer hobbyists still prefer to roll their own boxes.
                                        Doing so means you maintain total control over how the computer turns out...
									</p>
								</div>
							</div>
						</div>
						<p id="event"><a href="pages/blogposts/1.php">CONTINUE READING ></a></p>
					</div>
					<div class="col-md-4 col-centered">
						<a href="pages/blogposts/2.php">
							<img src="img/blog2.png" class="center-block img-responsive" width="345px" height="190px"></a><br>
						<div class="row" id="newsnblogrow">
							<div class="col-md-2" style="border-right:1px solid gray"><h4 id="newsnbloggreyfont">OCT</h4><h4 id="newsnbloggreyfont">07</h4></div>
							<div class="col-md-10" ><h4>RAZER MOUSE + MOUSEPAD GIFT</h4></div>
							<div class="row"  id="newsnblogrow1">
								<div class="col-md-12">
									<p>
										The famous brand "Razer" just became a sponsor of our webpage! From now on, every third order from the same account will get a gift:
										A "Megasoma 2" Razer mousepad and a Brand new "Taipan" Razer gaming mice. . .
									</p>
								</div>
							</div>
						</div>
						<p id="event"><a href="pages/blogposts/2.php">CONTINUE READING ></a></p>
					</div>
					<div class="col-md-4 col-centered">
						<a href="pages/blogposts/3.php">
							<img src="img/blog3.png" class="center-block" width="345px" height="190px"></a><br>
						<div class="row" id="newsnblogrow">
							<div class="col-md-2" style="border-right:1px solid gray"><h4 id="newsnbloggreyfont">OCT</h4><h4 id="newsnbloggreyfont">17</h4></div>
							<div class="col-md-10" ><h4>PC-KING IS 5 YEARS OLD</h4></div>
							<div class="row"  id="newsnblogrow1">
								<div class="col-md-12">
									<p>
										Today, on 17.10.2018, "PC-KING" is celebrating it's 5th birthday! The company started as a little pc shop in Targu Mures, Roumania. . .
									</p>
								</div>
							</div>
						</div>
						<p id="event"><a href="pages/blogposts/3.php">CONTINUE READING ></a></p>
					</div>
				</div>
			</div>
		</div><br><br>
	<div class="container">
			<div class="row">
				<div class="col-md-1">
					<h4> SPONSORS </h4>
				</div>
				<div class="col-md-11">
					<hr>
				</div>
			</div>
	</div><br>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
			<br>
				<a href="http://www.amd.com" target="_blank">
					<img src="img/logo1.png" class="img-responsive grayimg" width="255px" height="140px">
				</a>
			</div>
			<div class="col-md-3">
				<a href="http://www.intel.com" target="_blank">
					<img src="img/logo2.png" class="img-responsive grayimg" width="255px" height="140px">
				</a>
			</div>
			<div class="col-md-3">
			<br>
				<a href="http://www.razerzone.com" target="_blank">	
					<img src="img/logo3.png" class="img-responsive grayimg" width="255px" height="140px">
				</a>
			</div>
			<div class="col-md-3">
			<br>
				<a href="http://www.samsung.com" target="_blank">
					<img src="img/logo4.png" class="img-responsive grayimg" width="255px" height="140px">
				</a>
			</div>
		</div>
	</div>
	<br>
	<footer class="site-footer">
		<marquee width="100%"><p id="copyright"> @Copyright: PC-KING </p></marquee>
	</footer>
	</body>
</html>


























