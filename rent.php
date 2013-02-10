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
		<link rel="stylesheet" href="css/shadowbox.css">

		<script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<script src="js/shadowbox.js"></script>
		<script>
			Shadowbox.init({
			    handleOversize: "drag",
			    modal: false
			});




			
		</script>
	</head>
	<body class="itemgallery">
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
							<li><a href="/">Home</a></li>
							<li class="dropdown">
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
							<li class="active" id="rent-now-btn"><a href="/rent.php"><strong>Rent Now</strong></a></li>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</div>
<?php if ($_SESSION['usr']) { ?>
		<div class="container">

			<!-- Example row of columns -->
			<div class="sidemenu filter pull-left">
				<h2>Search</h2>
				<ul>
					<li>Category</li>
					<li>Size</li>
					<li>Brand</li>
					<li>Location</li>
				</ul>
			</div>
			<div class="row pull-right">
				<div class="span4">
					<a href="#box" rel="shadowbox;width=801;height=634" class="thankyou">
						<img src="img/itemgallery/1.jpg" alt="item"/>
					</a>
					<span class="rented"></span>
					</a>
				</div>
				<div class="span4">
					<a href="#box" rel="shadowbox;width=801;height=634" class="thankyou">

					<img src="img/itemgallery/2.jpg" alt="item"/>
					</a>
				</div>
				<div class="span4">
					<a href="#box" rel="shadowbox;width=801;height=634" class="thankyou">

					<img src="img/itemgallery/3.jpg" alt="item"/>
					</a>
				</div>
				<div class="span4">
					<a href="#box" rel="shadowbox;width=801;height=634" class="thankyou">

					<img src="img/itemgallery/4.jpg" alt="item"/>
					<span class="rented"></span>
					</a>
				</div>
				<div class="span4">
					<a href="#box" rel="shadowbox;width=801;height=634" class="thankyou">

					<img src="img/itemgallery/5.jpg" alt="item"/>
					<span class="rented"></span>
					</a>
				</div>
				<div class="span4">
					<a href="#box" rel="shadowbox;width=801;height=634" class="thankyou">

					<img src="img/itemgallery/6.jpg" alt="item"/>
					</a>
				</div>
				<div class="span4">
					<a href="#box" rel="shadowbox;width=801;height=634" class="thankyou">

					<img src="img/itemgallery/7.jpg" alt="item"/>
					</a>
				</div>
				<div class="span4">
					<a href="#box" rel="shadowbox;width=801;height=634" class="thankyou">

					<img src="img/itemgallery/8.jpg" alt="item"/>
					<span class="rented"></span>
					</a>
				</div>
				<div class="span4">
					<a href="#box" rel="shadowbox;width=801;height=634" class="thankyou">

					<img src="img/itemgallery/9.jpg" alt="item"/>
					</a>
				</div>
				<div class="span4">
					<a href="#box" rel="shadowbox;width=801;height=634" class="thankyou">

					<img src="img/itemgallery/10.jpg" alt="item"/></a>
				</div>
			</div>
			<div style="clear:both"></div>
			<?php } else {?>
			<h1>you are not logged in!</h1>

			<?php } ?>
			<hr>
			<div id="box" style="display:none"><div class="box-content"><h2><?php echo $_SESSION['usr'] ?></h2></div></div>
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
