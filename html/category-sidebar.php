<!DOCTYPE html>
<html lang="en">
    <?php
    ob_start();
    include("./functions/connection.php");
$connect=connection();
    include("./functions/product_pull.php");
    include("./functions/users.php");
    
    if(isset($_GET['tipologia'])){
        $tipologia=$_GET['tipologia'];}
    else{
        $tipologia=0;
    }

    controllo_utente();




    if(isset($_GET['n'])){
        if($_GET['n']=='1'){
            $_COOKIE["limite"]='LIMIT 9';
        }
        else{
            $_COOKIE["limite"]='LIMIT 9, 18';
        }
    }
    else{
        $_COOKIE["limite"]='LIMIT 9';
    }


    if(empty($_COOKIE['condCategoria'])) {
        setcookie('condCategoria', '0');
    }
    if( empty($_COOKIE['condSize'])) {
        setcookie('condSize', '0');
    }
    if( empty($_COOKIE['condBrand'])) {
        setcookie('condBrand', '0');
    }
    if( empty($_COOKIE['condColors'])) {
        setcookie('condColors', '0');
    }


    $query="SELECT Descrizione_shop from Sito where id=1";
    $dati=mysqli_query($connect, $query)
        or die("non riesco ad eseguire la query");
    $valori=mysqli_fetch_array($dati);
    $descrizione=$valori["Descrizione_shop"];
    ?>
    <script>           //alert(document.cookie);
    </script>
    <style>

        .collapsible {
            color: white;
            cursor: pointer;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
        }

        .content {

        /*     overflow: hidden;*/
        }

        .collapsible:after {
            content: url("giu.png"); /* Unicode character for "plus" sign (+) '\02795' */
            color: white;
            float: right;
            max-height: 10px;
            max-lenght: 10px;

        }

        .activee:after {
            content: url("su.png"); /* Unicode character for "minus" sign (-) "\2796"*/
        }

        .sin{
            content: url("sinistra.png");
            max-height: 15px;
        }
        .des{
            content: url("destra.png");
            max-height: 15px;
        }

    </style>
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
    <!-- Price Slider Stylesheets -->
    <link rel="stylesheet" href="vendor/nouislider/nouislider.css">
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
  <script>
      $('html, body').css({ 'overflow': 'hidden', 'height': '100%' })
  </script>
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
                    <?php if(isset($_COOKIE["ricerca"]))
                        $ricerca=$_COOKIE["ricerca"];
                    else
                        $ricerca="";
                    ?>
                    <input class="form-control form-control-underlined pl-3" type="text"  value="<?php echo $ricerca; ?>" name="ricerca" placeholder="Search"  aria-label="Search" aria-describedby="button-search">
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
                        <!--<div class="navbar-icon-badge">5</div>--></a></li>


            </ul>
        </div>
      </nav>
    </header>
    <div class="container py-6">
      <!-- Breadcrumbs -->
      <ol class="breadcrumb undefined">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item">Shop   </li>
      </ol>
      <!-- Hero Content-->
      <div class="hero-content mb-6">
        <h1>Shop</h1>
        <div class="row">   
          <div class="col-xl-8"><p class="lead text-muted"><?php echo"$descrizione"; ?></p>                </div>
        </div>
      </div>
      <div class="row">
        <!-- Grid -->
        <div class="products-grid col-xl-9 col-lg-8 order-lg-2">
          <header class="product-grid-header">
           <!-- <div class="mr-3 mb-3"> -->
                <?php

                    $tot=select_totale_prodotti($connect);
                echo"<div class='mr-3 mb-3' id='testo'>
               Showing <strong>1 - $tot </strong> of <strong>$tot</strong> products</div>"; ?>

              <div class="mb-3 d-flex align-items-center"><span class="d-inline-block mr-2">Sort by</span>
                  <select class="selectpicker" name="sort" id="form_sort" data-style="btn-selectpicker border-0" onchange="settar()" title="">
                    <?php
                      if((!isset($_COOKIE["sort"]))||($_COOKIE["sort"]=="Default")){
                          
                         echo"<option value='Default'>Default     </option>
                        <option value='Price'>Price     </option>
                         <option value='Newest'>Newest first     </option>";}
                      
                      if($_COOKIE["sort"]=="Price"){
                          echo"<option value='Price'>Price     </option>
                          <option value='Default'>Default     </option>
                          <option value='Newest'>Newest first     </option>";}
                
                      
                      if($_COOKIE["sort"]=="Newest"){
                          echo"<option value='Newest'>Newest first     </option>
                          <option value='Default'>Default     </option>
                          <option value='Price'>Price     </option>
                          ";}
                                                     ?>
                  </select>
              </div>
              
          </header>

          <div class='row'>
            <?php
                  $query="SELECT MAX(costo) as costomaggiore FROM prodotto";
                  $result=mysqli_query($connect, $query);
                  $maxcosto = mysqli_fetch_array($result);
                  $maxcosto=$maxcosto['costomaggiore'];

                  $query="SELECT MIN(costo) as costominore  FROM prodotto";
                  $result=mysqli_query($connect, $query);
                  $mincosto = mysqli_fetch_array($result);
                  $mincosto=$mincosto['costominore'];
                  if(!isset($_COOKIE['costominimo_def']) && !isset($_COOKIE['costomassimo_def'])){

                    $_COOKIE['costominimo']=$mincosto;
                    $_COOKIE['costomassimo']=$maxcosto;
                  }
                  else{
                      $_COOKIE['costominimo']=$_COOKIE['costominimo_def'];
                      $_COOKIE['costomassimo']=$_COOKIE['costomassimo_def'];
                      $_COOKIE['costominimo']=$mincosto;
                      $_COOKIE['costomassimo']=$maxcosto;
                  }
        $result=select_prodotti_shop($connect);
            $conta=0;  

            while($row = mysqli_fetch_array($result)){

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

        echo"
        
            <div class='col-xl-4 col-6'>
              <div class='product' data-aos='zoom-in' data-aos-delay='0'>
                <div class='product-image mb-md-3'>";
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
                <div class='position-relative'>
                  <h3 class='text-base mb-1'><a class='text-dark' href='detail-1.php?id=$idprodotto&car=0&wish=0&taglia=$tagliaPartenza'>$nome</a></h3><span class='text-gray-500 text-sm'>"; 
                if($sconto){
                   echo"   <del>$$costo</del>&nbsp; $$prezzoscontato ";} else{ echo" $$costo";} echo", $brand</span>
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
            </div>";
        $conta++;}

              
              
              if($conta==0){
                    if(!$conta && $_COOKIE["limite"]!='LIMIT 9'){

                    echo"<script>window.location.assign('./category-sidebar.php?n=1')</script>";
                    }
                else{
                echo"<div class='row' >
                          <div class='col-6 col-md-12 text-right text-md-center''><br><br><h2 style='text-align:center;'><b>&emsp;&emsp;&emsp;&emsp;Nessun capo disponibile nella ricerca</b></h2></div>
                        </div>";
            }}

            echo"<script>document.getElementById('testo').innerHTML = 'Showing <strong>1 - $conta </strong> of <strong>$tot</strong> products'</script>";

              ?>

            <!-- /product   -->
          </div>

            <?php

            $cond=$_COOKIE['limite'];

            if(($conta==9) or ($cond=='LIMIT 9, 18')){
                if((($conta==9 or ($cond=='LIMIT 9, 18'))&& $tot>=10)) {
            echo"<nav aria-label='Page navigation'>
                <center> <ul class='pagination'>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <li class='page-item'  onclick='settaindietro()'>
                        <a class='page-link' style='cursor: pointer' aria-label='Previous'>
                            <div aria-hidden='true' class='sin' href='category-sidebar.php?n=1'></div>
                            <span class='sr-only'>Previous</span>
                        </a>
                    </li>";

                        if($cond=='LIMIT 9, 18'){
                            echo"<li class='page-item'><a class='page-link' href='category-sidebar.php?n=1'>1</a></li>
                                    <li class='page-item'><a class='page-link' style='color:#bcac76' href='category-sidebar.php?n=2'>2</a></li>";}
                        else{
                            echo"<li class='page-item'><a class='page-link' style='color:#bcac76' href='category-sidebar.php?n=1'>1</a></li>
                                 <li class='page-item'><a class='page-link' href='category-sidebar.php?n=2'>2</a></li>";}

                    echo"<li class='page-item' onclick='settaavanti()'>
                        <a class='page-link'  style='cursor: pointer' aria-label='Next'>
                            <div aria-hidden='true' class='des' href='category-sidebar.php?n=2'></div>
                            <span class='sr-only'>Next</span>
                        </a>
                    </li>
                </ul></center>
            </nav>";}}

            ?>
        </div>
        <!-- Sidebar-->
        <div class="sidebar col-xl-3 col-lg-4 pr-xl-5 order-lg-1 scroll"  style="user-select: none; -webkit-user-select: none; -moz-user-select: none;" >


            <div class="expand-lg collapse" id="sizeFilterMenu">
                <h5 class="sidebar-heading d-none d-lg-block">Tipologia </h5>
                <form class="mt-4 mt-lg-0" action="#">

                    <div class='form-group mb-1'><div class="row">&emsp;
                        <?php
                        if(!isset($_COOKIE["Uomo"]) || $_COOKIE["Uomo"]=='null'){

                            echo"<div class='custom-control custom-checkbox'>
                    <input class='custom-control-input' id='Uomo' type='checkbox' name='Uomo' onclick='setta(this.name, this.id)'>&emsp;
                      <label class='custom-control-label' for='Uomo'>Uomo</label></div>";}
                        else{
                            echo"<div class='custom-control custom-checkbox'>
                    <input class='custom-control-input' id='Uomo' type='checkbox' name='Uomo' onclick='desetta(this.name, this.id)' checked>&emsp;
                      <label class='custom-control-label' for='Uomo'>Uomo</label></div>";}

                        if(!isset($_COOKIE["Donna"]) || $_COOKIE["Donna"]=='null'){
                            echo"
                  <div class='custom-control custom-checkbox'>

                   <input class='custom-control-input' id='Donna' type='checkbox' name='Donna' onclick='setta(this.name, this.id)'>&emsp;
                    <label class='custom-control-label' for='Donna'>Donna</label></div>";}
                        else{
                            echo"
                  <div class='custom-control custom-checkbox'>

                   <input class='custom-control-input' id='Donna' type='checkbox' name='Donna' onclick='desetta(this.name, this.id)' checked>&emsp;
                    <label class='custom-control-label' for='Donna'>Donna</label></div>";} ?>

                        </div></div>
                </form>
            </div>
          <div class="sidebar-block px-3 px-lg-0"><a class="d-lg-none block-toggler" data-toggle="collapse" href="#categoriesMenu" aria-expanded="false" aria-controls="categoriesMenu">Product Categories<span class="block-toggler-icon"></span></a>




            <div class="expand-lg collapse has-drop" id="categoriesMenu" role="menu">
              <h5 class="sidebar-heading d-none d-lg-block collapsible collapsible1" onclick="scrollfiltri('condCategoria')">Category  </h5>

<?php
        if(isset($_COOKIE['condCategoria']) && $_COOKIE['condCategoria']=='1'){
          echo"<div class='sidebar-icon-menu mt-4 mt-lg-0 content' style='display: block;' >";}
        else{
            echo"<div class='sidebar-icon-menu mt-4 mt-lg-0 content' style='display: none;' >";}
            $cat=0;
            $result=select_categoria($connect);
                while($row = mysqli_fetch_array($result)){

                    $id=$row['id'];
                    $categoria=$row['tipologia'];
                    $svg=$row['svg'];
                    $controllo = 'category' . strval($cat);

//$a=$_COOKIE[$controllo];
//echo"<script>alert('$a')</script>";

            if(!isset($_COOKIE[$controllo]) || $_COOKIE[$controllo]=='null'){

                echo"<div class='sidebar-icon-menu-item' data-toggle='collapse' data-target='#subcategories_0' aria-expanded aria-controls='subcategories_0' role='menuitem'>

                    <div class='d-flex align-items-center'>

                    <svg class='svg-icon sidebar-icon'>
                      <use xlink:href='$svg'> </use>
                    </svg>
                        <div class='custom-control custom-checkbox'>
                            <input class='custom-control-input' style='display: inline-block;padding-left: 80px; position: absolute; top: 2.2rem; right: 0; -webkit-transform: translateY(-50%); transform: translateY(-50%);' id='$categoria' type='checkbox' name='category$cat' onclick='setta(this.name, this.id)'>
                            <label class='custom-control-label' for='$categoria'></label>
                        </div>
                        <a class='sidebar-icon-menu-link font-weight-bold mr-2' href=''>$categoria</a><span class='sidebar-icon-menu-count'>
                        </span>
                  </div>
                </div>";

                }
            else{

                echo"<div class='sidebar-icon-menu-item' data-toggle='collapse' data-target='#subcategories_0' aria-expanded aria-controls='subcategories_0' role='menuitem'>

                    <div class='d-flex align-items-center'>

                    <svg class='svg-icon sidebar-icon'>
                      <use xlink:href='$svg'> </use>
                    </svg>
                        <div class='custom-control custom-checkbox'>
                            <input class='custom-control-input' style='display: inline-block;padding-left: 80px; position: absolute; top: 2.2rem; right: 0; -webkit-transform: translateY(-50%); transform: translateY(-50%);' type='checkbox' id='$categoria' name='category$cat' onclick='desetta(this.name)' checked>
                            <label class='custom-control-label' for='$categoria'></label>
                        </div>
                        <a class='sidebar-icon-menu-link font-weight-bold mr-2' href=''>$categoria</a><span class='sidebar-icon-menu-count'>
                        </span>
                  </div>
                </div>";



            }
                    $cat++;
                }


?>

              </div>
            </div>
          </div>
          <div class="sidebar-block px-3 px-lg-0"><a class="d-lg-none block-toggler" data-toggle="collapse" href="#priceFilterMenu" aria-expanded="false" aria-controls="priceFilterMenu">Filter by price<span class="block-toggler-icon"></span></a>
            <div class="expand-lg collapse" id="priceFilterMenu">
              <h5 class="sidebar-heading d-none d-lg-block">Price  </h5>
              <div class="mt-4 mt-lg-0" id="slider-snap"> </div>
              <div class="nouislider-values">
                <div class="min">From $<span id="slider-snap-value-lower"></span></div>
                <div class="max">To $<span id="slider-snap-value-upper"></span></div>

                  <?php

                  echo"<input class='slider-snap-input' type='hidden' name='pricefrom' id='slider-snap-input-lower' value='$mincosto' >" ;
                  echo"<input class='slider-snap-input' type='hidden' name='priceto' id='slider-snap-input-upper' value='$maxcosto'>  ";

                    ?>
              </div>
            </div>
          </div>
          <div class="sidebar-block px-3 px-lg-0"><a class="d-lg-none block-toggler" data-toggle="collapse" href="#brandFilterMenu" aria-expanded="true" aria-controls="brandFilterMenu">Filter by brand<span class="block-toggler-icon"></span></a>
            <!-- Brand filter menu - this menu has .show class, so is expanded by default-->
            <div class="expand-lg collapse show " id="brandFilterMenu">

              <h5 class="sidebar-heading d-none d-lg-block collapsible collapsible1" onclick="scrollfiltri('condBrand')">Brands </h5>




                                  <?php
                if(isset($_COOKIE['condBrand']) && $_COOKIE['condBrand']=='1'){
                   echo"<div class='form-group mb-1 content' style='display: block;'>";}
                else{
                  echo"<div class='form-group mb-1 content' style='display: none;'>";}
                                  $brands=0;
                  $result=select_brand($connect);
                while($row = mysqli_fetch_array($result)){

                $brand=$row['nome'];
                   $controllo = 'clothes-brand' . strval($brands);

                    //$a=$_COOKIE[$controllo];
                   //echo"<script>alert('$a')</script>";
                if(!isset($_COOKIE[$controllo]) || $_COOKIE[$controllo]=='null'){
                    echo"
                  <div class='custom-control custom-checkbox'>
                    <input class='custom-control-input' id='$brand' type='checkbox' name='clothes-brand$brands' onclick='setta(this.name, this.id)'>
                    <label class='custom-control-label' for='$brand'>$brand</label>
                  </div>";
                    }
                else{
                echo"
                  <div class='custom-control custom-checkbox'>
                    <input class='custom-control-input' id='$brand' type='checkbox' name='clothes-brand$brands' onclick='desetta(this.name)' checked>
                    <label class='custom-control-label' for='$brand'>$brand</label>
                  </div>";
                }
                    
                    $brands++
                       ;} ?>
                </div>

            </div>
          </div>
          <div class="sidebar-block px-3 px-lg-0"> <a class="d-lg-none block-toggler" data-toggle="collapse" href="#sizeFilterMenu" aria-expanded="false" aria-controls="sizeFilterMenu">Filter by size<span class="block-toggler-icon"></span></a>
            <!-- Size filter menu-->
            <div class="expand-lg collapse" id="sizeFilterMenu">
              <h5 class="sidebar-heading d-none d-lg-block collapsible collapsible1" onclick="scrollfiltri('condSize')">Size </h5>


                                      <?php
               if(isset($_COOKIE['condSize']) && $_COOKIE['condSize']=='1' ){
                   echo"<div class='form-group mb-1 content' style='display: block;'>";
               }
               else{
                   echo"<div class='form-group mb-1 content' style='display: none;'>";
               }
                                      $size=0;
                $result=select_taglia($connect);
                while($row = mysqli_fetch_array($result)){

                $taglia=$row['tipologia'];
                    
                if(!isset($_COOKIE["size$size"]) || $_COOKIE["size$size"]=='null'){
    
                    echo"
                  <div class='custom-control custom-checkbox'>
                    <input class='custom-control-input' id='$taglia' type='checkbox' name='size$size' onclick='setta(this.name, this.id)'>
                    <label class='custom-control-label' for='$taglia'>$taglia</label>
                  </div>";}
                else{
                    echo"
                  <div class='custom-control custom-checkbox'>
                    <input class='custom-control-input' id='$taglia' type='checkbox' name='size$size' onclick='desetta(this.name, this.id)' checked>
                    <label class='custom-control-label' for='$taglia'>$taglia</label>
                  </div>";}
                    $size++;} ?>
                </div>

            </div>
          </div>
          <div class="sidebar-block px-3 px-lg-0"> <a class="d-lg-none block-toggler" data-toggle="collapse" href="#sizeFilterMenu" aria-expanded="false" aria-controls="sizeFilterMenu">Filter by size<span class="block-toggler-icon"></span></a>
            <!-- Size filter menu-->
              <!-- Color filtrer-->
              
               <h5 class="sidebar-heading d-none d-lg-block collapsible collapsible1" onclick="scrollfiltri('condColors')">Colors </h5>


                    <?php
                    if(isset($_COOKIE['condColors']) && $_COOKIE['condColors']=='1'){
                        echo"<div class='form-group mb-1 content' style='display: block;'>";}
                    else{
                        echo"<div class='form-group mb-1 content' style='display: none;'>";}
                                  $colore=0;
                    echo"<div class='mt-4 mt-lg-0'>";
                  $result=select_colore($connect);
                  echo"<ul class='list-inline mb-0 colours-wrapper'>";
                while($row = mysqli_fetch_array($result)){

                $colors=$row['nome'];
                $hex=$row['hexcode'];
                   $controllo = 'clothes-colors' . strval($colore);

                    //$a=$_COOKIE[$controllo];
                   //echo"<script>alert('$a')</script>";
                if(!isset($_COOKIE[$controllo]) || $_COOKIE[$controllo]=='null'){
                    echo"
                  <li class='list-inline-item'>
                    <label class='btn-colour'  for='$colors' style='background-color: $hex' border: 3px gray' data-allow-multiple> </label>
                    <input class='input-invisible' id='$colors' type='checkbox' name='clothes-colors$colore' value='value_sidebar_Blue' onclick='setta(this.name, this.id)'>
                  </li>";
                    }
                else{
                echo"
                  <li class='list-inline-item'>
                    <label class='btn-colour'  for='$colors' style='background-color: $hex; border: 2px solid black' data-allow-multiple> </label>
                    <input class='input-invisible' id='$colors' type='checkbox' name='clothes-colors$colore' value='value_sidebar_Blue' onclick='desetta(this.name, this.id)'>
                  </li>";
                }
                    
                    $colore++
                       ;} ?>
                        </ul></div></div>
              
              
              
              
          </div>
          
          
        </div>
        <!-- /Sidebar end-->
      </div>
    </div>
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
    <!-- Quickview Modal    -->
                              <?php
            $result=select_prodotti_detail($connect, 5);
            $valori = mysqli_fetch_array($result);
            $nome=$valori['nome'];
            $colore=$valori['colore'];
            $brand=$valori['brand'];
            $costo=$valori['costo'];
            $categoria=$valori['categoria'];
            $descrizione1=$valori['descrizione1'];
            $descrizione2=$valori['descrizione2'];
            $materiale=$valori['materiale'];
            $vestibilita=$valori['vestibilita'];

?>
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
                  <div class="swiper-container quickview-slider" id="quickViewSlider">
                    <!-- Additional required wrapper-->
                    <div class="swiper-wrapper">
                      <!-- Slides-->
                        <?php
                    $result=select_immagini_detail($connect, 5);
                     while($row = mysqli_fetch_array($result)){
                         $immagine=$row["nome"];
                      echo"<div class='swiper-slide'><img class='img-fluid' src=\"./backend/upload/$immagine\"></div>";} ?>

                    </div>
                  </div>
                  <div class="swiper-thumbs" data-swiper="#quickViewSlider">
                        <?php
                    $result=select_immagini_detail($connect, 5);
                     while($row = mysqli_fetch_array($result)){
                         $immagine=$row["nome"];
                    echo"<button class='swiper-thumb-item detail-thumb-item mb-3 active'><img class='img-fluid' src=\"./backend/upload/$immagine\"></button>";} ?>
                    
                  </div>
                </div>
              </div>
              <div class="col-lg-6 p-lg-5">
                <?php    echo"<h1 class='mb-4'>$nome</h1>"; ?>
            <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-sm-between mb-4">
              <ul class="list-inline mb-2 mb-sm-0">
                <?php echo"<li class='list-inline-item h4 font-weight-light mb-0'>$ $costo</li>"; ?>
                    <li class="list-inline-item text-muted font-weight-light"> 
                    </li>
                  </ul>
                  <div class="d-flex align-items-center text-sm">
                    <ul class="list-inline mr-2 mb-0">
                    <?php $media=select_media_recensioni($connect,5);
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
                   $tot=select_totale_recensioni($connect,5);
                    
                  echo"  <span class='text-muted text-uppercase'>$tot reviews</span>";
                ?>                   </div>
                </div>
           <?php echo" <p class='mb-4 text-muted'>$descrizione1</p>"; ?>
                <form id="buyForm_modal" action="#">
                  <div class="row">
                    <div class="col-sm-6 col-lg-12 detail-option mb-4">
                      <h6 class="detail-option-heading">Size <span>(required)</span></h6>
                      <select class="selectpicker" name="size" data-style="btn-selectpicker">
                            <?php
                    $result=select_taglia_detail($connect, 5);
                     while($row = mysqli_fetch_array($result)){
                            
                            $quantita=$row['quantita'];
                            $taglia=$row['tipologia'];
                         echo"
                    <option value='$taglia'>$taglia</option>";} ?>
                      </select>
                    </div>
                    <div class="col-sm-6 col-lg-12 detail-option mb-5">
                      <h6 class="detail-option-heading">Brand - Colore</h6>
                  <label class="btn btn-sm btn-outline-primary detail-option-btn-label" for="material_0"> <?php echo" $brand"; ?>
                    <input class="input-invisible" type="radio" name="material" value="value_0" id="material_0" >
                  </label>
                  <label class="btn btn-sm btn-outline-primary detail-option-btn-label" for="material_1"><?php echo"$colore"; ?>
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
                  </div>
                  <ul class="list-unstyled">
                <?php echo"<li><strong>Category:</strong> <a class='text-muted' href='#'>$categoria</a></li>"; ?>
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

        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("activee");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        }

        function settaavanti(){

            nome='limite';
            valore = 'LIMIT 9, 18';
            document.cookie = nome + " = " + valore;
            document.location.href = './category-sidebar.php?n=2';
            //window.location.reload(true);
        }

        function settaindietro(){

            nome='limite';
            valore = 'LIMIT 9';
            document.cookie = nome + " = " + valore;
            document.location.href = './category-sidebar.php?n=1';
        }

        function setta(nome,valore){

            document.cookie = nome + " = " + valore;
            window.location.reload(true);
            //alert(document.cookie);
        }

        function desetta(nome){


            document.cookie = nome + " = null";
            window.location.reload(true);

        }

        function settar(){
            valore=document.getElementById("form_sort").value;
            document.cookie = "sort" + " = " + valore;
            //alert(document.cookie);
            window.location.reload(true);

        }

        function scrollfiltri(cname) {
                var name = cname + "=";
                var ca = document.cookie.split(';');
                for(var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') {
                        c = c.substring(1);
                    }
                    if (c.indexOf(name) == 0) {
                        fin= c.substring(name.length, c.length);
                    }
                }
            //alert(fin);
            if(fin!=3){
                if(fin==0){
                    document.cookie = cname + " = " + '1';
                }
                else{
                    document.cookie = cname + " = " + '0';
                }
            }
        }
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
    <!-- NoUI Slider (price slider)-->
    <script src="vendor/nouislider/nouislider.min.js"></script>
    <script>

        function getCookie(cname) {
            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for(var i = 0; i <ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }


      var snapSlider = document.getElementById('slider-snap');
      
      noUiSlider.create(snapSlider, {
      	start: [ <?php if(isset($_COOKIE['costominimo_def'])){echo $_COOKIE['costominimo_def'];} else{echo $_COOKIE['costominimo'];}  ?>,  <?php if(isset($_COOKIE['costomassimo_def'])){echo $_COOKIE['costomassimo_def'];} else{echo $_COOKIE['costomassimo'];}  ?> ],
      	snap: false,
      	connect: true,
          step: 1,
      	range: {
      		'min': 0,
      		'max': <?php  echo $_COOKIE['costomassimo'];  ?>
      	}
      });
      var snapValues = [
      	document.getElementById('slider-snap-value-lower'),
      	document.getElementById('slider-snap-value-upper')
      ];
      var inputValues = [
      	document.getElementById('slider-snap-input-lower'),
      	document.getElementById('slider-snap-input-upper')
      ];
      snapSlider.noUiSlider.on('update', function( values, handle ) {
      	snapValues[handle].innerHTML = values[handle];
      });        
      
      snapSlider.noUiSlider.on('change', function( values, handle ) {

          document.cookie = "costo= " + values;
          document.cookie = "costominimo_def= " + values[0];
          document.cookie = "costomassimo_def= " + values[1];
          //alert(document.cookie);
          //costi = values.split(",");

          inputValues[handle].value = values[handle];
          
        
          window.location.reload(true);

          
      });        
      
    </script>
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
  <script>
      $('html, body').removeAttr('style')
  </script>
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

  if(isset($_POST["pappagallo"])){

      $ricerca=$_POST["ricerca"];
      setcookie("ricerca", $ricerca);
      header("Location: category-sidebar.php");
  }

  ?>
  </body>
</html>