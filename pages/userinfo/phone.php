<!DOCTYPE html>
<?php session_start(); ?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>User information</title>
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
						<li><a href="../blog.php">Blog</a></li>
						<li><a href="../contact.php">Contact</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php
							if (isset($_SESSION["user"])) {
								echo "<li class=\"active\"><a href=\"../user.php\">Welcome, ".$_SESSION["user"]; echo "!</a></li>";
								echo "<li><a href=\"../rendeles.php\">Cart</a></li>";
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
		</nav><br>
		<?php
			$ok1 = 0;
			if (!empty($_POST)) {
				if (isset($_POST["phone"]))
					$phone = $_POST["phone"];
				$nev3 = $_SESSION["user"];
				$db_connection = mysql_connect("localhost", "root", "");
				if (!$db_connection) {
					die("Could not connect to the database!");
				}
				mysql_select_db("webshop", $db_connection);
				$result = mysql_query("UPDATE user SET phone='$phone' WHERE username='$nev3'");
				mysql_close($db_connection);
				$ok1 = 1;
				if($ok1 == 1) {
					if (!isset($_SESSION["user"]) or !strcmp($_SESSION["user"], "")) {
					// Hibauzenet!
					header("Location: index.php");
					}
					else {
						// Session zarasa.
						session_unset();
						session_destroy();
						header("Location: ../login.php");
					}
				}
			}
		?>
		<div class="container">
			<h1>Changing Phone Number: </h1><br>
			<form method="post">
				<div class="form-group">
					<div class="row">
						<div class="col-md-4">
							<input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Your New Phone Number"/> <br>
							<input type="submit" value="Change Phone Number" class="btn btn-primary btn-lg  login-button" /><br><br>
							<div class="alert alert-info">
								<strong>Notice: </strong> You may have to login again after this too see the changes.
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>