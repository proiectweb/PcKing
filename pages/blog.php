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
						<li><a href="kategoriak.php">Products</a></li>
						<li   class="active"><a href="blog.php">Blog</a></li>
						<li><a href="contact.php">Contact</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php
							if (isset($_SESSION["user"])) {
								echo "<li><a href=\"user.php\">Welcome, ".$_SESSION["user"]; echo "!</a></li>";
                                if (!isset($_SESSION["cart"]))
                                    echo "<li><a href=\"rendeles.php\">Items in cart: 0</a></li>";
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

                                    echo "<li><a href=\"rendeles.php\">Items in cart: $sum</a></li>";
                                }
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
			<h1>Blog Posts</h1>
		</div>
		<hr>
		<br><br>
		<div class="container">
			<div class="row">
					<div class="col-md-4 col-centered">
						<a href="blogposts/1.php">
						<img src="../img/blog1.png" class="center-block img-responsive" width="345px" height="190px"></a><br>
						<div class="row" id="newsnblogrow">
							<div class="col-md-2" style="border-right:1px solid gray"><h4 id="newsnbloggreyfont">OCT</h4><h4 id="newsnbloggreyfont">12</h4></div>
							<div class="col-md-10" ><h4>HOW TO BUILD A PC</h4></div>
							<div class="row" id="newsnblogrow1">
								<div class="col-md-12">
									<p id="lft">
                                        These days, most consumers have only ever bought prefab systems, no assembly required. However, many gamers and computer hobbyists still prefer to roll their own boxes.
                                        Doing so means you maintain total control over how the computer turns out...
									</p>
								</div>
							</div>
						</div>
						<p id="event"><a href="blogposts/1.php">CONTINUE READING ></a></p>
					</div>
					<div class="col-md-4 col-centered">
						<a href="blogposts/2.php">
						<img src="../img/blog2.png" class="center-block img-responsive" width="345px" height="190px"></a><br>
						<div class="row" id="newsnblogrow">
							<div class="col-md-2" style="border-right:1px solid gray"><h4 id="newsnbloggreyfont">OCT</h4><h4 id="newsnbloggreyfont">07</h4></div>
							<div class="col-md-10" ><h4>RAZER MOUSE + MOUSEPAD GIFT</h4></div>
							<div class="row"  id="newsnblogrow1">
								<div class="col-md-12">
									<p id="lft">
										The famous brand "Razer" just became a sponsor of our webpage! From now on, every third order from the same account will get a gift:
										A "Megasoma 2" Razer mousepad and a Brand new "Taipan" Razer gaming mice. . .
									</p>
								</div>
							</div>
						</div>
						<p id="event"><a href="blogposts/2.php">CONTINUE READING ></a></p>
					</div>
					<div class="col-md-4 col-centered">
						<a href="blogposts/3.php">
						<img src="../img/blog3.png" class="center-block" width="345px" height="190px"></a><br>
						<div class="row" id="newsnblogrow">
							<div class="col-md-2" style="border-right:1px solid gray"><h4 id="newsnbloggreyfont">OCT</h4><h4 id="newsnbloggreyfont">17</h4></div>
							<div class="col-md-10" ><h4>PC-KING IS 5 YEARS OLD!</h4></div>
							<div class="row"  id="newsnblogrow1">
								<div class="col-md-12">
									<p id="lft">
										Today, on 17.10.2018, "PC-KING" is celebrating it's 5th birthday! The company started as a little pc shop on the date of
										17.10.2013 in Targu Mures, Roumania. . .
									</p>
								</div>
							</div>
						</div>
						<p id="event"><a href="blogposts/3.php">CONTINUE READING ></a></p>
					</div>
			</div><br>
			<br>
			<div class="row">
					<div class="col-md-4 col-centered">
						<a href="blogposts/4.php">
						<img src="../img/addr.png" class="center-block img-responsive" width="345px" height="190px"></a><br>
						<div class="row" id="newsnblogrow">
							<div class="col-md-2" style="border-right:1px solid gray"><h4 id="newsnbloggreyfont">SEP</h4><h4 id="newsnbloggreyfont">22</h4></div>
							<div class="col-md-10" ><h4>OUR SHOP HAS A NEW ADDRESS!</h4></div>
							<div class="row" id="newsnblogrow1">
								<div class="col-md-12">
									<p id="lft">
										The address of our new shop is: Str. Libertatii, nr. 1, Targu Mures, jud. Mures, Roumania.
									</p>
								</div>
							</div>
						</div>
						<p id="event"><a href="blogposts/4.php">CONTINUE READING ></a></p>
					</div>
					<div class="col-md-4 col-centered">
						<a href="blogposts/5.php">
						<img src="../img/award.png" class="center-block img-responsive" width="345px" height="190px"></a><br>
						<div class="row" id="newsnblogrow">
							<div class="col-md-2" style="border-right:1px solid gray"><h4 id="newsnbloggreyfont">OCT</h4><h4 id="newsnbloggreyfont">11</h4></div>
							<div class="col-md-10" ><h4>WE WON TEAMBUILDER EVENT.</h4></div>
							<div class="row"  id="newsnblogrow1">
								<div class="col-md-12">
									<p id="lft">
										There are many different reasons why companies use team building activities. 
										A small sampling of these reasons include: Improving communication, boosting morale, motivation, ice breakers to help get 
										to know each other better. . .
									</p>
								</div>
							</div>
						</div>
						<p id="event"><a href="blogposts/5.php">CONTINUE READING ></a></p>
					</div>
			</div>
		</div>
	<footer class="site-footer navbar-bottom">
		<marquee width="100%"><p id="copyright"> @Copyright: PC-KING </p></marquee>
	</footer>
	</body>
</html>