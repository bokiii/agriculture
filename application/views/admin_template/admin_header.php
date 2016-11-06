<!DOCTYPE html>
<html lang="en" ng-app="agriculture">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Department of Agriculture System</title>
	<meta name="description" content="Cardio is a free one page template made exclusively for Codrops by Luka Cvetinovic" />
	<meta name="keywords" content="html template, css, free, one page, gym, fitness, web design" />
	<meta name="author" content="Luka Cvetinovic for Codrops" />
	<!-- Favicons (created with http://realfavicongenerator.net/)-->
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url(); ?>img/favicons/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url(); ?>img/favicons/apple-touch-icon-60x60.png">
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>img/favicons/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>img/favicons/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="<?php echo base_url(); ?>img/favicons/manifest.json">
	<link rel="shortcut icon" href="<?php echo base_url(); ?>img/favicons/favicon.ico">
	<meta name="msapplication-TileColor" content="#00a8ff">
	<meta name="msapplication-config" content="<?php echo base_url(); ?>img/favicons/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
	<!-- Normalize -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/normalize.css">
	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.css">
	<!-- Owl -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/owl.css">
	<!-- Animate.css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/animate.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>fonts/font-awesome-4.1.0/css/font-awesome.min.css">
	<!-- Elegant Icons -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>fonts/eleganticons/et-icons.css">
	<!-- Main style -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/adminCardio.css">    
	<!-- My style -->   
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/myStyle.css"> 
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/adminStyle.css"> 
</head>

<body>
	<div class="preloader">
		<img src="<?php echo base_url(); ?>img/loader.gif" alt="Preloader image">
	</div>
	<nav class="navbar">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><img src="<?php echo base_url(); ?>img/logo.bmp" data-active-url="<?php echo base_url(); ?>img/logo.bmp" alt=""></a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right main-nav">    
				    
					<?php if($this->session->userdata('user_priveleges')) {  ?>    
						<li><a href="<?php echo base_url(); ?>index.php/admin">Home</a></li>   
						<li><a href="<?php echo base_url(); ?>index.php/data_inventory">Data Inventory</a></li>
						<li><a class="btn btn-red" href="<?php echo base_url(); ?>index.php/process/logout">Logout</a></li>
					<?php } else { ?>   
						<li><a href="<?php echo base_url(); ?>index.php/admin">Home</a></li>   
						<li><a href="<?php echo base_url(); ?>index.php/users">Users</a></li>  
						<li><a href="<?php echo base_url(); ?>index.php/data_inventory">Data Inventory</a></li>
						<li><a class="btn btn-red" href="<?php echo base_url(); ?>index.php/process/logout">Logout</a></li>
					<?php } ?>   
				    
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>