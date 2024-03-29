<!DOCTYPE html>
<html lang="en">
    <?php
            include("./functions/users.php");
      include("./functions/product_pull.php");
      include("./functions/connection.php");
      $connect=connection();
    //$_COOKIE['spedizione']="standard";
      controllo_utente();



      ?>
  <head>
     <script>
          prendi(0);

      </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Varkala E-commerce Theme</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Custom font-->
    <link rel="stylesheet" href="fonts/stylesheet.css">
    <!-- Swiper-->
    <link rel="stylesheet" href="vendor/swiper/css/swiper.min.css">
    <!-- AOS - AnimationOnScroll-->
    <link rel="stylesheet" href="vendor/aos/aos.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- Theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png">
    <!-- FontAwesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.0/css/all.css">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- navbar-->
    <header class="header header-absolute"> 
      <nav class="navbar navbar-expand-lg bg-transparent border-0 shadow-0 navbar-light px-lg-5 ">
        <div class="collapse navbar-collapse" id="navbarContent">
          <ul class="navbar-nav mt-3 mt-lg-0">
            <li class="nav-item dropdown active"><a class="nav-link" href="index.php" aria-haspopup="true" aria-expanded="false">Home</a> </li>
            <li class="nav-item"><a class="nav-link" href="category-sidebar.php" aria-haspopup="true" aria-expanded="false">Shop</a> </li>
            
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="docsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Info</a>
              <div class="dropdown-menu" aria-labelledby="homeDropdown">
                  <a class="dropdown-item" href="contact.php">Contact</a>
                  <a class="dropdown-item" href="privacy.php">Privacy Policy</a>
              </div>
            </li>
          </ul>
            
          <form class="d-lg-flex ml-auto mr-lg-5 mr-xl-6 my-4 my-lg-0" action="#">
            <div class="input-group input-group-underlined">
              <div class="input-group-append ml-0">
                
              </div>
            </div>
          </form>
            <form class="d-lg-flex ml-auto mr-lg-5 mr-xl-6 my-4 my-lg-0" method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>">

                <div class="input-group input-group-underlined">
                    <input class="form-control form-control-underlined pl-3" type="text"  name="ricerca" placeholder="Search" aria-label="Search" aria-describedby="button-search">
                    <div class="input-group-append ml-0">
                        <button class="btn btn-underlined py-0" id="button-search" type="sumbit" name="pappagallo">
                            <svg class="svg-icon navbar-icon">
                                <use xlink:href="#search-1"> </use>
                            </svg>
                        </button>
                    </div>
                </div>

            </form>
          <ul class="list-inline mb-0 d-none d-lg-block">
              <?php

              if(isset($_SESSION['ruolo'])){
                  if($_SESSION['ruolo']=="Amministratore" || $_SESSION['ruolo']=="Proprietario"){
                      echo"<li class='list-inline-item mr-3'><a class='text-dark text-hover-primary' href='./backend/index.php'>
                          <svg class='svg-icon navbar-icon'>
                              <use xlink:href='#telephone-operator-1'> </use>
                          </svg></a></li>";

                  } }
              ?>
              <li class="list-inline-item mr-3"><a class="text-dark text-hover-primary" href="customer-login.php">
                      <svg class="svg-icon navbar-icon">
                          <use xlink:href="#avatar-1"> </use>
                      </svg></a></li>
              <li class="list-inline-item mr-3"><a class="text-dark text-hover-primary position-relative" href="customer-wishlist.php?wish=0">
                      <svg class="svg-icon navbar-icon">
                          <use xlink:href="#heart-1"> </use>
                      </svg>
          </ul>

        </div>
      </nav>
    </header>
    <!-- Hero Section-->
    <section class="hero py-6">
      <div class="container">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb pl-0 ">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Checkout        </li>
        </ol>
        <!-- Hero Content-->
        <div class="hero-content">
          <h1 class="hero-heading">Checkout</h1>
          <div><p class="lead text-muted">Choose your delivery method.</p></div>
        </div>
      </div>
    </section>
    <!-- Checkout-->
    <section>
      <div class="container">


        <form class="row"  method='POST' enctype='multipart/form-data' action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <div class="col-lg-8">
            <ul class="custom-nav nav nav-pills mb-5">
              <li class="nav-item w-25"><a class="nav-link text-sm" href="checkout.php">Address</a></li>
              <li class="nav-item w-25"><a class="nav-link text-sm active" href="checkout2.php">Delivery Method</a></li>
              <li class="nav-item w-25"><a class="nav-link text-sm <?php if(empty($_COOKIE['idconsegna'])){ echo'disabled';} ?>" href="checkout3.php">Payment Method </a></li>
              <li class="nav-item w-25"><a class="nav-link text-sm <?php if(empty($_COOKIE['idconsegna'])){ echo'disabled';} ?>" href="checkout4.php">Order Review</a></li>
            </ul>
              <div class="d-block" id="addToCartAlert">
                  <div class="mb-4 mb-lg-5 alert alert-success" id="alert" role="alert" style="background-color:#ff0000;display:none">
                      <div class="d-flex align-items-center pr-3">
                          <svg class="svg-icon d-none d-sm-block w-3rem h-3rem svg-icon-light flex-shrink-0 mr-3">
                              <use xlink:href="#delete-circle-1"> </use>
                          </svg>
                          <p class="mb-0">Immetti un tipo di spedizione! <br class="d-inline-block d-lg-none"></p>
                      </div>
                      <button class="close close-absolute close-centered opacity-10 text-inherit" type="button" data-dismiss="alert" aria-label="Close">
                          <svg class="svg-icon w-2rem h-2rem">
                              <use xlink:href="#close-1"> </use>
                          </svg>
                      </button>
                  </div>
              </div>


            <div class="row">
              <div class="col-md-6">
                <div class="card-radio mb-4">
                  <label class="card-label" for="express"></label>
                  <input class="card-radio-input" type="radio" name="shippping" id="express" onclick='prendi("express")' <?php if(isset($_COOKIE['idspedizione'])){if($_COOKIE['idspedizione']=="express"){echo"checked"; }}?>>
                  <div class="card">   
                    <div class="card-header">
                      <h6 class="mb-0">Spedizione express</h6>
                    </div>
                    <div class="card-body">
                      <p class="text-muted text-sm">Spedizione express, dai 2-4 giorni di attesa, costo aggiuntivo di $10</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="card-radio mb-4">
                  <label class="card-label" for="standard"></label>
                  <input class="card-radio-input" type="radio" name="shippping" id="standard" onclick='prendi("standard")' <?php if(isset($_COOKIE['idspedizione'])){if($_COOKIE['idspedizione']=="standard"){echo"checked"; }}?>>
                  <div class="card">   
                    <div class="card-header">
                      <h6 class="mb-0">Spedizione standard</h6>
                    </div>
                    <div class="card-body">
                      <p class="text-muted text-sm">Spedizione standard, dai 5-10 giorni di attesa, costo aggiuntivo di $5 </p>
                    </div>
                  </div>
                </div>
              </div>
            
              
            </div>
            <div class="my-5 d-flex justify-content-between flex-column flex-lg-row">
                <a class="btn btn-link text-muted" href="checkout.php">
                    <i class="fa fa-angle-left mr-2"></i>
                    Back to the addresses
                </a>

                <button class="btn btn-dark" type="submit" name="invia"> <!-- name="invia" -->
                    Choose payment method<i class="fa fa-angle-right ml-2"></i>
                </button></div>
          </div>

              <?php

                    $result=carrello_accesso($connect,$_SESSION['id']);
                    $idC=$_SESSION['id'];
                    $tot_prodotti=0;
                    $num_prodotti=0;
                    while($row = mysqli_fetch_array($result)){

                    $idP=$row["prodotto"];
                   
                    $costo=$row["costo"];
                    $resultimm=select_immaginiP_detail($connect, $idP);
                    $quantita=$row["quantita"];
                        $sconto=$row['percentuale_sconto'];
                if($sconto) {
                    $perc=($costo*$sconto)/100;
                    $prezzoscontato=$costo-$perc;
                    $tot_prodotto=$quantita*$prezzoscontato;
                        $tot_prodotti+=$tot_prodotto;
                        $num_prodotti++;}
                     else  { 
                        $tot_prodotto=$quantita*$costo;
                        $tot_prodotti+=$tot_prodotto;
                        $num_prodotti++;}}
            
            
                  $iva=($tot_prodotti*22)/100;
            $totale_iva=$tot_prodotti+$iva;
                  ?>
          <div class="col-lg-4">
            <div class="card mb-5"> 
              <div class="card-header">
                <h6 class="mb-0">Order Summary</h6>
              </div>
              <div class="card-body py-4">
                <p class="text-muted text-sm">Shipping and additional costs are calculated based on values you have entered.</p>
               <table class="table card-text">
                  <tr>
                    <th class="py-4">Order Subtotal </th>
                    <td class="py-4 text-right text-muted"><?php echo "$$tot_prodotti"; ?></td>
                  </tr>
                  <tr>
                    <th class="py-4">Shipping and handling</th>
                    <td class="py-4 text-right text-muted"> <?php if(isset($_COOKIE['idspedizione']) && isset($_COOKIE['idspedizione'])){ if($_COOKIE['idspedizione']=="standard"){ echo"$5"; } else{ echo"$10"; }} else {echo"$0";}?></td>
                  </tr>
                  <tr>
                    <th class="py-4">Tax</th>
                    <td class="py-4 text-right text-muted"><?php echo "$$iva"; ?></td>
                  </tr>
                  <tr>
                    <th class="pt-4">Total</th>
                    <td class="pt-4 text-right h3 font-weight-normal"><?php if(isset($_COOKIE['idspedizione'])){ if($_COOKIE['idspedizione']=='standard'){ $totale_iva+=5;} else{$totale_iva+=10;} }echo "$$totale_iva"; ?></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section></form>
    <!-- Sidebar Cart Modal-->
    <div class="modal fade modal-right" id="sidebarCart" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content sidebar-cart-content">
          <div class="modal-header border-0">
            <button class="close modal-close close-rotate" type="button" data-dismiss="modal" aria-label="Close">
              <svg class="svg-icon w-3rem h-3rem svg-icon-light align-middle">
                <use xlink:href="#close-1"> </use>
              </svg>
            </button>
          </div>
          <div class="modal-body px-5 sidebar-cart-body">
            <!-- Empty cart snippet-->
            <!-- In case of empty cart - display this snippet + remove .d-none-->
            <div class="d-none text-center mb-5">
              <svg class="svg-icon w-3rem h-3rem svg-icon-light mb-4 text-muted">
                <use xlink:href="#retail-bag-1"> </use>
              </svg>
              <p>Your cart is empty </p>
            </div>
            <!-- Empty cart snippet end-->
            <div class="sidebar-cart-product-wrapper custom-scrollbar">
              <!-- cart item-->
              <div class="navbar-cart-product"> 
                <div class="d-flex align-items-center"><a href="detail-1.html"><img class="img-fluid navbar-cart-product-image" src="img/product/product-square-ian-dooley-347968-unsplash.jpg" alt="..."/></a>
                  <div class="w-100"><a class="close" href="#">
                      <svg class="svg-icon sidebar-cart-icon">
                        <use xlink:href="#close-1"> </use>
                      </svg></a>
                    <div class="pl-3"> <a class="navbar-cart-product-link text-dark link-animated" href="detail-1.html">Skull Tee</a><small class="d-block text-muted">Quantity: 1 </small><strong class="d-block text-sm">$75.00     </strong></div>
                  </div>
                </div>
              </div>
              <!-- cart item-->
              <div class="navbar-cart-product"> 
                <div class="d-flex align-items-center"><a href="detail-1.html"><img class="img-fluid navbar-cart-product-image" src="img/product/product-square-kyle-loftus-596319-unsplash.jpg" alt="..."/></a>
                  <div class="w-100"><a class="close" href="#">
                      <svg class="svg-icon sidebar-cart-icon">
                        <use xlink:href="#close-1"> </use>
                      </svg></a>
                    <div class="pl-3"> <a class="navbar-cart-product-link text-dark link-animated" href="detail-1.html">Transparent Blouse</a><small class="d-block text-muted">Quantity: 1 </small><strong class="d-block text-sm">$75.00     </strong></div>
                  </div>
                </div>
              </div>
              <!-- cart item-->
              <div class="navbar-cart-product"> 
                <div class="d-flex align-items-center"><a href="detail-1.html"><img class="img-fluid navbar-cart-product-image" src="img/product/product-square-serrah-galos-494312-unsplash.jpg" alt="..."/></a>
                  <div class="w-100"><a class="close" href="#">
                      <svg class="svg-icon sidebar-cart-icon">
                        <use xlink:href="#close-1"> </use>
                      </svg></a>
                    <div class="pl-3"> <a class="navbar-cart-product-link text-dark link-animated" href="detail-1.html">White Tee</a><small class="d-block text-muted">Quantity: 1 </small><strong class="d-block text-sm">$75.00     </strong></div>
                  </div>
                </div>
              </div>
              <!-- cart item-->
              <div class="navbar-cart-product"> 
                <div class="d-flex align-items-center"><a href="detail-1.html"><img class="img-fluid navbar-cart-product-image" src="img/product/product-square-ian-dooley-347968-unsplash.jpg" alt="..."/></a>
                  <div class="w-100"><a class="close" href="#">
                      <svg class="svg-icon sidebar-cart-icon">
                        <use xlink:href="#close-1"> </use>
                      </svg></a>
                    <div class="pl-3"> <a class="navbar-cart-product-link text-dark link-animated" href="detail-1.html">Skull Tee</a><small class="d-block text-muted">Quantity: 1 </small><strong class="d-block text-sm">$75.00     </strong></div>
                  </div>
                </div>
              </div>
              <!-- cart item-->
              <div class="navbar-cart-product"> 
                <div class="d-flex align-items-center"><a href="detail-1.html"><img class="img-fluid navbar-cart-product-image" src="img/product/product-square-kyle-loftus-596319-unsplash.jpg" alt="..."/></a>
                  <div class="w-100"><a class="close" href="#">
                      <svg class="svg-icon sidebar-cart-icon">
                        <use xlink:href="#close-1"> </use>
                      </svg></a>
                    <div class="pl-3"> <a class="navbar-cart-product-link text-dark link-animated" href="detail-1.html">Transparent Blouse</a><small class="d-block text-muted">Quantity: 1 </small><strong class="d-block text-sm">$75.00     </strong></div>
                  </div>
                </div>
              </div>
              <!-- cart item-->
              <div class="navbar-cart-product"> 
                <div class="d-flex align-items-center"><a href="detail-1.html"><img class="img-fluid navbar-cart-product-image" src="img/product/product-square-serrah-galos-494312-unsplash.jpg" alt="..."/></a>
                  <div class="w-100"><a class="close" href="#">
                      <svg class="svg-icon sidebar-cart-icon">
                        <use xlink:href="#close-1"> </use>
                      </svg></a>
                    <div class="pl-3"> <a class="navbar-cart-product-link text-dark link-animated" href="detail-1.html">White Tee</a><small class="d-block text-muted">Quantity: 1 </small><strong class="d-block text-sm">$75.00     </strong></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer sidebar-cart-footer shadow">
            <div class="w-100">
              <h5 class="mb-4">Subtotal: <span class="float-right">$465.32</span></h5><a class="btn btn-outline-dark btn-block mb-3" href="cart.html">View cart</a><a class="btn btn-dark btn-block" href="checkout.html">Checkout</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Sidebar Modal Right-->
    <div class="modal fade modal-right" id="sidebarRight" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header border-0">
            <button class="close close-rotate" type="button" data-dismiss="modal" aria-label="Close">
              <svg class="svg-icon w-3rem h-3rem svg-icon-light align-middle">
                <use xlink:href="#close-1"> </use>
              </svg>
            </button>
          </div>
          <div class="modal-body px-5 pb-5">
            <div>
              <h5 class="mb-5" data-aos="zoom-in" data-aos-delay="50">Varkala</h5>
              <ul class="nav flex-column mb-5">
                <li class="nav-item active"><a class="nav-link pl-0" href="#">Home </a></li>
                <li class="nav-item"><a class="nav-link pl-0" href="#">Link</a></li>
                <li class="nav-item"><a class="nav-link pl-0 disabled" href="#">Disabled</a></li>
                <li class="nav-item dropdown"><a class="nav-link pl-0 dropdown-toggle" id="navbarDropdownMenuLink" href="#" data-target="#sidebarSubmenu" data-toggle="collapse" aria-haspopup="true" aria-expanded="false">Dropdown link</a>
                  <div class="collapse" id="sidebarSubmenu">
                    <ul class="nav flex-column ml-3">
                      <li class="nav-item"><a class="nav-link pl-0" href="#">Action</a></li>
                      <li class="nav-item"><a class="nav-link pl-0" href="#">Another action</a></li>
                      <li class="nav-item"><a class="nav-link pl-0" href="#">Something else here                </a></li>
                    </ul>
                  </div>
                </li>
              </ul>
              <ul class="list-inline mb-4">
                <li class="list-inline-item mr-2"><i class="fab fa-facebook-f"> </i></li>
                <li class="list-inline-item mr-2"><i class="fab fa-twitter"> </i></li>
                <li class="list-inline-item mr-2">
                  <svg class="svg-icon mr-2">
                    <use xlink:href="#calls-1"> </use>
                  </svg>020-800-456-747
                </li>
              </ul>
              <p class="text-sm text-muted mb-0">Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Login Modal    -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <button class="close close-absolute" type="button" data-dismiss="modal" aria-label="Close">
            <svg class="svg-icon w-3rem h-3rem svg-icon-light align-middle">
              <use xlink:href="#close-1"> </use>
            </svg>
          </button>
          <div class="modal-body p-5">
            <ul class="nav list-inline" role="tablist">
              <li class="list-inline-item"><a class="nav-link nav-link-lg active" data-toggle="tab" href="#loginModalTabLogin" role="tab" id="loginModalLinkLogin" aria-controls="loginModalTabLogin" aria-selected="true">Login</a></li>
              <li class="list-inline-item"><a class="nav-link nav-link-lg" data-toggle="tab" href="#loginModalTabRegister" role="tab" id="loginModalLinkRegister" aria-controls="loginModalTabRegister" aria-selected="false">Register</a></li>
            </ul>
            <hr class="mb-3">
            <div class="tab-content">
              <div class="tab-pane active fade show px-3" id="loginModalTabLogin" role="tabpanel" aria-labelledby="loginModalLinkLogin">
                <form action="customer-orders.html" method="get">
                  <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" id="email" type="text">
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col">
                        <label class="form-label" for="loginPassword"> Password</label>
                      </div>
                      <div class="col-auto"><a class="form-text small" href="#">Forgot password?</a></div>
                    </div>
                    <input class="form-control" name="loginPassword" id="loginPassword" placeholder="Password" type="password" required data-msg="Please enter your password">
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" id="loginRemember" type="checkbox">
                      <label class="custom-control-label text-muted" for="loginRemember"> <span class="text-sm">Remember me for 30 days</span></label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-block btn-outline-dark" type="submit"><i class="fa fa-sign-in-alt mr-2"></i> Log in</button>
                  </div>
                </form>
                <hr class="my-3 hr-text letter-spacing-2" data-content="OR">
                <div class="text-center">
                  <button class="btn btn btn-outline-primary letter-spacing-0" data-toggle="tooltip" title="Connect with Facebook"><i class="fa-fw fa-facebook-f fab"></i><span class="sr-only">Connect with Facebook</span></button>
                  <button class="btn btn btn-outline-muted letter-spacing-0" data-toggle="tooltip" title="Connect with Google"><i class="fa-fw fa-google fab"></i><span class="sr-only">Connect with Google</span></button>
                </div>
              </div>
              <div class="tab-pane fade px-3" id="loginModalTabRegister" role="tabpanel" aria-labelledby="loginModalLinkRegister">
                <p class="text-muted text-sm">The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pit.                                            </p>
                <form action="customer-orders.html" method="get">
                  <div class="form-group">
                    <label class="form-label" for="registerName">Name</label>
                    <input class="form-control" id="registerName" type="text">
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="registerEmail">Email</label>
                    <input class="form-control" id="registerEmail" type="text">
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="registerPassword">Password</label>
                    <input class="form-control" id="registerPassword" type="password">
                  </div>
                  <div class="form-group text-center">
                    <button class="btn btn-block btn-outline-dark" type="submit"><i class="far fa-user mr-2"></i>Register                       </button>
                  </div>
                </form>
                <hr class="my-3 hr-text letter-spacing-2" data-content="OR CONNECT WITH">
                <div class="text-center">
                  <button class="btn btn btn-outline-primary letter-spacing-0" data-toggle="tooltip" title="Connect with Facebook"><i class="fa-fw fa-facebook-f fab"></i><span class="sr-only">Connect with Facebook</span></button>
                  <button class="btn btn btn-outline-muted letter-spacing-0" data-toggle="tooltip" title="Connect with Google"><i class="fa-fw fa-google fab"></i><span class="sr-only">Connect with Google                                      </span></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer-->
    <footer>
        <!-- Services block-->
        <!-- Main block - menus, subscribe form--><hr><br>

        <div class="container" style="max-height: 40%">
            <div class="d-block" id="addToCartAlert" >
                <div class="mb-4 mb-lg-5 alert alert-success" id="alert" role="alert" style="display:none;">
                    <div class="d-flex align-items-center pr-3">
                        <svg class="svg-icon d-none d-sm-block w-3rem h-3rem svg-icon-light flex-shrink-0 mr-3">
                            <use xlink:href="#checked-circle-1"> </use>
                        </svg>
                        <p class="mb-0">Registrazione effettuata! rimarrai aggiornato sulle nostre notizie <br class="d-inline-block d-lg-none"></p>
                    </div>
                    <button class="close close-absolute close-centered opacity-10 text-inherit" type="button" data-dismiss="alert" aria-label="Close">
                        <svg class="svg-icon w-2rem h-2rem">
                            <use xlink:href="#close-1"> </use>
                        </svg>
                    </button>
                </div>
            </div></div><br>


        <div class="py-3 text-muted">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 pr-lg-5 pr-xl-6 mb-5 mb-lg-0">
                        <h6 class="text-dark letter-spacing-1 mb-4">Be in touch</h6>
                        <p class="text-sm mb-3">Stay up to date with the latest news regarding offers on our products.</p>

                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST"  enctype="multipart/form-data" id="newsletter-form">
                            <div class="input-group input-group-underlined mb-3">
                                <input class="form-control form-control-underlined" type="email"  name="email" placeholder="Your Email Address" aria-label="Your Email Address">
                                <div class="input-group-append ml-0">
                                    <button class="btn btn-underlined text-gray-700 py-0" type="sumbit" name="fratelli">
                                        <svg class="svg-icon w-2rem h-2rem">
                                            <use xlink:href="#envelope-1"> </use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>




                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-lg-4"><a class="d-lg-none block-toggler my-3" data-toggle="collapse" href="#footerMenu0" aria-expanded="false" aria-controls="footerMenu0">Shop<span class="block-toggler-icon"></span></a>
                                <!-- Footer collapsible menu-->
                                <div class="expand-lg collapse" id="footerMenu0">
                                    <h6 class="text-dark letter-spacing-1 mb-4 d-none d-lg-block">Shop</h6>
                                    <ul class="list-unstyled text-sm pt-2 pt-lg-0">
                                        <li class="mb-2"> <a class="text-muted text-hover-dark link-animated" onclick="forr('Donna')" >For Women</a></li>
                                        <li class="mb-2"> <a class="text-muted text-hover-dark link-animated" onclick="forr('Uomo')" >For Men</a></li>
                                        <li class="mb-2"> <a class="text-muted text-hover-dark link-animated" href="contact.php">Stores</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4"><a class="d-lg-none block-toggler my-3" data-toggle="collapse" href="#footerMenu1" aria-expanded="false" aria-controls="footerMenu1">Company<span class="block-toggler-icon"></span></a>
                                <!-- Footer collapsible menu-->
                                <div class="expand-lg collapse" id="footerMenu1">
                                    <h6 class="text-dark letter-spacing-1 mb-4 d-none d-lg-block">Customer</h6>
                                    <ul class="list-unstyled text-sm pt-2 pt-lg-0">
                                        <li class="mb-2"> <a class="text-muted text-hover-dark link-animated" href="customer-account.php">Account</a></li>
                                        <li class="mb-2"> <a class="text-muted text-hover-dark link-animated" href="customer-orders.php">Orders</a></li>
                                        <li class="mb-2"> <a class="text-muted text-hover-dark link-animated" href="customer-wishlist.php?wish=0">Wishlist</a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright section of the footer-->

    </footer>


    <?php

    if(isset($_POST["invia"])){

        if($_COOKIE['idspedizione']==null){

            echo"<script>
                     document.getElementById('alert').style.display = 'block';
                 </script>";

        }

        else{

            echo"<script>document.location.href = './checkout3.php';</script>";

        }
    }
    ?>

    <script>

        function prendi(id){

            document.cookie = "idspedizione = " + id;

        }
    </script>
    <!-- /Footer end-->
    <!-- JavaScript files-->
    <script>
      // ------------------------------------------------------- //
      //   Inject SVG Sprite - 
      //   see more here 
      //   https://css-tricks.com/ajaxing-svg-sprite/
      // ------------------------------------------------------ //
      function injectSvgSprite(path) {
      
          var ajax = new XMLHttpRequest();
          ajax.open("GET", path, true);
          ajax.send();
          ajax.onload = function(e) {
          var div = document.createElement("div");
          div.className = 'd-none';
          div.innerHTML = ajax.responseText;
          document.body.insertBefore(div, document.body.childNodes[0]);
          }
      }
      // this is set to Bootstrapious website as you cannot 
      // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
      // while using file:// protocol
      // pls don't forget to change to your domain :)
      injectSvgSprite('https://demo.bootstrapious.com/varkala/1-1/icons/orion-svg-sprite.svg'); 
      injectSvgSprite('https://demo.bootstrapious.com/varkala/1-1/icons/varkala-clothes.svg'); 
      injectSvgSprite('https://demo.bootstrapious.com/varkala/1-1/img/shape/blob-sprite.svg'); 
      
    </script>
    <!-- jQuery-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap Bundle -->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Swiper Carousel                       -->
    <script src="vendor/swiper/js/swiper.min.js"></script>
    <!-- Bootstrap Select-->
    <script src="vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
    <!-- AOS - AnimationOnScroll-->
    <script src="vendor/aos/aos.js"></script>
    <!-- Custom Scrollbar-->
    <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom-scrollbar-init.js"></script>
    <!-- Smooth scroll-->
    <script src="vendor/smooth-scroll/smooth-scroll.polyfills.min.js"></script>
    <!-- Object Fit Images - Fallback for browsers that don't support object-fit-->
    <script src="vendor/object-fit-images/ofi.min.js"></script>
    <!-- Some theme config-->
    <script>
      var options = {
          navbarExpandPx: 992
      }
      function forr(tipo){
          document.cookie = tipo + " = " + tipo;
          window.location.href = "./category-sidebar.php";
      }
    </script>
    <!-- Main Theme files-->
    <script src="js/sliders-init.js"></script>
    <script src="js/theme.js"></script>
    <?php
    if(isset($_POST["fratelli"])){
        $email=$_POST["email"];
        $query="INSERT into email_registrate VALUES ('', '$email')";
        $dati=mysqli_query($connect, $query)
        or die ("Non riesco ad eseguire la query $dati");
        echo"<script>document.getElementById('alert').style.display='block';</script>";
    }
    if(isset($_POST["pappagallo"])){

        $ricerca=$_POST["ricerca"];
        setcookie("ricerca", $ricerca);
        header("Location: category-sidebar.php");
    }
    ?>
  </body>
</html>