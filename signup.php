<?php

define('INCLUDE_CHECK',true);

require 'connect.php';
require 'functions.php';
// Those two files can be included only if INCLUDE_CHECK is defined


session_name('tzLogin');
// Starting the session

session_set_cookie_params(2*7*24*60*60);
// Making the cookie live for 2 weeks

session_start();

if($_SESSION['id'] && !isset($_COOKIE['tzRemember']) && !$_SESSION['rememberMe'])
{
	// If you are logged in, but you don't have the tzRemember cookie (browser restart)
	// and you have not checked the rememberMe checkbox:

	$_SESSION = array();
	session_destroy();
	
	// Destroy the session
}


if(isset($_GET['logoff']))
{
	$_SESSION = array();
	session_destroy();
	
	header("Location: signup.php");
	exit;
}

if($_POST['submit']=='Login')
{
	// Checking whether the Login form has been submitted
	
	$err = array();
	// Will hold our errors
	
	
	if(!$_POST['username'] || !$_POST['password'])
		$err[] = 'All the fields must be filled in!';
	
	if(!count($err))
	{
		$_POST['username'] = mysql_real_escape_string($_POST['username']);
		$_POST['password'] = mysql_real_escape_string($_POST['password']);
		$_POST['rememberMe'] = (int)$_POST['rememberMe'];
		
		// Escaping all input data

		$row = mysql_fetch_assoc(mysql_query("SELECT id,usr FROM tz_members WHERE usr='{$_POST['username']}' AND pass='".md5($_POST['password'])."'"));

		if($row['usr'])
		{
			// If everything is OK login
			
			$_SESSION['usr']=$row['usr'];
			$_SESSION['id'] = $row['id'];
			$_SESSION['rememberMe'] = $_POST['rememberMe'];
			
			// Store some data in the session
			
			setcookie('tzRemember',$_POST['rememberMe']);
		}
		else $err[]='Wrong username and/or password!';
	}
	
	if($err)
	$_SESSION['msg']['login-err'] = implode('<br />',$err);
	// Save the error messages in the session

	header("Location: signup.php");
	exit;
}
else if($_POST['submit']=='Register')
{
	// If the Register form has been submitted
	
	$err = array();
	
	if(strlen($_POST['username'])<4 || strlen($_POST['username'])>32)
	{
		$err[]='Your username must be between 3 and 32 characters!';
	}
	
	if(preg_match('/[^a-z0-9\-\_\.]+/i',$_POST['username']))
	{
		$err[]='Your username contains invalid characters!';
	}
	
	if(!checkEmail($_POST['email']))
	{
		$err[]='Your email is not valid!';
	}
	
	if(!count($err))
	{
		// If there are no errors
		
		$_POST['password'] = mysql_real_escape_string($_POST['password']);
		// Generate a random password
		
		$_POST['email'] = mysql_real_escape_string($_POST['email']);
		$_POST['username'] = mysql_real_escape_string($_POST['username']);
		$_POST['firstname'] = mysql_real_escape_string($_POST['firstname']);
		$_POST['lastname'] = mysql_real_escape_string($_POST['lastname']);
		$_POST['user_type'] = mysql_real_escape_string($_POST['user_type']);
		// Escape the input data
		
		
		mysql_query("	INSERT INTO tz_members(usr,firstname,lastname,pass,email,regIP,user_type,dt)
						VALUES(
						
							'".$_POST['username']."',
							'".$_POST['firstname']."',
							'".$_POST['lastname']."',
							'".md5($_POST['password'])."',
							'".$_POST['email']."',
							'".$_SERVER['REMOTE_ADDR']."',
							'".$_POST['user_type']."',
							NOW()
							
						)");
		
		if(mysql_affected_rows($link)==1)
		{


			$_SESSION['msg']['reg-success']= $pass;
		}
		else $err[]='This username is already taken!';
	}

	if(count($err))
	{
		$_SESSION['msg']['reg-err'] = implode('<br />',$err);
	}	
	
	header("Location: signup.php");
	exit;
}
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
	<body class="sign">
		<!--[if lt IE 7]>
			<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
		<![endif]-->

		<!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->

		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<div class="nav-signin pull-right">
						<ul class="nav">
							<li><a href="#">Sign In</a></li>
							<li><a href="/signup.php">Sign Up</a></li>
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
							<li ><a href="#">Home</a></li>
							<li class="active dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">How It Works <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="#">Concept</a></li>
									<li><a href="#">Process</a></li>
									<li><a href="#">Targeted Brands</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Events <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="#">Agenda</a></li>
									<li><a href="#">Dropping Points</a></li>
								</ul>
							</li>
							<li><a href="#contact">Designers</a></li>
							<li><a href="#contact">Gallery</a></li>
							<li><a href="#contact">Press</a></li>
							<li id="rent-now-btn"><a href="#contact"><strong>Rent Now</strong></a></li>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</div>


		<div class="container">

			<!-- Main hero unit for a primary marketing message or call to action -->
			<div class="hero-unit">
				<h1>Sign Up</h1>
			<div class="left right">			
				<!-- Register Form -->
				<form action="" method="post">
                    
                    <?php
						
						if($_SESSION['msg']['reg-err'])
						{
							echo '<div class="err">'.$_SESSION['msg']['reg-err'].'</div>';
							unset($_SESSION['msg']['reg-err']);
						}
						
						if($_SESSION['msg']['reg-success'])
						{
							echo '<div class="success">'.$_SESSION['msg']['reg-success'].'</div>';
							unset($_SESSION['msg']['reg-success']);
						}
					?>
                    		
					<label class="grey" for="username">Username:</label>
					<input class="field" type="text" name="username" id="username" value="" size="23" />
					<label class="grey" for="firstname">Firstname:</label>
					<input class="field" type="text" name="firstname" id="firstname" value="" size="23" />
					<label class="grey" for="lastname">Lastname:</label>
					<input class="field" type="text" name="lastname" id="lastname" value="" size="23" />
					<label class="grey" for="email">Email:</label>
					<input class="field" type="text" name="email" id="email" size="23" />
					<label class="grey" for="password">Password:</label>
					<input class="field" type="password" name="password" id="email" size="23" />
				
					<label class="radio" for="UserType">Which of these describe you?</label>
					<input class="radio" type="radio" name="user_type" value="User" checked /> <span>User</span>
					<input class="radio" type="radio" name="user_type" value="Designer" /> <span>Designer</span>
					<P>	
					<input type="submit" name="submit" value="Register" class="bt_register" />
				</form>
			</div>
			</div>


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
	<?php $mysqli->close(); ?>
</html>
