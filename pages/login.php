<?php session_start(); ?>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/stilus.css">
	</head>
	<body id="body1">
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
							echo "<li class=\"active\"><a href=\"login.php\">Login</a></li>";
							echo "<li><a href=\"regUrlap.php\">Registration</a></li>";
						}
					?>
				</ul>
				</div>
			</div>
		</div>
	</nav>
		<?php
			// Feldolgozza a reg adatokat es elmenti oket az adatbazisba, ha nincs atfedes.
			$ok = 1;
			if (!empty($_POST)) {
				if (isset($_POST["nev"]))
					$nev = $_POST["nev"];
				else
					// Hibauzenet es megall a feldolgozas
					$ok = 0;
				if (isset($_POST["jelszo"]) and $ok == 1)
					$jelszo = $_POST["jelszo"];
				else
					// Hibauzenet es megall a feldolgozas
					$ok = 0;
				if ($ok == 1) {
					// Adatbazis megnyitasa
					$db_connection = mysql_connect("localhost", "root", "");
					if (!$db_connection) {
						die("Couldn't connect to the database!");
					}
					mysql_select_db("webshop", $db_connection);
					// Felhasznalonev ellenorzese.
					$result = mysql_query("SELECT COUNT(*) FROM user WHERE username = '$nev'");
					$row = mysql_fetch_array($result, MYSQL_NUM);
					// Ha mar szerepel, hibauzenet
					if ($row[0] == 0) {
						# Hibauzenetet is kiir.
						echo "Wrong user!";
						$ok = 0;
					}
					// Jelszo ellenorzese.
					$result = mysql_query("SELECT password FROM user WHERE username = '$nev'");
					$row = mysql_fetch_array($result, MYSQL_NUM);
					if (strcmp(sha1($jelszo), $row[0])) {
						// Hibauzenet.
						echo "Wrong password!";
						$ok = 0;
					}
					if ($ok == 1) {
						// Felhasznalo beszurasa az adatbazisba.
						$_SESSION["user"] = $nev;
						header("Location: ../index.php?".session_name()."=".session_id());
					}
					// Adatbazis bezarasa.
					mysql_close($db_connection);
				}
			}
		?>
		<div class="container">
			<div class="row">
				<div class="col-md-3" id="marginy">
				<div class="main-login main-center">
					<form name="urlap" method="post" class="form-horizontal">
					
						<div id="form-group">
							<label class="cols-sm-2 control-label">Username</label><br />
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
								<input type="text" name="nev" class="form-control" id="name" placeholder="Enter your Username"/>
							</div>
							<?php if (!$ok) { ?>
								<img src="img/hiba.png" /><br />
							<?php } else { ?>
								<br />
							<?php } ?>
							<label>Password</label><br />
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
								<input type="password" name="jelszo" class="form-control" id="name" placeholder="Enter your Password"/><br>
							</div>
							<!--<input type="submit" value="Login" />-->
							<div class="form-group ">
								<input type="submit" value="Login" class="btn btn-primary btn-lg btn-block login-button" id="marginbutt"/>
							</div>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>



























