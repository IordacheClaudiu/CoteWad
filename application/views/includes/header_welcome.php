<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>CoteWad</title>
		<meta http-equiv="X-UA-Compatible" content="IE=9">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/welcome_page_styles.css" type="text/css" media="screen"/>
	</head>
	<body>

		<div class="topbar">
			<div class="top-container">
				<form action="<?php echo base_url()?>index.php/login" method="post">
					<button class="button" type="submit" >
						Login
					</button>
				</form>
				<form action="<?php echo base_url()?>index.php/register" method="post">
					<button class="button" type="submit" >
						Register
					</button>
				</form>
				<form action="<?php echo base_url()?>index.php/about"  method="post">
					<button class="button" type="submit" >
						About
					</button>
				</form>
				<form action="<?php echo base_url()?>index.php/contact"  method="post">
					<button class="button" type="submit" >
						Contact
					</button>
				</form>
				<h1>CoteWad</h1>
			</div>
		</div>
		<div id="content">
			<div id="main_content">
