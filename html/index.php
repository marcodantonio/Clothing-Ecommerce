<!DOCTYPE html>
<html lang="en">
  <head>
      <?php
      include("./functions/users.php");
      include("./functions/connection.php");
      include("./functions/product_pull.php");

      controllo_utente();
      ob_start(); 
      $connect=connection();
$query="SELECT * FROM Sito where id=1";
     $dati=mysqli_query($connect, $query)
                or die ("Non riesco ad eseguire la query $dati");
     $valori=mysqli_fetch_array($dati);
     $nomenegozio=$valori["Nome_negozio"];
     $nuoviarrivi=$valori["Nuovi_arrivi"];
     $descrizionenegozio=$valori["Descrizione_negozio"];
     $descrizioneabbigliamento=$valori["Descrizione_abbigliamento"];
     $fotouomo=$valori["uomo"];
     $fotodonna=$valori["donna"];



      ?>
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
                  </svg></a></li>

          </ul>
        </div>
      </nav>
    </header>
    <!-- Slider main container-->
    <div class="swiper-container home-slider" style="height: 95vh; min-height: 600px;">
      <!-- Additional required wrapper-->
      <div class="swiper-wrapper">

          <!--                                    SLIDER                   -->
<?php 
$query="SELECT * FROM slider";
     $dati=mysqli_query($connect, $query)
                or die ("Non riesco ad eseguire la query $dati");
    while($row=mysqli_fetch_array($dati)){
        $foto=$row["foto"];
        $titolo=$row["titolo"];
        $descrizione=$row["descrizione"];
        $nome_bottone=$row["nome_bottone"];
        $link_bottone=$row["link_bottone"];
//$titolo1=explode($titolo, " ");
        


echo"
        <div class='swiper-slide bg-cover bg-cover-right' style=\"background-image: url('./backend/upload/slider/$foto');\">
          <div class='container-fluid px-lg-6 px-xl-7 h-100'>
            <div class='row h-100 align-items-center' data-swiper-parallax='-500'>
              <div class='col-lg-6'>
                <p class='subtitle letter-spacing-3 mb-3 text-dark font-weight-light'>$descrizione</p>
                <h2 class='display-1 mb-3' style='line-height: 1'>$titolo</h2>
               <a class='btn btn-dark' href='./$link_bottone.php'>$nome_bottone</a>
              </div>
            </div>
          </div>
        </div>";
          } ?>
          








      </div>
      <div class="swiper-pagination"></div>
      <div class="swiper-nav d-none d-lg-block">
        <div class="swiper-button-prev" id="homePrev"></div>
        <div class="swiper-button-next" id="homeNext"></div>
      </div>
    </div>
    <!-- Categories big-->

    <!-- <div class="bg-gray-100 position-relative"> -->
        <div class="container py-6">
            <div class="row">
                <div class="col-lg-13 col-xl-10 text-center mx-auto">
                    <h2 class="display-3 mb-5"><?php echo"$nomenegozio"; ?></h2>
                    <p class="lead text-muted mb-6"><?php echo"$descrizionenegozio"; ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5 mb-5 mb-sm-0" style="left:100px">
                    <div class="card card-scale shadow-0 border-0 text-white text-hover-gray-900 overlay-hover-light text-center"><img class="card-img img-scale" s<?php echo" src='./backend/upload/index_uomo_donna/$fotodonna'"; ?>  alt="Card image">
                        <div class="card-img-overlay d-flex align-items-center">
                            <div class="w-100 py-3">
                                <h2 class="display-3 font-weight-bold mb-0">Women</h2><a class="stretched-link" onclick="forr('Donna')"><span class="sr-only">See </span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5 mb-5 mb-sm-0" style="left:100px">
                    <div class="card card-scale shadow-0 border-0 text-white text-hover-gray-900 overlay-hover-light text-center"><img class="card-img img-scale" <?php echo" src='./backend/upload/index_uomo_donna/$fotouomo'"; ?> alt="Card image">
                        <div class="card-img-overlay d-flex align-items-center">
                            <div class="w-100 py-3">
                                <h2 class="display-3 font-weight-bold mb-0">Men</h2><a class="stretched-link" onclick="forr('Uomo')"><span class="sr-only">See </span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                    <?php
                    $query="SELECT p.id, codice_sconto, p.nome,scadenza, costo, percentuale_sconto, t.tipologia as taglia, i.nome as foto, s.scadenza FROM sconto s join prodotto p on(p.id_sconto=s.id) left join taglia_prodotto tp on (tp.id_prodotto=p.id) left join taglia t on (tp.id_taglia=t.id) join immagine i on (i.id_prodotto=p.id) limit 1";
                         $dati=mysqli_query($connect, $query)
                                    or die ("Non riesco ad eseguire la query $dati");
                        $valori=mysqli_fetch_array($dati);
                        $idprodotto=$valori["id"];
                        $foto=$valori["foto"];
                        $data=$valori["scadenza"];
                        $tagliaPartenza=$valori['taglia'];
                        $nomesconto=$valori["codice_sconto"];
                        $nomeprodotto=$valori["nome"];
                        $costo=$valori['costo'];
                        $sconto=$valori['percentuale_sconto'];
                        $scadenza=$valori['scadenza'];
                        $perc=($costo*$sconto)/100;
                        $prezzoscontato=$costo-$perc;
                        

      
      
      
      
