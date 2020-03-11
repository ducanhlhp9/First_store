 

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="<?php base_url()?>public/frontend/img/logo3.jpg" type="image/png">
        <title>CanhCua</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php base_url()?>public/frontend/css/bootstrap.css">
        <link rel="stylesheet" href="<?php base_url()?>public/frontend/vendors/linericon/style.css">
        <link rel="stylesheet" href="<?php base_url()?>public/frontend/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php base_url()?>public/frontend/vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php base_url()?>public/frontend/vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="<?php base_url()?>public/frontend/vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="<?php base_url()?>public/frontend/vendors/animate-css/animate.css">
        <link rel="stylesheet" href="<?php base_url()?>public/frontend/vendors/jquery-ui/jquery-ui.css"> 
        <!-- main css -->
        <link rel="stylesheet" href="<?php base_url()?>public/frontend/css/style.css">
        <link rel="stylesheet" href="<?php base_url()?>public/frontend/css/responsive.css">
    </head>
    <body>
        
        <!--================Header Menu Area =================-->
        
        <header class="header_area">
            <div class="top_menu row m0">
              <div class="container">
          <div class="float-left">
            <a href="#">Welcome to MyShop</a>
            <?php if (isset($_SESSION['name_user'])): ?>
              <a>Hello : <?php echo $_SESSION['name_user'] ?></a>
            <?php endif; ?>
          </div>
          <div class="float-right">
            <ul class="header_social">
              <li><a href="https://www.facebook.com/hoangduc.anh.1420"><i class="fa fa-facebook"></i></a></li>
            </ul>
          </div>
              </div>  
            </div>  
            <div class="main_menu">
              <nav class="navbar navbar-expand-lg navbar-light main_box">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand logo_h" href="http://localhost:8080/PHP/"><img src="<?php base_url()?>public/frontend/img/logo3.jpg" alt="" width ="60px" height="60px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
              <ul class="nav navbar-nav menu_nav ml-auto">
                <li class="nav-item active"><a class="nav-link" href="<?php base_url()?>index.php">Home</a></li> 
                <li class="nav-item submenu dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Shop</a>
                  <ul class="dropdown-menu">
                    <li class="nav-item"><a class="nav-link" href="<?php base_url()?>index2.php">Shop Category</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php base_url()?>gio-hang.php">Shopping Cart</a></li>
                  </ul>
                </li> 

                <li class="nav-item submenu dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages</a>
                  <ul class="dropdown-menu">
                    <?php if (isset($_SESSION['name_user'])): ?>
                      <li class="nav-item"><a class="nav-link" href="<?php base_url()?>logout.php">logout</a>
                      <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="<?php base_url()?>login.php">Login</a>
                        <li class="nav-item"><a class="nav-link" href="<?php base_url()?>registration.php">Register</a>
                      <?php endif; ?>
                    
                  </ul>
                </li> 
                <li class="nav-item"><a class="nav-link" href="<?php base_url()?>contact.php">Contact</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li class="nav-item"><a href="<?php base_url()?>gio-hang.php" class="cart"><i class="lnr lnr lnr-cart"></i></a></li>
               <!--  <li class="nav-item"><a href="search.php" class="search" method ="get">
                  <i class="lnr lnr-magnifier"></i></a></li>   -->
                  <li class="nav-item active">
                  <form action ="search.php" class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"  method="post">
                      <input type="text" class="form-control" placeholder="Search for..." id="search1" name="search1" >
                      <div class="nav-link">
                        <button class="btn btn-primary" type="submit" >
                          <i class="lnr lnr-magnifier"></i>
                        </button>
                      </div>
                  </form>            
              </li> 
              </ul>
            </div> 
          </div>
              </nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->