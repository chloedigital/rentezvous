<?php

session_name('tzLogin');
session_set_cookie_params(2*7*24*60*60);
session_start();
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title></title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width">

		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/bootstrap-responsive.css">
		<link rel="stylesheet" href="css/main.css">

		<script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	</head>
	<body class="hiw">
		<!--[if lt IE 7]>
			<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
		<![endif]-->

		<!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.php -->

		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<div class="nav-signin pull-right">
						<ul class="nav">
							<?php if ($_SESSION['id']) { ?>
							<li><a href="/profile.php">Profile</a></li>
							<?php } else { ?>
							<li><a href="/signin.php">Sign In</a></li>
							<li><a href="/signup.php">Sign Up</a></li>
							<?php } ?>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
				<div class="container top-navbar">
					<a class="brand" href="#">Project name</a>

					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<div class="nav-collapse collapse">
						<ul class="nav mainmenu">
							<li class=""><a href="/">Home</a></li>
							<li class="dropdown active">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">How It Works <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="/concept.php">Concept</a></li>
									<li><a href="/process.php">Process</a></li>
									<li><a href="/targetedbrands.php">Targeted Brands</a></li>
								</ul>
							</li>
							<li><a href="/events.php">Events</a></li>
							<li><a href="/designers.php">Designers</a></li>
							<li><a href="/gallery.php">Gallery</a></li>
							<li><a href="/press.php">Press</a></li>
							<li id="rent-now-btn"><a href="/rent.php"><strong>Rent Now</strong></a></li>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</div>

		<div class="container">

			<!-- Main hero unit for a primary marketing message or call to action -->
			<div class="pull-left sidemenu process">
					<h2>Process - Owner</h2>
					<p>
						You have cool clothes you like but you don’t wear them every time. Why not making money of it?
						<ul>
							<li>1) SIGN UP and UPLOAD your clothes on your profile</li>
							<li>2) SET UP a price - usually we give as a guideline a rental price of 15% of the purchasing one -  and your conditions (dry cleaner option, meeting places or specific delivery points…)</li>
							<li>3) ANSWER other people’s requests and DISCUSS you are going to proceed</li>
							<li>4) MEET at the next event or to the meeting point you decided</li>
							<li>5) Get your cash</li>
							<li>6) RECOVER your item at the next event or a decided delivery point and RATE your experience!</li>
						</ul>
					</p>
			</div>
			<div class="hero-unit pull-right">
				<img src="img/hiw/owner.jpg" alt="owner"/>
			</div>
			<div style="clear:both"></div>
			<hr>

			<footer>
				<p>&copy; Rentez - Vous 2013</p>
			</footer>

		</div> <!-- /container -->

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.0.min.js"><\/script>')</script>

		<script src="js/vendor/bootstrap.min.js"></script>

		<script src="js/plugins.js"></script>
		<script src="js/main.js"></script>

		<script>
			var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));
		</script>
	</body>
</html>