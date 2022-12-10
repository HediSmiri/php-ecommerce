<?php
include "../helpers/conn.php";
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>E-commerce Website</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="./assest/css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="./assest/css/slick.css" />
	<link type="text/css" rel="stylesheet" href="./assest/css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="./assest/css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="./assest/css/font-awesome.min.css">
	
	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="./assest/css/style.css" />
	<link type="text/css" rel="stylesheet" href="./assest/css/accountbtn.css" />
	
	<!-- Hearder CSS -->
	<link rel="stylesheet" href="./assest/css/header.css">

</head>

<body>
	<!-- HEADER -->
	<header>
		<!-- TOP HEADER -->
		<div id="top-header">
			<div class="container">

				<ul class="header-links pull-right">
					<li><a href="#"><i class="fa fa-inr"></i> INR</a></li>
					<li><?php
						if (isset($_SESSION["uid"])) {
							$sql = "SELECT first_name FROM user_info WHERE user_id='$_SESSION[uid]'";
							$query = mysqli_query($con, $sql);
							$row = mysqli_fetch_array($query);

							echo '
                               <div class="dropdownn">
                                  <a href="#" class="dropdownn" data-toggle="modal" data-target="#myModal" ><i class="fa fa-user-o"></i> HI ' . $row["first_name"] . '</a>
                                  <div class="dropdownn-content">
                                    <a href="" data-toggle="modal" data-target="#profile"><i class="fa fa-user-circle" aria-hidden="true" ></i>My Profile</a>
                                    <a href="logout.php"  ><i class="fa fa-sign-in" aria-hidden="true"></i>Log out</a>
                                    
                                  </div>
                                </div>';
						} else {
							echo '
                                <div class="dropdownn">
                                  <a href="#" class="dropdownn" data-toggle="modal" data-target="#myModal" ><i class="fa fa-user-o"></i> My Account</a>
                                  <div class="dropdownn-content">
                                    <a href="" data-toggle="modal" data-target="#Modal_login"><i class="fa fa-sign-in" aria-hidden="true" ></i>Login</a>
                                    <a href="" data-toggle="modal" data-target="#Modal_register"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a>
                                    
                                  </div>
                                </div>';
						}
						?>

					</li>
				</ul>

			</div>
		</div>
		<!-- /TOP HEADER -->
		<!-- MAIN HEADER -->
		<div id="header">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- LOGO -->
					<div class="col-md-3">
						<div class="header-logo">
							<a href="#" class="logo">
								<font style="font-style:normal; font-size: 33px;color: aliceblue;font-family: serif">
									E-commerce Website
								</font>

							</a>
						</div>
					</div>
					<!-- /LOGO -->

					<!-- SEARCH BAR -->
					<div class="col-md-6">
						<div class="header-search">
							<form>
								<select class="input-select">
									<option value="0">All Categories</option>
									<option value="1">Men</option>
									<option value="1">Women </option>
								</select>
								<input class="input" id="search" type="text" placeholder="Search here">
								<button type="submit" id="search_btn" class="search-btn">Search</button>
							</form>
						</div>
					</div>
					<!-- /SEARCH BAR -->

					<!-- ACCOUNT -->
					<div class="col-md-3 clearfix">
						<div class="header-ctn">


							<!-- Cart -->
							<div class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
									<i class="fa fa-shopping-cart"></i>
									<span>Your Cart</span>
									<div class="badge qty">0</div>
								</a>
								<div class="cart-dropdown">
									<div class="cart-list" id="cart_product">


									</div>

									<div class="cart-btns">
										<a href="cart.php" style="width:100%;"><i class="fa fa-edit"></i> edit cart</a>

									</div>
								</div>

							</div>
							<!-- /Cart -->

							<!-- Menu Toogle -->
							<div class="menu-toggle">
								<a href="#">
									<i class="fa fa-bars"></i>
									<span>Menu</span>
								</a>
							</div>
							<!-- /Menu Toogle -->
						</div>
					</div>
					<!-- /ACCOUNT -->
				</div>
				<!-- row -->
			</div>
			<!-- container -->
		</div>
		<!-- /MAIN HEADER -->
	</header>
	<!-- /HEADER -->
	<nav id='navigation'>
			<!-- container -->
			<div class="container" id="get_category_home">
				<!-- <div id="responsive-nav">
						
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="index.php">Home</a></li>
						<li class="category" cid="1"><a href="store.php">Electronics</a></li>
						<li class="category" cid="2"><a href="store.php">Ladies Wears</a></li>
						<li class="category" cid="3"><a href="store.php">Mens Wear</a></li>
						<li class="category" cid="4"><a href="store.php">Kids Wear</a></li>
						<li class="category" cid="5"><a href="store.php">Furnitures</a></li>
						<li class="category" cid="6"><a href="store.php">Home Appliances</a></li>
						<li class="category" cid="7"><a href="store.php">Electronics Gadgets</a></li>
					
					</ul>
						
				</div> -->
			</div>
			<!-- /container -->
		</nav>


	<!-- NAVIGATION -->

	<div class="modal fade" id="Modal_login" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>

				</div>
				<div class="modal-body">
					<?php
					include "login_form.php";

					?>

				</div>

			</div>

		</div>
	</div>
	<div class="modal fade" id="Modal_register" role="dialog">
		<div class="modal-dialog" style="">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>

				</div>
				<div class="modal-body">
					<?php
					include "register_form.php";

					?>

				</div>

			</div>

		</div>
	</div>