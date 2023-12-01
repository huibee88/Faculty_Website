<!DOCTYPE html>
<html lang="en">
<head>
	<title> KK24603 WE University </title>
	<meta charset="utf-8">
	<meta name="description" content="WE University Information">
	<meta name="keywords" content="courses, faculty, WE University">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	
	<!-- Favicon --->
	<link href="<?= base_url() ?>public/img/logo_ums.png" rel="shortcut icon"/>
	
	<!-- Google Font --->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	
	<!-- stylesheet --->
	<link rel="stylesheet" href="<?= base_url() ?>public/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="<?= base_url() ?>public/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="<?= base_url() ?>public/css/flaticon.css"/>
	<link rel="stylesheet" href="<?= base_url() ?>public/css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="<?= base_url() ?>public/css/animate.css"/>
	<link rel="stylesheet" href="<?= base_url() ?>public/css/style.css"/>
	
	<!-- font awesome --->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
	
	<!-- [if lt IE 9]>
		<script src="https://css.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://css.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif] -->
</head>

<script>
	var modal=document.getElementById('id01');
	
	window.onclick = function(event){
		if(event.target == modal){
			modal.style.display = "none";
		}
	}
</script>

<body>
	<!-- Page Preloader --->
	<div id="preloader">
		<div class="loader"></div>
	</div>
	
	<!-- login form --->
	<div id="id01" class="modal">
		<div style="display: inline;">
			<div id="close-form" onclick="document.getElementById('id01').style.display='none'" class="fas fa-times"></div>
			
			<div width="60%" class="textcenter">
				<span class="btn active login-btn">Login</span>
				
				<span class="btn register-btn">Register</span>
			</div>
		</div>
		
		<form class="login-form active" action="">
			<h3 class="textcenter">LOGIN FORM</h3>
			<div class="imglogincontainer">
				<i class="fas fa-user-graduate" style="font-size:2rem; color:#eb2b63"></i>
			</div>
			
			<div class="container">
				<label for="username"><b>Username</b></label>
				<input type="text" placeholder="Enter your username" name="username" required>
				<label for="psw"><b>Password</b></label>
				<input type="password" placeholder="Enter your password" name="password" required>
				
				<input type="submit" value="Login" class="btn btn1">
				<br>
				<label>
					<input type="checkbox" checked="checked" name="remember"> Remember Me
				</label>
			</div>
			
			<div class="container containerstyle">
				<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn" style="margin-left:3%"> Cancel </button>
				<span class="psw"> <a href="#"> Forgot Password? </a></span>
			</div>
		</form>
		
		<form class="register-form" action="">
			<h3 class="textcenter">REGISTER FORM</h3>
			<div class="imglogincontainer">
				<i class="fas fa-user-graduate" style="font-size:2rem; color:#eb2b63"></i>
			</div>
			
			<div class="container">
				<label for="username"><b>Username</b></label>
				<input type="text" placeholder="Enter your username" name="username" required>
				<label for="psw"><b>Password</b></label>
				<input type="password" placeholder="Enter your password" name="password" required>
				<label for="psw"><b>Reenter Password</b></label>
				<input type="password" placeholder="Confirm your password" name="password" required>
				
				
			</div>
			
			<div class="container textcenter containerstyle">
				<span><input type="submit" value="Register" class="btn2"></span>
				<span><button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn" style="margin-left:25%"> Cancel </button></span>
			</div>
		</form>
	</div>
	<!-- Header Section --->
	<header class="aheader-section">
		<a href="<?= base_url('home') ?>" class="site-logo"><img src="<?= base_url() ?>public/img/logo.png" alt="logo"></a>

		<div class="nav-wrap">
			<div class="but">
			  <a href="#">	
				<!-- <div id="account-btn"  class="fas fa-user"></div> -->
				<div id="nav-switch" class="fas fa-bars"></div></a>
			</div>
			
			<ul class="main-menu">
				<li><a href="<?= base_url('home') ?>">Home </a></li>
				<li><a href="<?= base_url() ?>Team">Team</a></li>
				<li><a href="<?= base_url('viewfacilities') ?>">Facilities</a></li>
				<li><a href="<?= base_url() ?>Courses_Public">Courses </a></li>
				<li><a href="<?= base_url() ?>Postgraduates_con">Postgraduate</a></li>
				<li><a href="<?= base_url('login') ?>">Login</a></li>
			</ul>
		</div>

