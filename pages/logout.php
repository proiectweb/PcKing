<?php session_start(); ?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Login</title>
		<link rel="stylesheet" href="css/stilus.css" type="text/css" />
	</head>
	<body background="img/sad.jpg">
	<?php
			if (!isset($_SESSION["user"]) or !strcmp($_SESSION["user"], "")) {
				header("Location: index.php");
			}
			else {
				session_unset();
				session_destroy();
				header("Location: ../index.php");
			}
		?>
		<p align="center"><img src="img/regisztracio.png" /></p>
	</body>
</html>