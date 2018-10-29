<?php
	session_start();
	if (!isset($_SESSION["user"]) or !strcmp($_SESSION["user"], "")) {
		//header("Location: kategoriak.php");
		echo "<head>
		<meta charset=\"UTF-8\">
		<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
		<title>Error</title>
		<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js\"></script>
		<script src=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\"></script>
		<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css\">
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link rel=\"stylesheet\" href=\"css/bootstrap.css\">
		<link rel=\"stylesheet\" href=\"css/stilus.css\">
	</head>
	<body bgcolor=\"#3A7285\">
	<nav class=\"navbar-inverse\">
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
					<li><a href=\"kategoriak.php\">Products</a></li>
					<li><a href=\"blog.php\">Blog</a></li>
					<li><a href=\"contact.php\">Contact</a></li>
				</ul>
				<ul class=\"nav navbar-nav navbar-right\">";	
				echo "<li><a href=\"login.php\">Login</a></li>";
	echo "<li><a href=\"regUrlap.php\">Registration</a></li>";					
	echo"</ul>
			</div>
			</div>
		</div>
	</nav>
	<div class=\"container\">
	<h1>You are not logged in!</h1><hr>
	<h3>Please log in before putting a product in the cart.</h3>
	<h3>Or <a href=\"regUrlap.php\">register</a> if you don't have an account yet!</h3>
	</div>
	</body>";
	}
	else {
		$db_connection = mysql_connect("localhost", "root", "");
		mysql_select_db("webshop", $db_connection);
		
		if (!$db_connection) {
			header("Location: db_error.php");
		}
		if (!isset($_SESSION["cart"]))
			$_SESSION["cart"] = array();
		if (!isset($_GET["termek"])) {
			header("Location: hiba.php?tipus1=1");
			die("There is no product selected!");
		}
		else {
			$user = $_SESSION["user"];
			$termek = $_GET["termek"];
			if (isset($_GET["add"])) {
				$result = mysql_query("SELECT quantity FROM products WHERE id=$termek");
				$row = mysql_fetch_array($result, MYSQL_NUM);
				if (intval($row[0]) - intval($_GET["add"]) < 0 ) {
					header("location hiba.php?tipus1=2");
					die("Product out of stock!");
				}
				else {
					$cart = $_SESSION["cart"];
					$new_cart = array();
					foreach ($cart as &$element) {
						$items = explode(",", $element);
						if (!strcmp($items[0], $termek)) {
							$items[1] = strval(intval($items[1]) + intval($_GET["add"]));
							array_push($new_cart, $items[0].",".$items[1]);
						}
						else
							array_push($new_cart, $element);
					}
					$uj_darab = intval($row[0]) - intval($_GET["add"]);
					$result = mysql_query("UPDATE products SET quantity=$uj_darab WHERE id=$termek");
					$_SESSION["cart"] = $new_cart;
				}
			}
			else if (isset($_GET["sub"])) {
				// Termek visszautasitasa.
				// Van-e meg ilyen termek?
				$result = mysql_query("SELECT quantity FROM products WHERE id=$termek");
				$row = mysql_fetch_array($result, MYSQL_NUM);
				$cart = $_SESSION["cart"];
				$ok = 1;
				foreach ($cart as &$element) {
					$items = explode(",", $element);
					if (!strcmp($items[0], $termek) && intval($items[1]) < intval($_GET["sub"])) {
						$ok = 0;
						die("There is not enough product in the cart");
					}
				}
				if ($ok == 1) {
					$cart = $_SESSION["cart"];
					$new_cart = array();
					foreach ($cart as &$element) {
						$items = explode(",", $element);
						if (!strcmp($items[0], $termek)) {
							$items[1] = strval(intval($items[1]) - intval($_GET["sub"]));
							if (intval($items[1]) != 0)
								array_push($new_cart, $items[0].",".$items[1]);
						}
						else
							array_push($new_cart, $element);
					}
					$uj_darab = intval($row[0]) + intval($_GET["sub"]);
					$result = mysql_query("UPDATE products SET quantity=$uj_darab WHERE id=$termek");
					$_SESSION["cart"] = $new_cart;
				}
			}
			else {
				// Uj termek kerul a kosarba.
				// Adatbazis ellenorzese:
				//	1. Van meg a termekbol?
				//	2. Raktarkeszlet csokkentese.
				$result = mysql_query("SELECT quantity FROM products WHERE id=$termek");
				$row = mysql_fetch_array($result, MYSQL_NUM);
				if (intval($row[0]) == 0) {
					die("Product out of stock!");
				}
				else {
					// Van meg a termekbol, csokkentjuk a darabszamot az adatbazisban
					$ujDarab = intval($row[0]) - 1;
					$result = mysql_query("UPDATE products SET quantity=$ujDarab WHERE id=$termek");
				}

				// Kosar valtozo frissitese
				$cart = $_SESSION["cart"];
				$new_cart = array();
				$volt = False;
				// A kosar adatstrukturaja: { [<termekkod1>,<mennyiseg1>],[<termekkod2>,<mennyiseg2>],...,[<termekkodn>,<mennyisegn>] }
				foreach ($cart as &$elem) {
					$info = explode(",", $elem);
					// Mar van ilyen termekunk.
					if (!strcmp($info[0], $termek)) {
						// Frissul a rendelt mennyiseg
						$info[1] = strval(intval($info[1]) + 1);
						array_push($new_cart, $info[0].",".$info[1]);
						$volt = True;
					}
					else
						array_push($new_cart, $elem);
				}
				if ($volt == False) {
					// Meg nincs ilyen termekunk.
					$new_cart = $cart;
					$mennyiseg = 1;
					array_push($new_cart, $termek.",".$mennyiseg);
				}
				$_SESSION["cart"] = $new_cart;
			}
		}
		
		// Bezarjuk az adatbazis kapcsolatot
		mysql_close($db_connection);
		
		if (isset($_GET["kategoria"])) {
			$tipus = $_GET["kategoria"];
			header("Location: termekek.php?tipus=$tipus");
		}
		else {
			header("Location: rendeles.php");
		}
	}
?>