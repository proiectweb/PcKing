<?php
	session_start();
	if (!isset($_GET["tipus"])) {
		//header("Location: kategoriak.php");
	}
	else {
		$tipus = $_GET["tipus"];
		switch ($tipus) {
			case "proc":
				$title = "Processors";
				$category = "processor";
				break;
			case "hdd":
				$title = "HDDs";
				$category = "HDD";
				break;
			case "mem":
				$title = "RAMs";
				$category = "RAM";
				break;
			case "video":
				$title = "Videocards";
				$category = "Videocard";
				break;
			case "audio":
				$title = "Soundcards";
				$category = "Soundcard";
				break;
			case "cooler":
				$title = "Coolers";
				$category = "Cooler";
		} // switch
		echo "<html>
			    <head>
				   <meta charset=\"UTF-8\">
				   <title>".$title."</title>
					<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
					<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js\"></script>
					<script src=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\"></script>
					<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css\">
					<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
					<link rel=\"stylesheet\" href=\"../css/bootstrap.css\">
					<link rel=\"stylesheet\" href=\"../css/stilus.css\">
					<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
					<link href=\"assets/css/bootstrap-responsive.css\" rel=\"stylesheet\">
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
		echo "<div class=\"container\"><br><h1><font>".$title."</font></h1><br></div><hr>";
		$db_connection = mysql_connect("localhost", "root", "");
		if (!$db_connection) {
			header("Location: db_error.php");
		}
		mysql_select_db("webshop", $db_connection);
		$result = mysql_query("SELECT * FROM products WHERE category=\"$category\"");
		//echo "<table border=\"1\" align=center cellpadding=8 class=\"table table-striped\">";
		//echo "<tr>
			//<td align=center>Name</td>
			//<td align=center>Price</td>
			//<td align=center>Quantity</td>
			//<td align=center>Category</td>
			//<td align=center>Order</td>
			//</tr>";*/
		//while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
		//	echo "<tr>";
		//	echo "<td>", $row[1],"</td>";
		//	echo "<td align=\"center\">", $row[2],"</td>";
		//	echo "<td align=\"center\">", $row[3],"</td>";
		//	echo "<td align=\"center\">", $row[4],"</td>";
		//	echo "<td align=\"center\"><a href=\"kosar.php?termek=$row[0]&kategoria=$tipus\"><img src=\"img/kosar.png\"></a></td>";
		//	echo "</tr>";
		//}
		//echo "</table>";
		echo "<div class=\"container\">";
		while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
			echo "<div class=\"row\" id=\"rowlata\">";
			echo "<div class=\"col-md-3 col-centered\" >";
			//echo "<img src=\"img/proci/1.jpg\" width=\"220px\" height=\"170px\">";
			echo "<img src=\"../img/proci/".$row[0].".png\" width=\"220px\" height=\"170px\">";
			echo "</div>";
			echo "<div class=\"col-md-3 col-centered\"><br><br><br><h4>";
			echo $row[1];
			echo "</h4><br><br></div>";
			echo "<div class=\"col-md-3 col-centered\"  style=\"border-left:1px solid gray\">";
			echo "<h4>Price: ";
			echo $row[2];
			echo "$</h4><br>";
			echo "<h4>ON STOCK:  ";
			echo $row[3];
			echo "</h4><br>";
			echo "<h4>CATEGORY:  ";
			echo $row[4];
			echo "</h4>";
			echo "</div>";
			echo "<div class=\"col-md-3 col-centered\" >";
			echo "<a href=\"kosar.php?termek=$row[0]&kategoria=$tipus\"><i class=\"fa fa-shopping-cart\" aria-hidden=\"true\" id=\"kosaricon\"></i></a>";
			echo "</div></div>";
		}
		echo "</div>";
		mysql_close($db_connection);
		echo "</div>
		<br>
		<footer class=\"site-footer\">
		<marquee width=\"100%\"><p id=\"copyright\"> @Copyright: PC-KING  </p></marquee>
		</footer></body>
			</html>
			";
	}
?>











































