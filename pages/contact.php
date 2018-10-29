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
                    <li><a href="blog.php">Blog</a></li>
                    <li   class="active"><a href="contact.php">Contact</a></li>
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
    <h1>Contact us:</h1>
</div>
<hr>
<br><br>
<nav>
    <ul>
        <li><a href="https://facebook.com"> Facebook </a></li>
        <li><a href="https://twitter.com"> Twitter </a></li>
        <li><a href="https://mail.google.com"> Email </a></li>
        <li> Phone: 0740868413 </li>
        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />


    </ul>
</nav>

<footer class="site-footer navbar-bottom">
    <marquee width="100%"><p id="copyright"> @Copyright: PC-KING </p></marquee>
</footer>
</body>
</html>