$scadenzaDiv = explode("-", $scadenza);
$scadenza= $scadenzaDiv[2]."-".$scadenzaDiv[1]."-".$scadenzaDiv[0];
$end = "$scadenza";
$start = date ("d-m-Y");

list($start_day, $start_month, $start_year) = preg_split('/[-\.\/: ]/', $start);
list($end_day, $end_month, $end_year) = preg_split('/[-\.\/: ]/', $end);
$year_diff = $end_year - $start_year; 
$month_diff = $end_month - $start_month; 
$day_diff = $end_day - $start_day; 
      
if ($day_diff < 0 || $month_diff < 0) {
    $year_diff--; 
}

      
list($start_day, $start_month, $start_year) = preg_split('/[-\.\/: ]/', $start);
list($end_day, $end_month, $end_year) = preg_split('/[-\.\/: ]/', $end);
$year_diff = $end_year - $start_year;
if ($end_month < $start_month) {
    $year_diff--;
} elseif ($end_day < $start_day) {
    $year_diff--;
}
      
      
$meseingiorno=$month_diff*30;
$giorniallascadenza=$meseingiorno+$day_diff;


      
      
      
      
      
      
      
      
      
      
      
      
      
                                        
                    ?>
    <?php echo"<div class='py-6 bg-cover bg-cover-right' style='background-image: url(./backend/upload/$foto);'>"; ?>
        <div class="container">
            <div class="row">
                <div class="col-6">

                    
                    <p class="subtitle mb-3 text-danger"><?php echo"$nomesconto"; ?></p>
                    <h3 class="h1"><?php echo"$nomeprodotto"; ?></h3>
                    <p class="text-muted">
                        <del class="mr-3"><?php echo"$$costo"; ?></del><span><?php echo"$$prezzoscontato"; ?></span>
                    </p>
                    <p class="mb-4"><span class="badge badge-danger p-3"><?php echo"$$perc off"; ?></span></p>
                    <div class="bg-white px-5 py-4 shadow mb-4" id="countdown" style="max-width:24%">
                        <div class="row justify-content-between">
                            <div class="col-6 col-sm-3 text-center mb-4 mb-sm-0">
                                <h6 class="h4 mb-2 days">&nbsp;</h6><span class="text-muted">days</span>
                            </div>
                        </div>
                    </div>
                 <?php echo"   <p><a class='btn btn-outline-dark' href='detail-1.php?id=$idprodotto&car=0&wish=0&taglia=$tagliaPartenza'>Shop now</a></p>"; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->

    <div class="container-fluid container-fluid-px py-6">
      <div class="row">
        <div class="col-lg-10 col-xl-8 text-center mx-auto">
          <h2 class="display-3 mb-5"><?php echo"$nuoviarrivi"; ?></h2>
          <p class="lead text-muted mb-6"><?php echo"$descrizioneabbigliamento"; ?></p>
        </div>
      </div>
      <div class="row">
    
        <!-- product-->
          <?php
          $numprodotti=0;
          $result=select_prodotti_index($connect);
        while($row = mysqli_fetch_array($result)){
            if($numprodotti<12){
            $idprodotto=$row['id'];
            $idtaglia=$row['id_taglia'];
            $tagliaPartenza=$row['taglia'];
            $cod=$row['codice_articolo'];
            $nome=$row['nome'];
            $foto=$row['foto'];
            $colore=$row['colore'];
            $brand=$row['brand'];
            $costo=$row['costo'];
            $categoria=$row['categoria'];
            $taglia=$row['taglia'];
                  $sconto=$row['percentuale_sconto'];
                if($sconto) {
                    $perc=($costo*$sconto)/100;
                    $prezzoscontato=$costo-$perc;} 
            $foto2=select_immagine2_shop($connect,$idprodotto);
            
        echo"<div class='col-xl-2 col-lg-3 col-md-4 col-6' style='margin: 1rem; background-color: #; border-radius: 1rem'> <!-- #ede8da -->
                        <div class='product' data-aos='zoom-in' data-aos-delay='0'>
                <div class='product-image mb-md-3' style='border-radius: 1rem; top: 0.8rem'>";
                            $pio=select_prodotti_fresh($connect);
                 while($fresh = mysqli_fetch_array($pio)){
                     if($idprodotto==$fresh["id"])    
                 echo" <div class='product-badge badge badge-secondary'>Fresh</div>";}
                 if($sconto)    
                echo"  <div class='product-badge badge badge-dark'>Sale</div>";
            echo"
                  <a href='detail-1.php?id=$idprodotto&car=0&wish=0&taglia=$tagliaPartenza'>
                    <div class='product-swap-image'><img class='img-fluid product-swap-image-front' src=\"./backend/upload/$foto\" alt='product'/><img class='img-fluid' src=\"./backend/upload/$foto2\" alt='product'/></div></a>";
                echo"  <div class='product-hover-overlay'><a class='text-dark text-sm' href='#'>
                      <svg class='svg-icon text-hover-primary svg-icon-heavy d-sm-none'>
                        <use xlink:href=''#retail-bag-1'> </use>
                    <div><a class='text-dark text-hover-primary mr-2' href='#'>
                        </svg></a></div>
                  </div>
                </div>
                <div class='position-relative' style='top: 0.4rem'>
                  <h3 class='text mb-1'><a class='text-dark' href='detail-1.php?id=$idprodotto&car=0&wish=0&taglia=$tagliaPartenza'>$nome</a></h3>";
                if($sconto){
                        echo"  <del style='color:red'>$$costo</del>&nbsp; $$prezzoscontato ";} else{ echo" <span> $$costo";} echo", $brand</span>       
                   <div class='product-stars text-xs'>";
                            $media=select_media_recensioni($connect,$idprodotto);
                            $mediaARR=round($media);
                            $cont=0;
                          while($cont<$mediaARR){
                              echo"<i class='fa fa-star text-primary'></i>";
                              $cont++;} 
                          while($cont<5){
                              echo"<i class='fa fa-star text-muted'></i>";
                              $cont++;}
                      
            echo"
                  </div>
                </div>
              </div>
            </div>" ;
            $numprodotti++; }}
        ?>

      </div>

    </div>


    
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
    <!-- JavaScript Countdown-->
    <script src="js/countdown.js"></script>
    <script>

        function forr(tipo){
            document.cookie = tipo + " = " + tipo;
            window.location.href = "./category-sidebar.php";
        }
    
      var deadline = new Date(Date.parse(new Date()) + <?php echo"$giorniallascadenza"; ?>  * 24 * 60 * 60 * 1000);
      var countdown = new Countdown('countdown', deadline);
      
    </script>
    <!-- Some theme config-->
    <script>
      var options = {
          navbarExpandPx: 992
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