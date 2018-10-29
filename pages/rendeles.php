<?php
	session_start();
	if (!isset($_SESSION["user"]) or !strcmp($_SESSION["user"], "")) {
		//header("Location: kategoriak.php");
		echo "Please login before you order!";
	}
	else {
		echo "<html>
			    <head>
				   <meta charset=\"UTF-8\">
				   <title>Cart</title>
				   <link rel=\"stylesheet\" href=\"../css/bootstrap.css\">
				   <link rel=\"stylesheet\" href=\"../css/stilus.css\">
				   <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
				</head>
				<body>";
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
			echo"</ul>
					</div>
					</div>
				</div>
			</nav>";
			  echo "<div class=\"container\"><br><h1>Your shopping cart</h1><br>";
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
				echo "<td align=\"center\"><a href=\"kosar.php?termek=$items[0]&add=1\">+</a></td>";
				echo "<td align=\"center\"><a href=\"kosar.php?termek=$items[0]&sub=1\">-</a></td>";
				echo "</tr>";
				$sum += intval($row[1]) * intval($items[1]);
			}
			echo "<tr>";
			echo "<td align=\"center\">Total</td>";
			echo "<td colspan=\"2\" align=\"center\">".strval($sum)."</td>";
			echo "</tr>";
			echo "</table>";
			echo "<br>";
			//echo "<center><form action=\"befejezes.php\"><input type=\"submit\" value=\"Finalization\"></form></center>";
			echo "<center><form action=\"befejezes.php\"><input type=\"submit\" value=\"Finalization\" class=\"btn btn-primary btn-lg  login-button\" />";
		}
		// Bezarjuk az adatbazis kapcsolatot
		mysql_close($db_connection);
		echo "</body>
			</html>
			";
	}
?>