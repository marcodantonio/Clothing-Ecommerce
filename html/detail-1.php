<!DOCTYPE html>
<html lang="en">
        <?php
        include("./functions/users.php");

        controllo_utente();
    ob_start();
    if(isset($_SESSION['id']))
        $idutente=$_SESSION["id"];
    include("./functions/connection.php");
    $connect=connection();
    include("./functions/product_pull.php");
$id=$_GET["id"];
$_COOKIE['id_prodotto_shop']=$id;
$car=$_GET["car"];
$wish=$_GET["wish"]; 
$tagliaI=$_GET["taglia"];
$_SESSION["tagliaDetail"]=$tagliaI;
    ?>
  <head>
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
                      <?php      if(isset($_SESSION["id"])){
              echo"  <li class='list-inline-item mr-3'><a class='text-dark text-hover-primary position-relative' href='customer-wishlist.php?wish=0'>
                        <svg class='svg-icon navbar-icon'>
                            <use xlink:href='#heart-1'> </use>
                        </svg>
                      </a></li>";} ?>
                <li class="list-inline-item position-relative mr-3"><a class="text-dark text-hover-primary" href="#" data-toggle="modal" data-target="#sidebarCart">
                        <svg class="svg-icon navbar-icon">
                            <use xlink:href="#retail-bag-1"> </use>
                        </svg>
                        </a></li>

            </ul>
        </div>
      </nav>
    </header>
      <?php
            $result=select_prodotti_detail($connect, $id);
            $valori = mysqli_fetch_array($result);
            $codice=$valori["codice_articolo"];
            $nome=$valori['nome'];
            $colore=$valori['colore'];
            $brand=$valori['brand'];
            $costo=$valori['costo'];
            $categoria=$valori['categoria'];
            $descrizione1=$valori['descrizione1'];
            $descrizione2=$valori['descrizione2'];
            $materiale=$valori['materiale'];
            $vestibilita=$valori['vestibilita'];
            $sconto=$valori['percentuale_sconto'];

      
      
                      if($sconto) {
                    $perc=($costo*$sconto)/100;
                    $prezzoscontato=$costo-$perc;} 

?>      
    <section>
<div class='container pt-5'>  
    
        <div class='d-block' id='addToCartAlert'>
                <?php
    if($car==1){ 
       echo" 
          <div class='mb-4 mb-lg-5 alert alert-success' role='alert'>
            <div class='d-flex align-items-center pr-3'>
              <svg class='svg-icon d-none d-sm-block w-3rem h-3rem svg-icon-light flex-shrink-0 mr-3'>
                <use xlink:href='#checked-circle-1'> </use>
              </svg>
              <p class='mb-0'>$nome have been added to your cart. <br class='d-inline-block d-lg-none'><a href='cart.php?err=0' class='text-reset text-decoration-underline ml-lg-3'>View Cart</a></p>
            </div>
            <button class='close close-absolute close-centered opacity-10 text-inherit' type='button' data-dismiss='alert' aria-label='Close'>
              <svg class='svg-icon w-2rem h-2rem'>
                <use xlink:href='#close-1'> </use>
              </svg>
            </button>
          </div>
        </div>";}
    if($car==2){ 
        echo"<div class='d-block' id='addToCartAlert'>
          <div class='mb-4 mb-lg-5 alert alert-success' id='alert' role='alert' style='background-color:#ff0000;display:block'>
            <div class='d-flex align-items-center pr-3'>
              <svg class='svg-icon d-none d-sm-block w-3rem h-3rem svg-icon-light flex-shrink-0 mr-3'>
                <use xlink:href='#delete-circle-1'> </use>
              </svg>
              <p class='mb-0'>Il Prodotto è già presente nel carrello! <br class='d-inline-block d-lg-none'></p>
            </div>
            <button class='close close-absolute close-centered opacity-10 text-inherit' type='button' data-dismiss='alert' aria-label='Close'>
              <svg class='svg-icon w-2rem h-2rem'>
                <use xlink:href='#close-1'> </use>
              </svg>
            </button>
          </div>
        </div>"; }
            
            
    if($car==3){ 
        echo"<div class='d-block' id='addToCartAlert'>
          <div class='mb-4 mb-lg-5 alert alert-success' id='alert' role='alert' style='background-color:#ff0000;display:block'>
            <div class='d-flex align-items-center pr-3'>
              <svg class='svg-icon d-none d-sm-block w-3rem h-3rem svg-icon-light flex-shrink-0 mr-3'>
                <use xlink:href='#delete-circle-1'> </use>
              </svg>
              <p class='mb-0'>Quantità del prodotto non disponibile! <br class='d-inline-block d-lg-none'></p>
            </div>
            <button class='close close-absolute close-centered opacity-10 text-inherit' type='button' data-dismiss='alert' aria-label='Close'>
              <svg class='svg-icon w-2rem h-2rem'>
                <use xlink:href='#close-1'> </use>
              </svg>
            </button>
          </div>
        </div>"; }
    if($car==4){ 
        echo"<div class='d-block' id='addToCartAlert'>
          <div class='mb-4 mb-lg-5 alert alert-success' id='alert' role='alert' style='background-color:#ff0000;display:block'>
            <div class='d-flex align-items-center pr-3'>
              <svg class='svg-icon d-none d-sm-block w-3rem h-3rem svg-icon-light flex-shrink-0 mr-3'>
                <use xlink:href='#delete-circle-1'> </use>
              </svg>
              <p class='mb-0'>La quantità del prodotto non può essere inferiore a 0! <br class='d-inline-block d-lg-none'></p>
            </div>
            <button class='close close-absolute close-centered opacity-10 text-inherit' type='button' data-dismiss='alert' aria-label='Close'>
              <svg class='svg-icon w-2rem h-2rem'>
                <use xlink:href='#close-1'> </use>
              </svg>
            </button>
          </div>
        </div>"; }
            
    if($car==5){ 
        echo"<div class='d-block' id='addToCartAlert'>
          <div class='mb-4 mb-lg-5 alert alert-success' id='alert' role='alert' style='background-color:#ff0000;display:block'>
            <div class='d-flex align-items-center pr-3'>
              <svg class='svg-icon d-none d-sm-block w-3rem h-3rem svg-icon-light flex-shrink-0 mr-3'>
                <use xlink:href='#delete-circle-1'> </use>
              </svg>
              <p class='mb-0'>Quantità non disponibile, numero massimo disponibile nel carrello raggiunto! <br class='d-inline-block d-lg-none'></p>
            </div>
            <button class='close close-absolute close-centered opacity-10 text-inherit' type='button' data-dismiss='alert' aria-label='Close'>
              <svg class='svg-icon w-2rem h-2rem'>
                <use xlink:href='#close-1'> </use>
              </svg>
            </button>
          </div>
        </div>"; }
            
    if($car==6){ 
       echo" 
          <div class='mb-4 mb-lg-5 alert alert-success' role='alert'>
            <div class='d-flex align-items-center pr-3'>
              <svg class='svg-icon d-none d-sm-block w-3rem h-3rem svg-icon-light flex-shrink-0 mr-3'>
                <use xlink:href='#checked-circle-1'> </use>
              </svg>
              <p class='mb-0'>$nome have been added to your cart. <br class='d-inline-block d-lg-none'></p>
            </div>
            <button class='close close-absolute close-centered opacity-10 text-inherit' type='button' data-dismiss='alert' aria-label='Close'>
              <svg class='svg-icon w-2rem h-2rem'>
                <use xlink:href='#close-1'> </use>
              </svg>
            </button>
          </div>
        </div>";}
            
            
            

    if($wish==1){ 
       echo" 
          <div class='mb-4 mb-lg-5 alert alert-success' role='alert'>
            <div class='d-flex align-items-center pr-3'>
              <svg class='svg-icon d-none d-sm-block w-3rem h-3rem svg-icon-light flex-shrink-0 mr-3'>
                <use xlink:href='#checked-circle-1'> </use>
              </svg>
              <p class='mb-0'>$nome have been added to your wishlist. <br class='d-inline-block d-lg-none'><a href='customer-wishlist.php?wish=0' class='text-reset text-decoration-underline ml-lg-3'>View wishlist</a></p>
            </div>
            <button class='close close-absolute close-centered opacity-10 text-inherit' type='button' data-dismiss='alert' aria-label='Close'>
              <svg class='svg-icon w-2rem h-2rem'>
                <use xlink:href='#close-1'> </use>
              </svg>
            </button>
          </div>
        </div>";}
    if($wish==2){ 
        echo"<div class='d-block' id='addToCartAlert'>
          <div class='mb-4 mb-lg-5 alert alert-success' id='alert' role='alert' style='background-color:#ff0000;display:block'>
            <div class='d-flex align-items-center pr-3'>
              <svg class='svg-icon d-none d-sm-block w-3rem h-3rem svg-icon-light flex-shrink-0 mr-3'>
                <use xlink:href='#delete-circle-1'> </use>
              </svg>
              <p class='mb-0'>Il Prodotto è già presente nela wishlist! <br class='d-inline-block d-lg-none'></p>
            </div>
            <button class='close close-absolute close-centered opacity-10 text-inherit' type='button' data-dismiss='alert' aria-label='Close'>
              <svg class='svg-icon w-2rem h-2rem'>
                <use xlink:href='#close-1'> </use>
              </svg>
            </button>
          </div>
        </div>"; }

        ?>


        <ul class="breadcrumb undefined">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active"><?php echo" $categoria"; ?>   </li>
        </ul>
        <div class="row">
          <div class="col-lg-7 order-2 order-lg-1">
            <div class="detail-carousel">
                <?php
                $result=select_prodotti_fresh($connect);
                 while($fresh = mysqli_fetch_array($result)){
                     if($id==$fresh["id"])                     
              echo"<div class='product-badge badge badge-secondary'>Fresh</div>";}
                 if($sconto) 
                     
                    echo" <div class='product-badge badge badge-primary'>Sale</div>";
                ?>
              <div class="swiper-container detail-slider photoswipe-gallery" id="detailSlider">
                <!-- Additional required wrapper-->
                <div class="swiper-wrapper">
                  <!-- Slides-->
                            <?php
                    $result=select_immagini_detail($connect, $id);
                     while($row = mysqli_fetch_array($result)){
                         $immagine=$row["nome"];
                         echo"
                  <div class='swiper-slide'>   
              
       
                    <div data-toggle='zoom' data-image=\"./backend/upload/$immagine\"><img class='img-fluid' src=\"./backend/upload/$immagine\" alt='$nome'></div>
                  </div>";} ?>
                  
                </div>
              </div>
            </div>
            <div class="swiper-thumbs" data-swiper="#detailSlider">
                <?php
                    $result=select_immagini_detail($connect, $id);
                     while($row = mysqli_fetch_array($result)){
                         $immagine=$row["nome"];
                        echo" 
              <button class='swiper-thumb-item detail-thumb-item mb-3 active'><img class='img-fluid' src=\"./backend/upload/$immagine\" alt='$nome'></button>";} ?>

            </div>
          </div>

            
          <div class="col-lg-5 pl-lg-4 order-1 order-lg-2">
        <?php    echo"<h1 class='mb-4'>$nome</h1>"; ?>
            <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-sm-between mb-4">
              <ul class="list-inline mb-2 mb-sm-0">
                  
                <?php if(!$sconto){ echo"<li class='list-inline-item h4 font-weight-light mb-0'>$ $costo</li>";}
                      else{ echo"<li class='list-inline-item h4 font-weight-light mb-0'>$ $prezzoscontato</li>";} ?>
                <li class="list-inline-item text-muted font-weight-light"> 
                   <?php if($sconto) echo "<del>$ $costo</del>";
?>
                </li>
              </ul>
              <div class="d-flex align-items-center text-sm">
                <ul class="list-inline mr-2 mb-0">
                    <?php $media=select_media_recensioni($connect,$id);
                            $mediaARR=round($media);
                    $cont=0;
                    while($cont<$mediaARR){
                        echo"<li class='list-inline-item mr-0'><i class='fa fa-star text-primary'></i></li>";
                        $cont++;}
                    while($cont<5){
                        echo"<li class='list-inline-item mr-0'><i class='fa fa-star text-gray-300'></i></li>";
                        $cont++;} ?>
                    </ul>

                <?php 
                   $tot=select_totale_recensioni($connect,$id);
                    
                  echo"  <span class='text-muted text-uppercase'>$tot reviews</span>";
                ?> 
              </div>
            </div>
           <?php echo" <p class='mb-4 text-muted'>$descrizione1</p>";
          if(isset($_SESSION['id']))

        echo"    <form method='POST' enctype='multipart/form-data' action='./functions/insert_carrello.php?idC=$idutente&idP=$id'>";
              else 
                  echo"<form method='POST' enctype='multipart/form-data' action='./functions/insert_carrello.php?idP=$id'>";
              ?>
              <div class="row">
                <div class="col-sm-6 col-lg-12 detail-option mb-4">
                  <h6 class="detail-option-heading">Size <span>(required)</span></h6>
              
                  <select class='selectpicker' name='size' data-style='btn-selectpicker' id='tagliaW' onchange='prova()'>
                      
                            <?php
                      echo"<option value='$tagliaI'>$tagliaI</option>";
                    $result=select_taglia_detail($connect, $id);
                      $contT=0;
                     while($row = mysqli_fetch_array($result)){
                         $contT++;
                            
                            $quantita=$row['quantita'];
                            $taglia=$row['tipologia'];
                    if($taglia!=$tagliaI)
                    echo"<option value='$taglia'>$taglia</option>";} ?>
             
                  </select>
                       
                        
                </div>
                <div class="col-sm-6 col-lg-12 detail-option mb-3">
                    <table>
                        <tr>
                        <td><h6 class="detail-option-heading">Brand&emsp;</td>
                        <td><label style="background-color: white" class="btn-outline-primary" id="material_0" value="value_0"> <?php echo" $brand"; ?></label></td>
                        </tr>
                        <tr>
                        <td><h6 class="detail-option-heading">Colore&emsp;</h6></td>
                        <td><label style="background-color: white;" class="btn-outline-primary" id="material_1" value="value_1"><?php echo"$colore"; ?></td>
                        </tr>
                        <tr>
                        <td><h6 class="detail-option-heading">Categoria&emsp;</h6></td>
                        <td><label style="background-color: white;" class="btn-outline-primary" id="material_1" value="value_1"><?php echo"$categoria"; ?></td>
                        </tr>
                        </tr>
                    </table>
                  </label>
                    </table>
                </div>
              </div>
              <div class="input-group w-100 mb-4">
                <input class="form-control form-control-lg detail-quantity" name="items" pattern="[1-9]+[0-9]{0,}" value="1">
                  
                <div class="input-group-append flex-grow-1">
                <button class="btn btn-dark btn-block" type="submit"> <i class="fa fa-shopping-cart mr-2"></i>Add to Cart</button>
                </div>
              </div>
              <div class="row mb-4">
                  <?php  if(isset($_SESSION['id']))
                            echo"<div class='col-6'><a href='./functions/insert_wishlist.php?idL=$idutente&idP=$id&taglia=$tagliaI'> <i class='far fa-heart mr-2'></i>Add to wishlist </a></div>"; ?>
                <div class="col-6 text-right">
                </div>
              </div>
              <ul class="list-unstyled">

                <?php echo"<br>
                            <li><h5>Prodotti Simili:</h5></li>";
    
                      
                      $query="SELECT c.nome, c.hexcode, p.id from prodotto p join colore c on(p.id_colore=c.id) where codice_articolo='$codice' and p.id!=$id";
                      $dati=mysqli_query($connect, $query)
                        or die ("Non riesco ad eseguire la query $dati");

echo" <div class='swiper-thumbs' data-swiper='#detailSlider'>";
                 while($valori = mysqli_fetch_array($dati)){
                     
                        $colore2=$valori["nome"];
                        $hex=$valori["hexcode"];
                        $idP2=$valori["id"];
                    if($idP2){
                        $tagliaPartenza=select_prodotto_tagliaI($connect, $idP2);
                      $result=select_immaginiP_detail($connect, $idP2);
                        $row=mysqli_fetch_array($result);
                          $immagine=$row["nome"];

                    
echo" 
                        
                           <a href='detail-1.php?id=$idP2&car=0&wish=0&taglia=$tagliaPartenza'><img class='img-fluid' style='max-width:100px ; max-height: 140px; border: 0.5px solid black;'src=\"./backend/upload/$immagine\" ></a>&emsp;
               

                  ";}}// alt='$nome'?>
             </div>
              </ul>
            <?php

            
            ?>
            
            
            
            </form>
          </div>
        </div>
      </div>
    </section>
    <section class="mt-5">
      <div class="container">
        <ul class="nav nav-tabs flex-column flex-sm-row" role="tablist">
          <li class="nav-item"><a class="nav-link detail-nav-link active" data-toggle="tab" href="#description" role="tab">Description</a></li>
          <li class="nav-item"><a class="nav-link detail-nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews</a></li>
        </ul>
        <div class="tab-content py-4">
          <div class="tab-pane fade show active px-3" id="description" role="tabpanel">
            <div class="row">
              <div class="col-md-7">
                <h5>About</h5>
                <p class="text-muted"><?php echo"$descrizione2 <br><br> Materiale: $materiale <br> Vestibilità: $vestibilita <br> Codice articolo: $codice";  ?></p>
               
              </div>
                <?php
                
                $result=select_immaginiP_detail($connect, $id);
                  $row = mysqli_fetch_array($result);
                         $immagine=$row["nome"];
                ?>
              <?php echo"<div class='col-md-5'><img class='img-fluid' style='max-width: 300px' src=\"./backend/upload/$immagine\" alt='$nome'></div>"; ?>
            </div>
          </div>
          <div class="fade tab-pane" id="additional-information" role="tabpanel">
            <div class="row">
              <div class="col-lg-6">
                <table class="table text-sm">
                  <tbody>
                    <tr>
                      <th class="font-weight-normal border-0">Product #</th>
                      <td class="text-muted border-0">Lorem ipsum dolor sit amet</td>
                    </tr>
                    <tr>
                      <th class="font-weight-normal ">Available packaging</th>
                      <td class="text-muted ">LOLDuis aute irure dolor in reprehenderit</td>
                    </tr>
                    <tr>
                      <th class="font-weight-normal ">Weight</th>
                      <td class="text-muted ">dolor sit amet</td>
                    </tr>
                    <tr>
                      <th class="font-weight-normal ">Sunt in culpa qui</th>
                      <td class="text-muted ">Lorem ipsum dolor sit amet</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-lg-6">
                <table class="table text-sm">
                  <tbody>
                    <tr>
                      <th class="font-weight-normal border-0">Weight</th>
                      <td class="text-muted border-0">dolor sit amet                           </td>
                    </tr>
                    <tr>
                      <th class="font-weight-normal ">Sunt in culpa qui</th>
                      <td class="text-muted ">Lorem ipsum dolor sit amet                           </td>
                    </tr>
                    <tr>
                      <th class="font-weight-normal ">Product #</th>
                      <td class="text-muted ">Lorem ipsum dolor sit amet                           </td>
                    </tr>
                    <tr>
                      <th class="font-weight-normal ">Available packaging</th>
                      <td class="text-muted ">LOLDuis aute irure dolor in reprehenderit                           </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="reviews" role="tabpanel">
            <div class='row mb-5'>
                <div class='col-lg-10 col-xl-9'>
                                     <?php
                  $result=select_recensione($connect,$id);
                    $contRec=0;
                      while($row = mysqli_fetch_array($result)){
                          $contRec++;
                          $dettaglio=$row["dettaglio"];
                          $dettaglio=str_replace("&ap;", "'", $dettaglio);
                          $nome=$row["nome"];
                          $cognome=$row["cognome"];
                          $valutazione=$row["valutazione"];


                          echo"                   
                <div class='media review'>
                  <div class='text-center mr-4 mr-xl-5'><h2 class='review-image' style='border-radius: 30px; border-color: gray'>$nome[0] $cognome[0]</h2></div>
                  <div class='media-body'>
                    <h5 class='mt-2 mb-1'>$nome $cognome </h5>
                    <div class='mb-2'>";
                          $cont=0;
                    while($cont<$valutazione){
                        echo"<i class='fa fa-xs fa-star text-warning'></i>";
                        $cont++;}
                    while($cont<5){
                        echo"<i class='fa fa-star text-gray-300'></i>";
                        $cont++;}
                   

                echo"    </div>
                    <p class='text-muted'>$dettaglio</p>
                  </div>
                  </div>";  }
                    
                if($contRec==0)
                    echo "<center> <b><br> Nessuna recensione rilasciata </b> </center>";
                  
                  
                  
            if(isset($_SESSION["id"])){
              echo"  <div class='py-5 px-3'>
                  <h5 class='mb-4'>Leave a review</h5>
                  <form method='POST' enctype='multipart/form-data' action='./functions/insert_recensione.php?taglia=$tagliaI'>
                    <div class='row'>
                      <div class='col-sm-6'>
                        <div class='form-group'>
                          <label class='form-label' for='name'>Your name:</label><br>
                          <b> ";
                              if(isset($_SESSION['id']))  
                                echo $_SESSION['nome'] . "&nbsp;" . $_SESSION['cognome'] ; 
                   echo"      </b>  </div>
                      </div>
                      <div class='col-sm-6'>
                        <div class='form-group'>
                          <label class='form-label' for='rating'>Your rating *</label>
                          <select class='custom-select focus-shadow-0' name='rating' id='rating'>
                            <option value='5'>&#9733;&#9733;&#9733;&#9733;&#9733; (5/5)</option>
                            <option value='4'>&#9733;&#9733;&#9733;&#9733;&#9734; (4/5)</option>
                            <option value='3'>&#9733;&#9733;&#9733;&#9734;&#9734; (3/5)</option>
                            <option value='2'>&#9733;&#9733;&#9734;&#9734;&#9734; (2/5)</option>
                            <option value='1'>&#9733;&#9734;&#9734;&#9734;&#9734; (1/5)</option>
                          </select>
                        </div>
                      </div>
                    </div>
       
                    <div class='form-group'>
                      <label class='form-label' for='reviewReview'>Review text *</label>
                      <textarea class='form-control' rows='4' name='dettaglio' id='reviewReview' placeholder='Enter your review' required></textarea>
                    </div>
                
                    <button class='btn btn-outline-dark' name='inviaRec' type='submit'>Post review</button>";
                     $_SESSION["idprodotto"]=$id; 
                            
                    //echo"<input type='text' style='display:none' name='idprodotto' value=$id></input>"; 
                echo"  </form>
                </div>"; }
            
                
                ?>
                
                
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
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

              <!-- cart item-->
                <?php

                
                // DA QUI!!!!!!!!!!!!!!!!!!
                
                
                
                $costo_totale=0;
                                $tot_prodotti=0;

                if(!isset($_SESSION['ruolo'])){

                    if($_SESSION['carrello']!=null){
                        $max=sizeof($_SESSION['carrello']);
                        for($i=0; $i<$max; $i+=4) {


                                $id = $_SESSION['carrello'][$i];
                                $taglia = $_SESSION['carrello'][$i+1];
                            $quantita = $_SESSION['carrello'][$i+2];
                            $imm = $_SESSION['carrello'][$i+3];
                                $result=select_prodotti_detail($connect,$id);
                                while($row = mysqli_fetch_array($result)){


                                    $nome=$row['nome'];
                                    $costo=$row['costo'];
                                    $sconto=$row['percentuale_sconto'];
                                    if($sconto) {
                                        $perc=($costo*$sconto)/100;
                                        $prezzoscontato=$costo-$perc;
                                        $tot_prodotto=$quantita*$prezzoscontato;
                                        $tot_prodotti+=$tot_prodotto;
                                    }
                                    else  { 
                                        $tot_prodotto=$quantita*$costo;
                                        $tot_prodotti+=$tot_prodotto;
                                        }
                                   
                                    echo"<div class='navbar-cart-product'> 
                                            <div class='d-flex align-items-center'><a href='detail-1.php?id=$id&wish=0&car=0&taglia=$taglia'><img class='img-fluid navbar-cart-product-image' src='./backend/upload/$imm' alt='...'/></a>
                                                <div class='w-100'><a class='close' href='./functions/carrello_senzasessione_delete.php?i=$i&pro=2'>
                                                    <svg class='svg-icon sidebar-cart-icon'>
                                                        <use xlink:href='#close-1'> </use>
                                                    </svg></a>
                                                    <div class='pl-3'> <a class='navbar-cart-product-link text-dark link-animated' href='detail-1.php?id=$id&wish=0&car=0&taglia=$taglia'>$nome - $taglia</a><small class='d-block text-muted'>Quantity: $quantita </small>"; if(!$sconto){ echo"$$costo";}  else { echo"<del style='color:red'>$$costo</del> $$prezzoscontato ";}echo"   </strong></div>"; 
                                              echo"  </div>
                                            </div>
                                        </div>";

                                }
                            }
                            }

                else{  //CARRELLO VOUTO
                    echo"<div class='navbar-cart-product'> 
                                        <div class='d-flex align-items-center'>
                                            <div class='w-100'>
                                                <div class='pl-3' style='text-align: center'>Cart Empty</div>
                                            </div>
                                        </div>
                                      </div>";

                    }
                 }
            else{
                //METTERE LA QUERY CARRELLO UTENTE LOGGATO
                
                    $result=carrello_accesso($connect,$_SESSION['id']);
                    $idC=$_SESSION['id'];

                  $numprodotti=0;
                    while($row = mysqli_fetch_array($result)){

                    $idP=$row["prodotto"];
                    $idT=$row["idtaglia"];    
                    $nome_prodotto=$row["nome_prodotto"];
                    $costo=$row["costo"];
                    $sconto=$row["percentuale_sconto"];

                        if($sconto) {
                            $perc=($costo*$sconto)/100;
                            $prezzoscontato=$costo-$perc;
                            }
                    $resultimm=select_immaginiP_detail($connect, $idP);
                     $inf=mysqli_fetch_array($resultimm);
                        $foto=$inf["nome"];
                    $colore=$row["colore"];
                    $quantita=$row["quantita"];
                    $quantitatotale=$row["quantitatotale"];
                    $taglia=$row["taglia"];
                if($sconto) {
                    $tot_prodotto=$quantita*$prezzoscontato;
                        $tot_prodotti+=$tot_prodotto;
                    }
                     else  { 
                        $tot_prodotto=$quantita*$costo;
                        $tot_prodotti+=$tot_prodotto;
                        }
                        $numprodotti++;
                echo"<div class='navbar-cart-product'> 
                <div class='d-flex align-items-center'><a href='detail-1.php?id=$idP&wish=0&car=0&taglia=$taglia'><img class='img-fluid navbar-cart-product-image' src='./backend/upload/$foto' alt='...'/></a>
                  <div class='w-100'><a class='close' href='./functions/carrello_delete.php?idC=$idC&idP=$idP&taglia=$taglia&pro=2'>
                      <svg class='svg-icon sidebar-cart-icon'>
                        <use xlink:href='#close-1'> </use>
                      </svg></a>
                    <div class='pl-3'> <a class='navbar-cart-product-link text-dark link-animated' href='detail-1.php?id=$idP&wish=0&car=0&taglia=$taglia'>$nome_prodotto  - $taglia</a><small class='d-block text-muted'>Quantity: $quantita </small><strong class='d-block text-sm'>";if(!$sconto){ echo"$$costo";}  else { echo"<del style='color:red'>$$costo</del> $$prezzoscontato ";}echo"   </strong></div>
                  </div>
                </div>
              </div>";}
            if($numprodotti==0){
                echo"<div class='navbar-cart-product'> 
                    <div class='d-flex align-items-center'>
                        <div class='w-100'>
                            <div class='pl-3' style='text-align: center'>Cart Empty</div>
                        </div>
                    </div>
                </div>";
                
            }}

                
                ?>



            </div>

          </div>

          <div class="modal-footer sidebar-cart-footer shadow">
            <div class="w-100">
              <h5 class="mb-4">Subtotal: <span class="float-right"><?php echo"$ $tot_prodotti"; ?></span></h5>
              <?php if(isset($_SESSION['ruolo'])){  echo"<a class='btn btn-outline-dark btn-block mb-3' href='cart.php?err=0'>View cart</a>"; } ?>
                              <?php if(isset($_SESSION['ruolo'])){
                        if($numprodotti){
                            echo"<a class='btn btn-dark btn-block' href='checkout.php'>Checkout</a>";}
                        else{ 
                            echo"<a class='btn btn-dark btn-block' href=''>Checkout</a>";}
                }
                else{
                    if($_SESSION['carrello']!=null){
                        echo"<a class='btn btn-dark btn-block' href='customer-login.php'>Checkout</a>";} 
                    else{ 
                        echo"<a class='btn btn-dark btn-block' href=''>Checkout</a>";}
                
                } 
                  // A QUI!!!!!!!!!!!!!!!!!!
                
                ?>
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
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Quickview Modal    -->
    <div class="modal fade quickview" id="quickView" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <button class="close close-absolute close-rotate" type="button" data-dismiss="modal" aria-label="Close">
            <svg class="svg-icon w-3rem h-3rem svg-icon-light align-middle">
              <use xlink:href="#close-1"> </use>
            </svg>
          </button>
          <div class="modal-body quickview-body">
            <div class="row">
              <div class="col-lg-6">
                <div class="detail-carousel">
                  <div class="product-badge badge badge-primary">Fresh</div>
                  <div class="product-badge badge badge-dark">Sale</div>
                  <div class="swiper-container quickview-slider" id="quickViewSlider">
                    <!-- Additional required wrapper-->
                    <div class="swiper-wrapper">
                      <!-- Slides-->
                      <div class="swiper-slide"><img class="img-fluid" src="img/product/detail-1-gray.jpg" alt="Modern Jacket 1"></div>
                      <div class="swiper-slide"><img class="img-fluid" src="img/product/detail-2-gray.jpg" alt="Modern Jacket 2"></div>
                      <div class="swiper-slide"><img class="img-fluid" src="img/product/detail-3-gray.jpg" alt="Modern Jacket 3"></div>
                      <div class="swiper-slide"><img class="img-fluid" src="img/product/detail-4-gray.jpg" alt="Modern Jacket 4"></div>
                      <div class="swiper-slide"><img class="img-fluid" src="img/product/detail-5-gray.jpg" alt="Modern Jacket 5"></div>
                    </div>
                  </div>
                  <div class="swiper-thumbs" data-swiper="#quickViewSlider">
                    <button class="swiper-thumb-item detail-thumb-item mb-3 active"><img class="img-fluid" src="img/product/detail-1-gray.jpg" alt="Modern Jacket 0"></button>
                    <button class="swiper-thumb-item detail-thumb-item mb-3"><img class="img-fluid" src="img/product/detail-2-gray.jpg" alt="Modern Jacket 1"></button>
                    <button class="swiper-thumb-item detail-thumb-item mb-3"><img class="img-fluid" src="img/product/detail-3-gray.jpg" alt="Modern Jacket 2"></button>
                    <button class="swiper-thumb-item detail-thumb-item mb-3"><img class="img-fluid" src="img/product/detail-4-gray.jpg" alt="Modern Jacket 3"></button>
                    <button class="swiper-thumb-item detail-thumb-item mb-3"><img class="img-fluid" src="img/product/detail-5-gray.jpg" alt="Modern Jacket 4"></button>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 p-lg-5">
                <h2 class="mb-4 mt-4 mt-lg-1">Push-up Jeans</h2>
                <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-sm-between mb-4">
                  <ul class="list-inline mb-2 mb-sm-0">
                    <li class="list-inline-item h4 font-weight-light mb-0">$65.00</li>
                    <li class="list-inline-item text-muted font-weight-light"> 
                      <del>$90.00</del>
                    </li>
                  </ul>
                  <div class="d-flex align-items-center text-sm">
                    <ul class="list-inline mr-2 mb-0">
                      <li class="list-inline-item mr-0"><i class="fa fa-star text-primary"></i></li>
                      <li class="list-inline-item mr-0"><i class="fa fa-star text-primary"></i></li>
                      <li class="list-inline-item mr-0"><i class="fa fa-star text-primary"></i></li>
                      <li class="list-inline-item mr-0"><i class="fa fa-star text-primary"></i></li>
                      <li class="list-inline-item mr-0"><i class="fa fa-star text-gray-300"></i></li>
                    </ul><span class="text-muted text-uppercase">25 reviews</span>
                  </div>
                </div>
                <p class="mb-4 text-muted">Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame.</p>


                  <form id="buyForm_modal" action="">
                  <div class="row">
                    <div class="col-sm-6 col-lg-12 detail-option mb-4">
                      <h6 class="detail-option-heading">Size <span>(required)</span></h6>
                      <select class="selectpicker" name="size" data-style="btn-selectpicker">
                        <option value="value_0">Small</option>
                        <option value="value_1">Medium</option>
                        <option value="value_2">Large</option>
                      </select>
                    </div>
                    <div class="col-sm-6 col-lg-12 detail-option mb-5">
                      <h6 class="detail-option-heading">Type <span>(required)</span></h6>
                      <label class="btn btn-sm btn-outline-primary detail-option-btn-label" for="material_0_modal"> Hoodie
                        <input class="input-invisible" type="radio" name="material" value="value_0" id="material_0_modal" required>
                      </label>
                      <label class="btn btn-sm btn-outline-primary detail-option-btn-label" for="material_1_modal"> College
                        <input class="input-invisible" type="radio" name="material" value="value_1" id="material_1_modal" required>
                      </label>
                    </div>
                  </div>
                  <div class="input-group w-100 mb-4">
                    <input class="form-control form-control-lg detail-quantity" name="items" type="number" value="1">
                    <div class="input-group-append flex-grow-1">
                      <button class="btn btn-dark btn-block" type="submit"> <i class="fa fa-shopping-cart mr-2"></i>Add to Cart</button>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-6"><a href="#"> <i class="far fa-heart mr-2"></i>Add to wishlist </a></div>
                    <div class="col-6 text-right">
                    </div>
                  </div>
                  <ul class="list-unstyled">
                    <li><strong>Category:</strong> <a class="text-muted" href="#">Jeans</a></li>
                    <li><strong>Tags:</strong> <a class="text-muted" href="#">Leisure</a>, <a class="text-muted" href="#">Elegant</a></li>
                  </ul>
                </form>
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
    <!-- /Footer end-->
      

      
      
      
      
      
      
    <!-- JavaScript files-->
    <script>

              function prova(){
                select=document.getElementById("tagliaW");
                valore=select.options[select.selectedIndex].value;
              <?php $id=$_COOKIE['id_prodotto_shop'];echo"    window.open('detail-1.php?id=$id&car=0&wish=0&taglia='+valore, name='_self')"; ?>

                   }     
        
        
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
      -*
      !-- Custom Scrollbar-->
    <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom-scrollbar-init.js"></script>
    <!-- Smooth scroll-->
    <script src="vendor/smooth-scroll/smooth-scroll.polyfills.min.js"></script>
    <!-- Object Fit Images - Fallback for browsers that don't support object-fit-->
    <script src="vendor/object-fit-images/ofi.min.js"></script>
    <!-- PhotoSwiper gallery-->
    <script src="vendor/photoswipe/photoswipe.min.js"></script>
    <script src="vendor/photoswipe/photoswipe-ui-default.min.js"></script>
    <script src="js/photoswipe-init.js"></script>
    <!-- Image Zoom plugin-->
    <script src="vendor/jquery-zoom/jquery.zoom.min.js"></script>
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
    <!-- Root element of PhotoSwipe. Must have class pswp.-->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
      <!--
      Background of PhotoSwipe.
      It's a separate element as animating opacity is faster than rgba().
      -->
      <div class="pswp__bg"></div>
      <!-- Slides wrapper with overflow:hidden.-->
      <div class="pswp__scroll-wrap">
        <!--
        Container that holds slides.
        PhotoSwipe keeps only 3 of them in the DOM to save memory.
        Don't modify these 3 pswp__item elements, data is added later on.
        -->
        <div class="pswp__container">
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
        </div>
        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed.-->
        <div class="pswp__ui pswp__ui--hidden">
          <div class="pswp__top-bar">
            <!-- Controls are self-explanatory. Order can be changed.-->
            <div class="pswp__counter"></div>
            <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
            <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
            <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
            <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR-->
            <!-- element will get class pswp__preloader--active when preloader is running-->
            <div class="pswp__preloader">
              <div class="pswp__preloader__icn">
                <div class="pswp__preloader__cut">
                  <div class="pswp__preloader__donut"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
            <div class="pswp__share-tooltip"></div>
          </div>
          <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
          <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
          <div class="pswp__caption">
            <div class="pswp__caption__center text-center"></div>
          </div>
        </div>
      </div>
    </div>
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