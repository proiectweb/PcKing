<?php
	session_start();
	if (!isset($_SESSION["user"]) or !strcmp($_SESSION["user"], "")) {
		echo "You are not logged in!";
	}
	else {
		echo "<html>
			   <head>
				<meta charset=\"UTF-8\">
				<title>User</title>
				<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
				<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js\"></script>
				<script src=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\"></script>
				<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css\">
				<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
				<link rel=\"stylesheet\" href=\"../css/bootstrap.css\">
				<link rel=\"stylesheet\" href=\"../css/stilus.css\">
				</head>
				<body>
			";
			echo "<nav class=\"navbar-inverse\">
				<!-- Logo --> 
				<div class=\"container\">
					<div class=\"navbar-header\">
						<button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#mainNavBar\">
							<span class=\"icon-bar\"></span>
							<span class=\"icon-bar\"></span>
							<span class=\"icon-bar\"></span>
						</button>
						<a href=\"../index.php\" class=\"navbar-brand\">PC-KING</a>
					</div>
					<!-- menu --> 
					<div class=\"collapse navbar-collapse\" id=\"mainNavBar\">
					<div>
						<ul class=\"nav navbar-nav\">
							<li><a href=\"../index.php\">Home</a></li>
							<li   class=\"active\"><a href=\"kategoriak.php\">Products</a></li>
							<li><a href=\"blog.php\">Blog</a></li>
							<li><a href=\"contact.php\">Contact</a></li>
						</ul>
						<ul class=\"nav navbar-nav navbar-right\">";
								if (isset($_SESSION["user"])) {
									echo "<li><a href=\"user.php\">Welcome, ".$_SESSION["user"]; echo "!</a></li>";
									echo "<li><a href=\"rendeles.php\">Cart</a></li>";
									echo "<li><a href=\"Logout.php\">Logout</a></li>";
								}
								else{
									echo "<li><a href=\"login.php\">Login</a></li>";
									echo "<li><a href=\"regUrlap.php\">Registration</a></li>";
								}
			echo"</ul>
					</div>
					</div>
				</div>
			</nav>";
			echo "<div class=\"container\"><br><h1>Thank you for your order!</h1><br>";
		// Kilistazzuk a kosar tartalmat.
		if (!isset($_SESSION["cart"]))
			echo "The cart is empty!";
		else {
			$kosar = $_SESSION["cart"];
			$db_connection = mysql_connect("localhost", "root", "");
			mysql_select_db("webshop", $db_connection);
			echo "<table border=\"1\" align=center cellpadding=8 class=\"table table-striped\">";
			echo "<tr><td align=\"center\">Products name</td><td align=\"center\">Quantity</td><td align=\"center\">Price</td></tr>";
			$sum = 0;
			foreach ($kosar as &$elem) {
				$items = explode(",", $elem);
				$result = mysql_query("SELECT name, price FROM products WHERE id=$items[0]");
				$row = mysql_fetch_array($result, MYSQL_NUM);
				echo "<tr>";
				echo "<td>".$row[0]."</td>";
				echo "<td align=\"center\">".$items[1]."</td>";
				echo "<td align=\"center\">".strval(intval($row[1]) * intval($items[1]))."</td>";
				echo "</tr>";
				$sum += intval($row[1]) * intval($items[1]);
			}
			echo "<tr>";
			echo "<td align=\"center\">Total</td>";
			echo "<td colspan=\"2\" align=\"center\">".strval($sum)."</td>";
			echo "</tr>";
			echo "</table>";
			echo "<br>";
			$nev1 = $_SESSION["user"];
			/* $db_connection = mysql_connect("localhost", "root", "");
			if (!$db_connection) {
				header("Location: db_error.php");
			}
			mysql_select_db("webshop", $db_connection); */
			$result = mysql_query("SELECT * FROM user WHERE username=\"$nev1\"");
			$row = mysql_fetch_array($result, MYSQL_NUM);
			//personal jatek
			echo "<div class=\"container\">
					<h3>Profile information</h3><hr>
					<div class=\"row\">
						<div class=\"col-md-6\">
							<div class=\"row\">
								<div class=\"col-md-3\">
									<span><i class=\"fa fa-users fa\" aria-hidden=\"true\" id=\"fasize3\"></i></span><br>
									<br>
									<span><i class=\"fa fa-envelope fa\" aria-hidden=\"true\" id=\"fasize3\"></i></span><br>
									<br>
								</div>
								<div class=\"col-md-9\">
									<h4>Personal name: </h4>";
											echo "<h4>", $row[4], "</h4><br>";
										echo"
									<h4 id=\"lastmarg\">E-mail: </h4>";
											echo "<h4>", $row[3], "</h4>";
						echo"
								</div>
							</div>
						</div>
						<div class=\"col-md-6\">
							<div class=\"row\">
								<div class=\"col-md-3\">
									<span><i class=\"fa fa-map-marker\" aria-hidden=\"true\" id=\"fasize3\"></i></span><br>
									<br>
									<span><i class=\"fa fa-phone-square\" aria-hidden=\"true\" id=\"fasize3\"></i></span><br>
									<br>
								</div>
								<div class=\"col-md-9\">";
									echo"
									<h4>Address: </h4>";
											echo "<h4>", $row[5], "</h4><br>";
										echo"
									<h4 id=\"lastmarg\">Phone Number: </h4>";
											echo "<h4>", $row[6], "</h4>";
									echo"
								</div>
						</div>
					</div>
					<br>
			</div>";
			//personal jatek
			$rendeles_id = uniqid($_SESSION["user"], true);
			$nev=$_SESSION["user"];
			$query = "INSERT INTO orders (id, username, product, quantity, starttime) VALUES ";
			foreach ($kosar as &$elem) {
				$items = explode(",", $elem);
				$termek = $items[0];
				$mennyiseg = $items[1];
				$query .= "(\"$rendeles_id\", \"$nev\", $termek, $mennyiseg, NOW()),";
			}
			$query = rtrim($query, ",");
			mysql_query($query);
			
			unset($_SESSION["cart"]);
		}
		// Bezarjuk az adatbazis kapcsolatot
		mysql_close($db_connection);
		echo "<br></div>";
		echo "
		<br>
		<div class=\"container\">
			<div class=\"alert alert-success\">
				<strong>Thank you for your order! </strong> Our team will make every effort to ensure your product is delivered to you on time and in great condition.
			</div>
		</div>
		</div>
		</body>
			</html>
			";
	}
?>