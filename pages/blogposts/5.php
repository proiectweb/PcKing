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
						<li class="active"><a href="../blog.php">Blog</a></li>
						<li><a href="../contact.php">Contact</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php
							if (isset($_SESSION["user"])) {
								echo "<li><a href=\"../user.php\">Welcome, ".$_SESSION["user"]; echo "!</a></li>";
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
		</nav>
		<br>
		<div class="container">
			<h1>Blog</h1>
		</div>
		<hr>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<br><img src="../../img/award.png" class="center-block img-responsive" width="345px" height="190px">
				</div>
				<div class="col-md-8">
					<h2>We won teambuilding event in the activity "Two Truths and a Lie"</h2>
					<h3 id="newsnbloggreyfont">OCT 11</h4>
					<div class="row">
						<div class="col-md-11">
						<hr>
						<p>
							There are many different reasons why companies use team building activities. 
							A small sampling of these reasons include: Improving communication, boosting morale, motivation, ice breakers to help get 
							to know each other better, learning effective strategies, improving productivity, learning about one’s strengths and 
							weaknesses and many others.</p> 
							<p>Team building activities can be used by any business, large or small, to promote better 
							teamwork in the workplace, and as most business 
							owners and managers know, great teamwork is one of the key factors associated with a company’s success.</p>
							<p>
							There are four main types of team building activities, which includes: Communication activities, problem solving 
							and/or decision making activities, adaptability and/or planning activities, and activities that focus on building trust. </p>
							<p>
							The idea is to perform various activities that are both fun and challenging, and that also 
							have the “side effect” of building teamwork skills that can help improve employee performance and productivity at the office.
						</p><br>
						<p>Our team won the teambuilding activity named "Two Truths and a Lie"</p>
						<p>
						Description of the game:</p><p>
							Start out by having every team member secretly write down two truths about themselves and one lie on a small piece of paper – 
							Do not reveal to anyone what you wrote down! </p><p>
							Once each person has completed this step, allow 10-15 minutes for open conversation – much like a cocktail party – 
							where everyone quizzes each other on their three questions. The idea is to convince 
							others that your lie is actually a truth, while on the other hand, you try to guess other people’s truths/lies by asking them questions.</p><p> 
							Don’t reveal your truths or lie to anyone – even if the majority of the office already has it figured out! After the conversational period, 
							gather in a circle and one by one repeat each one of your three statements and have the group vote on which one they think is the lie. </p><p>
							You can play this game competitively and award points for each lie you guess or for stumping other players on your own lie. 
							This game helps to encourage better communication in the office, as well as it lets you get to know your coworkers better.
						</p>
						</div>	
					</div>
					</div>
				</div>
			</div>
		</div>
		<br>
	<footer class="site-footer">
		<marquee width="100%"><p id="copyright"> @Copyright: PC-KING </p></marquee>
	</footer>
	</body>
</html>

















