<?php
	echo	"<html>
				<head>
				<meta charset=\"UTF-8\">
				<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
				<title>Error</title>
				<script src=https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js></script>
				<script src=http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js></script>
				<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
				<link rel=\"stylesheet\" href=\"../css/bootstrap.css\">
				<link rel=\"stylesheet\" href=\"../css/stilus.css\">
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
				<div>
				<div>
					<ul class=\"nav navbar-nav\">
						<li><a href=\"../index.php\">Home</a></li>
						<li><a href=\"kategoriak.php\">Products</a></li>
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
					echo "</ul>
				</div>
				</div>
			</div>
		</nav>
		";
		$tipus1 = $_GET["tipus1"];
		switch ($tipus1) {
			case "termek":
				$title = "termek";
				$category = "termek";
				break;
			case "nincs":
				$title = "nincs";
				$category = "nincs";
				break;
			case "jelszohiany":
				$title = "jelszohiany";
				$category = "jelszohiany";
				break;
			case "megerosites":
				$title = "megerosites";
				$category = "megerosites";
				break;
			case "email":
				$title = "email";
				$category = "email";
				break;
			case "letezik":
				$title = "letezik";
				$category = "letezik";
				break;
		}
		 if (isset($_GET["tipus1"])) {
				if(!strcmp($tipus1, "termek")){
					echo "
					<p align=center><img src=\"img/error.png\"></p><br>
					<p align=center><font color=white>There is no product selected</p><br>
					<p align=center><a href=\"index.php\"><img src=\"img/menu.png\"></a></p><br>";
				}
				if(!strcmp($tipus1, "nincs")){
					echo "
					<p align=center><img src=\"img/error.png\"></p><br>
					<p align=center><font color=white>The selected product is out of stock</p><br>
					<p align=center><a href=\"index.php\"><img src=\"img/menu.png\"></a></p><br>";
				}
				if($tipus1=jelszohiany){
					echo "<p align=center><img src=\"img/error.png\"></p><br>
					<p align=center><font color=white>Missing password!</p><br>
					<p align=center><a href=\"index.php\">Back to the homepage</a></p><br>
					<p align=center><a href=\"regUrlap.php\">Back to the registration page</a></p>";
				}
				if($tipus1=megerosites){
					echo "<p align=center><img src=\"img/error.png\"></p><br>
					<p align=center><font color=white>Password clarification missing!</p><br>
					<p align=center><a href=\"index.php\">Back to Homepage</a></p><br>
					<p align=center><a href=\"regUrlap.php\">Back to registration page</a></p>";
				}
				if($tipus1=email){
					echo "<p align=center><img src=\"img/error.png\"></p><br>
					<p align=center><font color=white>Email missing!</p><br>
					<p align=center><a href=\"index.php\">Homepage</a></p><br>
					<p align=center><a href=\"regUrlap.php\">Registration page</a></p>";
				}
				if($tipus1=letezik){
					echo "<p align=center><img src=\"img/error.png\"></p><br>
					<p align=center><font color=white>Username already exists</p><br>
					<p align=center><a href=\"index.php\">Homepage</a></p><br>
					<p align=center><a href=\"regUrlap.php\">Registration page</a></p>";
				}
			}
echo "</body></html>";
?>
