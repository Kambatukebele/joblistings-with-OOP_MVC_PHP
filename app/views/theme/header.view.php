	<!DOCTYPE html>
	<html lang="zxx" class="no-js">

	  <head>
	    <!-- Mobile Specific Meta -->
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <!-- Favicon-->
	    <link rel="shortcut icon" href="img/fav.png">
	    <!-- Author Meta -->
	    <meta name="author" content="codepixer">
	    <!-- Meta Description -->
	    <meta name="description" content="">
	    <!-- Meta Keyword -->
	    <meta name="keywords" content="">
	    <!-- meta character set -->
	    <meta charset="UTF-8">
	    <!-- Site Title -->
	    <title><?=$data['page_title'];?></title>

	    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
	    <!--
			CSS
			============================================= -->
	    <link rel="stylesheet" href="<?=ROOT_ASSETS?>theme/css/linearicons.css">
	    <link rel="stylesheet" href="<?=ROOT_ASSETS?>theme/css/font-awesome.min.css">
	    <link rel="stylesheet" href="<?=ROOT_ASSETS?>theme/css/bootstrap.css">
	    <link rel="stylesheet" href="<?=ROOT_ASSETS?>theme/css/magnific-popup.css">
	    <link rel="stylesheet" href="<?=ROOT_ASSETS?>theme/css/nice-select.css">
	    <link rel="stylesheet" href="<?=ROOT_ASSETS?>theme/css/animate.min.css">
	    <link rel="stylesheet" href="<?=ROOT_ASSETS?>theme/css/owl.carousel.css">
	    <link rel="stylesheet" href="<?=ROOT_ASSETS?>theme/css/main.css">
	  </head>

	  <body>

	    <header id="header" id="home">
	      <div class="container">
	        <div class="row align-items-center justify-content-between d-flex">
	          <div id="logo">
	            <a href="<?=ROOT?>"><img src="<?=ROOT_ASSETS?>theme/img/logo.png" alt="" title="" /></a>
	          </div>
	          <nav id="nav-menu-container">
	            <ul class="nav-menu">
	              <li class="menu-active"><a href="<?=ROOT?>">Home</a></li>
	              <li><a href="<?=ROOT?>about">About Us</a></li>
	              <li><a href="<?=ROOT?>category">Category</a></li>
	              <li><a href="<?=ROOT?>price">Price</a></li>
	              <li><a href="<?=ROOT?>blog">Blog</a></li>
	              <li><a href="<?=ROOT?>contact">Contact</a></li>
	              <!-- <li class="menu-has-children"><a href="">Pages</a>
	                <ul>
	                  <li><a href="elements.html">elements</a></li>
	                  <li><a href="search.html">search</a></li>
	                  <li><a href="single.html">single</a></li>
	                </ul>
	              </li> -->
	              <?php if(isset($_SESSION['company_details'])): ?>
	              <li><a class="ticker-btn" href="<?=ROOT?>post_job">Post a Job</a></li>
	              <li><a class="ticker-btn" href="<?=ROOT?>logout_company">Logout</a></li>
	              <li><a class="ticker-btn" href="<?=ROOT?>company_account">Account</a></li>
	              <?php else: ?>
	              <li><a class="ticker-btn" href="<?=ROOT?>register_company">Register your company</a></li>
	              <li><a class="ticker-btn" href="<?=ROOT?>login_company">Login</a></li>
	              <?php endif; ?>

	            </ul>
	          </nav><!-- #nav-menu-container -->
	        </div>
	      </div>
	    </header><!-- #header -->