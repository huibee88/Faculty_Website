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
	<!-- boostrap --->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
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

<!-- <script>
	var modal=document.getElementById('id01');
	
	window.onclick = function(event){
		if(event.target == modal){
			modal.style.display = "none";
		}
	}
</script> -->

<body>
	<!-- 
	<div id="preloader">
		<div class="loader"></div>
	</div> -->
	
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
		<a href="<?= base_url('homeafter') ?>" class="site-logo"><img src="<?= base_url() ?>public/img/logo.png" alt="logo"></a>

		<div class="nav-wrap">
			<div class="but">
				<!-- <div id="account-btn" onclick="document.getElementById('id01').style.display='block'" class="fas fa-user"></div> -->
				<div id="nav-switch" class="fas fa-bars"></div>
			</div>
			<!-- sendiri modify the nav bar -->
			<!-- 1=student -->
			<?php if($this->session->userdata('verified') == 1) : ?>
			<ul class="main-menu">
				<li><a href="<?= base_url('homeafter') ?>">Home </a></li>
				<li><a href="<?= base_url() ?>Team_LoggedS">Team</a></li>
				<li><a href="<?= base_url('viewfacilitiesAfterLogin') ?>">Facilities</a></li>
				<li><a href="<?= base_url() ?>Courses">Courses </a></li>
				<li><a href="<?= base_url() ?>sFinance">Student Finance</a></li>
				<li><a href="<?= base_url() ?>PostgraduatesStudent_con">Postgraduates</a></li>
				<li><a href="<?= base_url() ?>Forum">Forum</a></li>
				<li><a href="<?= base_url('logout') ?>">Logout</a></li>
			</ul>
			<!-- 2=admin -->
			<?php else : ?>
			<ul class="main-menu">
				<li><a href="<?= base_url('homeafter') ?>">Home </a></li>
				<li><a href="<?= base_url() ?>Team_Logged">Team</a></li>
				<li><a href="<?= base_url('facilities') ?>">Facilities</a></li>
				<li><a href="<?= base_url() ?>Courses_AdminView">Courses </a></li>
				<li><a href="<?= base_url() ?>adminFinance">Admin Finance</a></li>
				<li><a href="<?= base_url() ?>PostgraduatesAdmin_con">Postgraduates</a></li>
				<li><a href="<?= base_url() ?>Forum">Forum</a></li> 
				<li><a href="<?= base_url('logout') ?>">Logout</a></li>
			</ul>
			<?php endif ; ?>

		</div>
