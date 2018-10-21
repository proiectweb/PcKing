<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Registration</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/stilus.css">
		<!-- <link rel="stylesheet" href="login.css">-->
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
							echo "<li><a href=\"rendeles.php\">Cart</a></li>";
							echo "<li><a href=\"Logout.php\">Logout</a></li>";
						}
						else{
							echo "<li><a href=\"login.php\">Login</a></li>";
							echo "<li class=\"active\"><a href=\"regUrlap.php\">Registration</a></li>";
						}
					?>
				</ul>
			</div>
			</div>
		</div>
	</nav>
	<?php
			$ok = 1;
			if (!empty($_POST)) {
				if (isset($_POST["nev"]))
					$nev = $_POST["nev"];
				else
					$ok = 0;
				if (isset($_POST["jelszo"]) and $ok == 1)
					$jelszo = $_POST["jelszo"];
				else
					$ok = 0;
				if (isset($_POST["megerosites"]) and $ok == 1)
					$megerosites = $_POST["megerosites"];
				else{
					$ok = 0;
					//header(location nem egyezik a jatek)
				}
				if (strcmp($jelszo, $megerosites) and $ok == 1)
					$ok = 0;
				if (isset($_POST["email"]) and $ok == 1)
					$email = $_POST["email"];
				else
					$ok = 0;
				if (isset($_POST["name"]) and $ok == 1)
					$name = $_POST["name"];
				if (isset($_POST["lakcim"]) and $ok == 1)
					$lakcim = $_POST["lakcim"];
				if (isset($_POST["telefon"]) and $ok == 1)
					$telefon = $_POST["telefon"];
				if ($ok == 1) {
					$forras = $_POST["lista"];
					$db_connection = mysql_connect("localhost", "root", "");
					if (!$db_connection) {
						die("Could not connect to the database!");
					}
					mysql_select_db("webshop", $db_connection);
					// Felhasznalonev keresese
					$result = mysql_query("SELECT COUNT(*) FROM user WHERE username = '$nev'");
					$row = mysql_fetch_array($result, MYSQL_NUM);
					if ($row[0] != 0) {
						header("Location: hiba.php?tipus1=letezik");
						$ok = 0;
					}
					if ($ok == 1) {
						// Felhasznalo beszurasa az adatbazisba.
						$hash_pwd = sha1($jelszo);
						$result = mysql_query("INSERT INTO user (username, password, email, name, address, phone) VALUES ('$nev', '$hash_pwd', '$email', '$name', '$lakcim', '$telefon')");
						// Atiranyitas a fooldalra.
						header("Location: ../index.php");
					}
					// Adatbazis bezarasa.
					mysql_close($db_connection);
				}
			}
		?>
		<!--<img src="img/registration1.png" width="100%" height="200px"/>-->
		<div class="container">
		<div class="row">
		<div class="col-md-3" id="marginx">
				<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="#">
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Your Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Your Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="nev" class="cols-sm-2 control-label">Username</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="nev" id="username"  placeholder="Enter your Username"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="megerosites" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="jelszo" id="password"  placeholder="Enter your Password"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="megerosites" class="cols-sm-2 control-label">Confirm Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="megerosites" id="confirm"  placeholder="Confirm your Password"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="lakcim" class="cols-sm-2 control-label">Address</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="lakcim" id="confirm"  placeholder="Address"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="telefon" class="cols-sm-2 control-label">Phone Number</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-phone-square" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="telefon" id="confirm"  placeholder="Phone"/>
								</div>
							</div>
						</div>

						<div class="form-group ">
						<input type="submit" value="Registration" class="btn btn-primary btn-lg btn-block login-button" />
						</div>
					</form>
				</div>
			</div>
			</div>
			</div>
		</div><!--
		<div class="container">	
			<div class="row">
				<div class="col-md-2">
				<h1>REGISTRATION</h1>	
					<form name="urlap" method="post">
						<div id="regUrlap">
							<label>Username</label><br />
							<input type="text" name="nev" />
							<?php if (!$ok) { ?>
								<img src="img/hiba.png" /><br />
							<?php } else { ?>
								<br />
							<?php } ?>
							ok<label>Password</label><br />
							ok<input type="password" name="jelszo" /><br />
							ok<label>Password again</label><br />
							ok<input type="password" name="megerosites" /><br />
							ok<label>E-mail</label><br />
							ok<input type="text" name="email" /><br />
							ok<label>Name</label><br />
							ok<input type="text" name="name" /><br />
							<label>Address</label><br />
							<input type="text" name="lakcim" /><br />
							<label>Phone</label><br />
							<input type="text" name="telefon" /><br />
							<label>Where did you hear about PCKING?</label><br />
							<select name="lista">
								<option value="elso">From friends</option>
								<option value="masodik">In an advertismet</option>
								<option value="harmadik">Other</option>
							</select><br /><br />
							<input type="submit" value="Registration" />
						</div>
					</form>
				</div>
				<div class="col-md-10"></div>
			</div>
		</div>-->
					<br>
		
	</body>
</html>