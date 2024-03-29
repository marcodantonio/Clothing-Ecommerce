<!DOCTYPE html>
<html lang="en">
<?php 
    ob_start();
    
    include("../functions/connection.php"); include("../functions/product_pull.php"); $connect=connection(); session_start(); $a=$_SESSION["ruolo"];
                 if(!isset($_SESSION["nome"])){
            header("location: ../customer-login.php");}
    
$query="SELECT * FROM Sito where id=1";
     $dati=mysqli_query($connect, $query)
                or die ("Non riesco ad eseguire la query $dati");
    $valori=mysqli_fetch_array($dati);
    $nomenegozio=$valori["Nome_negozio"];
    $nuoviarrivi=$valori["Nuovi_arrivi"];
    $descrizionenegozio=$valori["Descrizione_negozio"];
    $descrizioneabbigliamento=$valori["Descrizione_abbigliamento"];
    $descrizioneshop=$valori["Descrizione_shop"];
    $andress=$valori["Andress"];
    $callcenter=$valori["Call_center"];
    $eletronic_support=$valori["eletronic_support"];
    $Call_Center_Number=$valori["Call_Center_Number"];
    $Electronic_support_Number=$valori["Electronic_support_Number"];
    $titolopagina=$valori["titolo_pagina"];
    $titolologin=$valori["titolo_login"];
    $titoloregistrazione=$valori["titolo_registrazione"];
    $descrizionelogin=$valori["descrizione_login"];
    $descrizioneregistrazione=$valori["descrizione_registrazione"];

//ob_start();
  ?>  
    
<head><style type="text/css">.swal-icon--error{border-color:#f27474;-webkit-animation:animateErrorIcon .5s;animation:animateErrorIcon .5s}.swal-icon--error__x-mark{position:relative;display:block;-webkit-animation:animateXMark .5s;animation:animateXMark .5s}.swal-icon--error__line{position:absolute;height:5px;width:47px;background-color:#f27474;display:block;top:37px;border-radius:2px}.swal-icon--error__line--left{-webkit-transform:rotate(45deg);transform:rotate(45deg);left:17px}.swal-icon--error__line--right{-webkit-transform:rotate(-45deg);transform:rotate(-45deg);right:16px}@-webkit-keyframes animateErrorIcon{0%{-webkit-transform:rotateX(100deg);transform:rotateX(100deg);opacity:0}to{-webkit-transform:rotateX(0deg);transform:rotateX(0deg);opacity:1}}@keyframes animateErrorIcon{0%{-webkit-transform:rotateX(100deg);transform:rotateX(100deg);opacity:0}to{-webkit-transform:rotateX(0deg);transform:rotateX(0deg);opacity:1}}@-webkit-keyframes animateXMark{0%{-webkit-transform:scale(.4);transform:scale(.4);margin-top:26px;opacity:0}50%{-webkit-transform:scale(.4);transform:scale(.4);margin-top:26px;opacity:0}80%{-webkit-transform:scale(1.15);transform:scale(1.15);margin-top:-6px}to{-webkit-transform:scale(1);transform:scale(1);margin-top:0;opacity:1}}@keyframes animateXMark{0%{-webkit-transform:scale(.4);transform:scale(.4);margin-top:26px;opacity:0}50%{-webkit-transform:scale(.4);transform:scale(.4);margin-top:26px;opacity:0}80%{-webkit-transform:scale(1.15);transform:scale(1.15);margin-top:-6px}to{-webkit-transform:scale(1);transform:scale(1);margin-top:0;opacity:1}}.swal-icon--warning{border-color:#f8bb86;-webkit-animation:pulseWarning .75s infinite alternate;animation:pulseWarning .75s infinite alternate}.swal-icon--warning__body{width:5px;height:47px;top:10px;border-radius:2px;margin-left:-2px}.swal-icon--warning__body,.swal-icon--warning__dot{position:absolute;left:50%;background-color:#f8bb86}.swal-icon--warning__dot{width:7px;height:7px;border-radius:50%;margin-left:-4px;bottom:-11px}@-webkit-keyframes pulseWarning{0%{border-color:#f8d486}to{border-color:#f8bb86}}@keyframes pulseWarning{0%{border-color:#f8d486}to{border-color:#f8bb86}}.swal-icon--success{border-color:#a5dc86}.swal-icon--success:after,.swal-icon--success:before{content:"";border-radius:50%;position:absolute;width:60px;height:120px;background:#fff;-webkit-transform:rotate(45deg);transform:rotate(45deg)}.swal-icon--success:before{border-radius:120px 0 0 120px;top:-7px;left:-33px;-webkit-transform:rotate(-45deg);transform:rotate(-45deg);-webkit-transform-origin:60px 60px;transform-origin:60px 60px}.swal-icon--success:after{border-radius:0 120px 120px 0;top:-11px;left:30px;-webkit-transform:rotate(-45deg);transform:rotate(-45deg);-webkit-transform-origin:0 60px;transform-origin:0 60px;-webkit-animation:rotatePlaceholder 4.25s ease-in;animation:rotatePlaceholder 4.25s ease-in}.swal-icon--success__ring{width:80px;height:80px;border:4px solid hsla(98,55%,69%,.2);border-radius:50%;box-sizing:content-box;position:absolute;left:-4px;top:-4px;z-index:2}.swal-icon--success__hide-corners{width:5px;height:90px;background-color:#fff;padding:1px;position:absolute;left:28px;top:8px;z-index:1;-webkit-transform:rotate(-45deg);transform:rotate(-45deg)}.swal-icon--success__line{height:5px;background-color:#a5dc86;display:block;border-radius:2px;position:absolute;z-index:2}.swal-icon--success__line--tip{width:25px;left:14px;top:46px;-webkit-transform:rotate(45deg);transform:rotate(45deg);-webkit-animation:animateSuccessTip .75s;animation:animateSuccessTip .75s}.swal-icon--success__line--long{width:47px;right:8px;top:38px;-webkit-transform:rotate(-45deg);transform:rotate(-45deg);-webkit-animation:animateSuccessLong .75s;animation:animateSuccessLong .75s}@-webkit-keyframes rotatePlaceholder{0%{-webkit-transform:rotate(-45deg);transform:rotate(-45deg)}5%{-webkit-transform:rotate(-45deg);transform:rotate(-45deg)}12%{-webkit-transform:rotate(-405deg);transform:rotate(-405deg)}to{-webkit-transform:rotate(-405deg);transform:rotate(-405deg)}}@keyframes rotatePlaceholder{0%{-webkit-transform:rotate(-45deg);transform:rotate(-45deg)}5%{-webkit-transform:rotate(-45deg);transform:rotate(-45deg)}12%{-webkit-transform:rotate(-405deg);transform:rotate(-405deg)}to{-webkit-transform:rotate(-405deg);transform:rotate(-405deg)}}@-webkit-keyframes animateSuccessTip{0%{width:0;left:1px;top:19px}54%{width:0;left:1px;top:19px}70%{width:50px;left:-8px;top:37px}84%{width:17px;left:21px;top:48px}to{width:25px;left:14px;top:45px}}@keyframes animateSuccessTip{0%{width:0;left:1px;top:19px}54%{width:0;left:1px;top:19px}70%{width:50px;left:-8px;top:37px}84%{width:17px;left:21px;top:48px}to{width:25px;left:14px;top:45px}}@-webkit-keyframes animateSuccessLong{0%{width:0;right:46px;top:54px}65%{width:0;right:46px;top:54px}84%{width:55px;right:0;top:35px}to{width:47px;right:8px;top:38px}}@keyframes animateSuccessLong{0%{width:0;right:46px;top:54px}65%{width:0;right:46px;top:54px}84%{width:55px;right:0;top:35px}to{width:47px;right:8px;top:38px}}.swal-icon--info{border-color:#c9dae1}.swal-icon--info:before{width:5px;height:29px;bottom:17px;border-radius:2px;margin-left:-2px}.swal-icon--info:after,.swal-icon--info:before{content:"";position:absolute;left:50%;background-color:#c9dae1}.swal-icon--info:after{width:7px;height:7px;border-radius:50%;margin-left:-3px;top:19px}.swal-icon{width:80px;height:80px;border-width:4px;border-style:solid;border-radius:50%;padding:0;position:relative;box-sizing:content-box;margin:20px auto}.swal-icon:first-child{margin-top:32px}.swal-icon--custom{width:auto;height:auto;max-width:100%;border:none;border-radius:0}.swal-icon img{max-width:100%;max-height:100%}.swal-title{color:rgba(0,0,0,.65);font-weight:600;text-transform:none;position:relative;display:block;padding:13px 16px;font-size:27px;line-height:normal;text-align:center;margin-bottom:0}.swal-title:first-child{margin-top:26px}.swal-title:not(:first-child){padding-bottom:0}.swal-title:not(:last-child){margin-bottom:13px}.swal-text{font-size:16px;position:relative;float:none;line-height:normal;vertical-align:top;text-align:left;display:inline-block;margin:0;padding:0 10px;font-weight:400;color:rgba(0,0,0,.64);max-width:calc(100% - 20px);overflow-wrap:break-word;box-sizing:border-box}.swal-text:first-child{margin-top:45px}.swal-text:last-child{margin-bottom:45px}.swal-footer{text-align:right;padding-top:13px;margin-top:13px;padding:13px 16px;border-radius:inherit;border-top-left-radius:0;border-top-right-radius:0}.swal-button-container{margin:5px;display:inline-block;position:relative}.swal-button{background-color:#7cd1f9;color:#fff;border:none;box-shadow:none;border-radius:5px;font-weight:600;font-size:14px;padding:10px 24px;margin:0;cursor:pointer}.swal-button[not:disabled]:hover{background-color:#78cbf2}.swal-button:active{background-color:#70bce0}.swal-button:focus{outline:none;box-shadow:0 0 0 1px #fff,0 0 0 3px rgba(43,114,165,.29)}.swal-button[disabled]{opacity:.5;cursor:default}.swal-button::-moz-focus-inner{border:0}.swal-button--cancel{color:#555;background-color:#efefef}.swal-button--cancel[not:disabled]:hover{background-color:#e8e8e8}.swal-button--cancel:active{background-color:#d7d7d7}.swal-button--cancel:focus{box-shadow:0 0 0 1px #fff,0 0 0 3px rgba(116,136,150,.29)}.swal-button--danger{background-color:#e64942}.swal-button--danger[not:disabled]:hover{background-color:#df4740}.swal-button--danger:active{background-color:#cf423b}.swal-button--danger:focus{box-shadow:0 0 0 1px #fff,0 0 0 3px rgba(165,43,43,.29)}.swal-content{padding:0 20px;margin-top:20px;font-size:medium}.swal-content:last-child{margin-bottom:20px}.swal-content__input,.swal-content__textarea{-webkit-appearance:none;background-color:#fff;border:none;font-size:14px;display:block;box-sizing:border-box;width:100%;border:1px solid rgba(0,0,0,.14);padding:10px 13px;border-radius:2px;transition:border-color .2s}.swal-content__input:focus,.swal-content__textarea:focus{outline:none;border-color:#6db8ff}.swal-content__textarea{resize:vertical}.swal-button--loading{color:transparent}.swal-button--loading~.swal-button__loader{opacity:1}.swal-button__loader{position:absolute;height:auto;width:43px;z-index:2;left:50%;top:50%;-webkit-transform:translateX(-50%) translateY(-50%);transform:translateX(-50%) translateY(-50%);text-align:center;pointer-events:none;opacity:0}.swal-button__loader div{display:inline-block;float:none;vertical-align:baseline;width:9px;height:9px;padding:0;border:none;margin:2px;opacity:.4;border-radius:7px;background-color:hsla(0,0%,100%,.9);transition:background .2s;-webkit-animation:swal-loading-anim 1s infinite;animation:swal-loading-anim 1s infinite}.swal-button__loader div:nth-child(3n+2){-webkit-animation-delay:.15s;animation-delay:.15s}.swal-button__loader div:nth-child(3n+3){-webkit-animation-delay:.3s;animation-delay:.3s}@-webkit-keyframes swal-loading-anim{0%{opacity:.4}20%{opacity:.4}50%{opacity:1}to{opacity:.4}}@keyframes swal-loading-anim{0%{opacity:.4}20%{opacity:.4}50%{opacity:1}to{opacity:.4}}.swal-overlay{position:fixed;top:0;bottom:0;left:0;right:0;text-align:center;font-size:0;overflow-y:auto;background-color:rgba(0,0,0,.4);z-index:10000;pointer-events:none;opacity:0;transition:opacity .3s}.swal-overlay:before{content:" ";display:inline-block;vertical-align:middle;height:100%}.swal-overlay--show-modal{opacity:1;pointer-events:auto}.swal-overlay--show-modal .swal-modal{opacity:1;pointer-events:auto;box-sizing:border-box;-webkit-animation:showSweetAlert .3s;animation:showSweetAlert .3s;will-change:transform}.swal-modal{width:478px;opacity:0;pointer-events:none;background-color:#fff;text-align:center;border-radius:5px;position:static;margin:20px auto;display:inline-block;vertical-align:middle;-webkit-transform:scale(1);transform:scale(1);-webkit-transform-origin:50% 50%;transform-origin:50% 50%;z-index:10001;transition:opacity .2s,-webkit-transform .3s;transition:transform .3s,opacity .2s;transition:transform .3s,opacity .2s,-webkit-transform .3s}@media (max-width:500px){.swal-modal{width:calc(100% - 20px)}}@-webkit-keyframes showSweetAlert{0%{-webkit-transform:scale(1);transform:scale(1)}1%{-webkit-transform:scale(.5);transform:scale(.5)}45%{-webkit-transform:scale(1.05);transform:scale(1.05)}80%{-webkit-transform:scale(.95);transform:scale(.95)}to{-webkit-transform:scale(1);transform:scale(1)}}@keyframes showSweetAlert{0%{-webkit-transform:scale(1);transform:scale(1)}1%{-webkit-transform:scale(.5);transform:scale(.5)}45%{-webkit-transform:scale(1.05);transform:scale(1.05)}80%{-webkit-transform:scale(.95);transform:scale(.95)}to{-webkit-transform:scale(1);transform:scale(1)}}</style>
  <!-- Required meta tags -->
    <link rel="stylesheet" href="..\img\photo\slider.css">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Panel | Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/font/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="vendors/iconfonts/puse-icons-feather/feather.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- tabelle -->

    <link rel="stylesheet" href="./table_files/materialdesignicons.min.css">
    <link rel="stylesheet" href="./table_files/flag-icon.min.css">
    <link rel="stylesheet" href="./table_files/feather.css">
    <link rel="stylesheet" href="./table_files/vendor.bundle.base.css">
    <link rel="stylesheet" href="./table_files/vendor.bundle.addons.css">
    <!-- endinject -->

    <link rel="stylesheet" href="./table_files/style.css">

  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.ico" />


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <style type="text/css">/* Chart.js */


        .mySlides {display:none}
        .w3-left, .w3-right, .w3-badge {cursor:pointer}
        .w3-badge {height:13px;width:13px;padding:0}




        @-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}</style><style type="text/css">span.im-caret {
            -webkit-animation: 1s blink step-end infinite;
            animation: 1s blink step-end infinite;
        }

        @keyframes blink {
            from, to {
                border-right-color: black;
            }
            50% {
                border-right-color: transparent;
            }
        }

        @-webkit-keyframes blink {
            from, to {
                border-right-color: black;
            }
            50% {
                border-right-color: transparent;
            }
        }

        span.im-static {
            color: grey;
        }

        div.im-colormask {
            display: inline-block;
            border-style: inset;
            border-width: 2px;
            -webkit-appearance: textfield;
            -moz-appearance: textfield;
            appearance: textfield;
        }

        div.im-colormask > input {
            position: absolute;
            display: inline-block;
            background-color: transparent;
            color: transparent;
            -webkit-appearance: caret;
            -moz-appearance: caret;
            appearance: caret;
            border-style: none;
            left: 0; /*calculated*/
        }

        div.im-colormask > input:focus {
            outline: none;
        }

        div.im-colormask > input::-moz-selection{
            background: none;
        }

        div.im-colormask > input::selection{
            background: none;
        }
        div.im-colormask > input::-moz-selection{
            background: none;
        }

        div.im-colormask > div {
            color: black;
            display: inline-block;
            width: 100px; /*calculated*/
    }


        .carousel-fade .carousel-inner .item {
            opacity: 0;
            transition-property: opacity;
        }

        .carousel-fade .carousel-inner .active {
            opacity: 1;
        }

        .carousel-fade .carousel-inner .active.left,
        .carousel-fade .carousel-inner .active.right {
            left: 0;
            opacity: 0;
            z-index: 1;
        }

        .carousel-fade .carousel-inner .next.left,
        .carousel-fade .carousel-inner .prev.right {
            opacity: 1;
        }

        .carousel-fade .carousel-control {
            z-index: 2;
        }
        @media all and (transform-3d), (-webkit-transform-3d) {
            .carousel-fade .carousel-inner > .item.next,
            .carousel-fade .carousel-inner > .item.active.right {
                opacity: 0;
                -webkit-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);
            }
            .carousel-fade .carousel-inner > .item.prev,
            .carousel-fade .carousel-inner > .item.active.left {
                opacity: 0;
                -webkit-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);
            }
            .carousel-fade .carousel-inner > .item.next.left,
            .carousel-fade .carousel-inner > .item.prev.right,
            .carousel-fade .carousel-inner > .item.active {
                opacity: 1;
                -webkit-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);
            }
        }
        .carousel-caption {
            text-shadow: 0 1px 4px rgba(0,0,0,.9);
            font-size:17px
        }
        .carousel-caption h3 {
            font-size: 30px;
            font-family: 'Lato', sans-serif;
        }
        .carousel,
        .carousel-inner,
        .carousel-inner .item {
            height: 100%;
        }
        .item:nth-child(1) {
            /* background: url('https://snap-photos.s3.amazonaws.com/img-thumbs/960w/HZZKGVVJ6I.jpg'); */
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
        }

        .item:nth-child(2) {
            background: url('https://snap-photos.s3.amazonaws.com/img-thumbs/960w/D2ROMCUEIV.jpg');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
        }

        .item:nth-child(3) {
            background: url('https://snap-photos.s3.amazonaws.com/img-thumbs/960w/PU9HHZB5QW.jpg');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
        }



    </style><style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;box-sizing: content-box;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center" style="background-color: #EAC564"> <!-- dfedf0 -->
        <div class="d-flex justify-content-between align-items-center" ><br>
            <p1 class="navbar-brand brand-logo" style="text-align: center; color: white;">Ansima</p1>
        <!--  <div>
            <a class="navbar-brand brand-logo" href="index.html"><img src="images/logo.svg" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo"/></a>
          </div> -->
        </div>
      </div>
      <div class="navbar-menu-wrapper" style="background-color: #EAC564">
       <div class="navbar-overlapped d-flex align-items-center justify-content-end justify-content-lg-start">
          <ul class="navbar-nav navbar-nav-right" >

              <li class="nav-item dropdown">
                  <a class="nav-link language-dropdown" id="userDropdown" href="" data-toggle="dropdown" aria-expanded="false">
                      <p style="background-color: white; color:black; padding:10px; border-radius: 10rem">&emsp;Menu&emsp;</p><br><p></p>
                  </a>
                  <div class="dropdown-menu navbar-dropdown" aria-labelledby="userDropdown" style="border-radius: 1rem">
                      <a class="dropdown-item" href="../logout.php">  <i class="mdi mdi-logout"></i> Logout </a>
                      <a class="dropdown-item" href="../index.php">  <i class="mdi mdi-settings"></i> Go to website </a>
                      <a class="dropdown-item" href="../customer-account.php">  <i class="mdi mdi-account"></i> Go to your account </a>
                  </div>
              </li>
              <li class="nav-item dropdown"></li><li class="nav-item dropdown"></li>


          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">

        <div id="theme-settings" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options selected" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles light"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close mdi mdi-close"></i>
        <ul class="nav nav-tabs" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove mdi mdi-close-circle-outline"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove mdi mdi-close-circle-outline"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove mdi mdi-close-circle-outline"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove mdi mdi-close-circle-outline"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove mdi mdi-close-circle-outline"></i>
                </li>
              </ul>
            </div>
            <div class="events py-4 border-bottom px-3">
              <div class="wrapper d-flex mb-2">
                <i class="mdi mdi-circle-outline text-primary mr-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page</p>
              <p class="text-gray mb-0">build a js based app</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="mdi mdi-circle-outline text-primary mr-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" style='background-color : #262b3a' id="sidebar"><!-- 686868-->
            <ul class="nav">

                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        <i class="icon-layout menu-icon"></i>
                        <span class="menu-title" style="color: white">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item  nav-info">Shop Management</li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                        <i class="icon-stack menu-icon"></i>
                        <span class="menu-title" style="color: white">Products</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="./insert-product.php" style="color: white">Add</a></li>
                            <li class="nav-item"> <a class="nav-link" href="./view-product.php" style="color: white">Lists</a></li>
                            <li class="nav-item"> <a class="nav-link" href="./info-product.php" style="color: white">Edit attributes</a></li>
                            <li class="nav-item"> <a class="nav-link" href="./sale.php" style="color: white">Discount</a></li>
                        </ul>
                    </div>
                </li>

                <div class="collapse" id="icons">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="pages/icons/simple-line-icon.html">Simple line icons</a></li>
                    </ul>
                </div>
                </li>
                <li class="nav-item  nav-info">User's Management</li>
                <li class="nav-item">
                <li class="nav-item">
                    <a class="nav-link" href="./view-users.php">
                        <i class="icon-head  menu-icon"></i>
                        <span class="menu-title" style="color: white">User</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./view-review.php">
                        <i class="icon-menu  menu-icon"></i>
                        <span class="menu-title" style="color: white">Review</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./view-register.php">
                        <i class="icon-mail  menu-icon"></i>
                        <span class="menu-title" style="color: white">Register</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./edit-site.php">
                        <i class="icon-file  menu-icon"></i>
                        <span class="menu-title" style="color: white">Edit Site</span>
                    </a>
                </li>
                <!--      <li class="nav-item">
                        <a class="nav-link" href="pages/documentation/documentation.html">
                          <i class="icon-paper menu-icon"></i>
                          <span class="menu-title"></span>
                        </a>
                      </li>-->
            </ul>
        </nav>
      <!-- partial -->
      <div class="main-panel">
          <div class="content-wrapper">

              <div class="row">
                  <div class="col-sm-12">
                      <div class="d-sm-flex justify-content-between align-items-center mb-4">
                          <div>
                              <p class="text-small text-dark mb-1">Backend / Sale</p>
                              <h4 class="font-weight-bold mb-0">Edit site</h4>
                          </div>
                      </div>
                  </div>
              </div>




              <div class="card mb-3" style="border-radius: 1rem">
                  <div class="card-body">
                      <h6 class="mb-4">Here you can customize all page of your site</h6>
                      <ul class="nav nav-pills nav-fill" id="myTab" role="tablist">
                          <li class="nav-item"><a class="nav-link active" id="tab1" data-toggle="tab" href="#tab1-content" role="tab" aria-controls="tab4-content" aria-selected="false">Login</a></li>
                          <li class="nav-item"><a class="nav-link" id="tab2" data-toggle="tab" href="#tab2-content" role="tab" aria-controls="tab1-content" aria-selected="true">Home Page</a></li>
                          <li class="nav-item"><a class="nav-link" id="tab3" data-toggle="tab" href="#tab3-content" role="tab" aria-controls="tab2-content" aria-selected="false">Shop</a></li>
                          <li class="nav-item"><a class="nav-link" id="tab4" data-toggle="tab" href="#tab4-content" role="tab" aria-controls="tab3-content" aria-selected="false">Contacts</a></li>

                      </ul>
                      <div class="tab-content py-5 px-4">

                          <div class="tab-pane fade active show" id="tab1-content" role="tabpanel" aria-labelledby="tab1-content">

                              <form method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                                  <!--<form class="forms-sample">-->


                                  <div style="background-color: #EAC564; border-radius: 1rem;" class="py-3">
                                      <div class="form-group m-4">
                                          <div class="row m-3">
                                              <h3 style="color: white; margin-bottom: 10px">Titolo Pagina</h3>
                                              <?php echo"<input class='form-control' style='border-radius: 0.5rem' name='titolopagina' value='$titolopagina' >"; ?>
                                          </div>

                                          <div class="row m-3">
                                              <h3 style="color: white; margin-bottom: 10px">Titolo Login</h3>
                                              <?php echo"    <input class='form-control' style='border-radius: 0.5rem' name='titolologin' value='$titolologin' >"; ?>
                                          </div>

                                          <div class="row m-3">
                                              <h3 style="color: white; margin-bottom: 10px">Titolo registrazione</h3>
                                              <?php echo"   <input class='form-control' style='border-radius: 0.5rem'  name='titoloregistrazione' value='$titoloregistrazione' >"; ?>
                                          </div>

                                      </div>
                                  </div>
                                  <div class="form-group m-4">
                                      <div class="row mb-3">
                                          <div class="mb-3 col-lg-12" name="descrizionelogin">
                                              <h2 style="margin-bottom: 10px">Descrizione Login</h2>
                                              <div id="quillExample1"  class="ql-container ql-snow" style="border: none">

                                                  <textarea class="ql-editor" type="text" name="descrizionelogin" contenteditable="true" style='border-radius: 1rem;height: 250px'><?php echo"$descrizionelogin"; ?></textarea>

                                              </div>
                                          </div>

                                          <div class="col-lg-12" name="descrizioneregistrazione" >
                                              <h2 style="margin-bottom: 10px" >Descrizione Registrazione</h2>
                                              <div id="quillExample1"  class="ql-container ql-snow" style="border: none">

                                                  <textarea class="ql-editor" type="text" name="descrizioneregistrazione" name  contenteditable="true" style='border-radius: 1rem;height: 250px'><?php echo"$descrizioneregistrazione"; ?></textarea>

                                              </div>
                                          </div>
                                      </div>

                                  </div><center>
                                      <button type="sumbit" class="btn btn-success btn-icon-text btn-lg" name="qua">
                                          <i class="mdi mdi-upload btn-icon-prepend"></i>
                                          Upload
                                      </button></center></form>







                          </div>

                          <div class="tab-pane fade" id="tab2-content" role="tabpanel" aria-labelledby="tab2-content"> <!--               -->
                              <center>

                                  <form method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                                      <!--<form class="forms-sample">-->
                                      <div style="background-color: #EAC564; border-radius: 1rem; padding: 1px" class="p-3 mb-3">
                                         <br> <h2 style="color: white"><b>Slider</b></h2>
                                          <div class="col">
                                              <div class='row m-4'>
                                                  <h3 class="mb-3" style="color: white">Immagine Slider</h3>
                                                  <div class="dropify-wrapper" style='border-radius: 1rem; height: 200px;'>
                                                      <div class="dropify-message"><span class="file-icon"></span> <p>Drag and drop a file here or click</p><p class="dropify-error">Ooops, something wrong appended.</p></div><div class="dropify-loader"></div>
                                                      <div class="dropify-errors-container"><ul></ul></div>
                                                      <input type="file" class="dropify" name="fotoP"><button type="button" class="dropify-clear" required>Remove</button>
                                                      <div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p><p class="dropify-infos-message">Drag and drop or click to replace</p></div></div></div></div>

                                              </div>
                                              <div class='row m-4'>
                                                  <h3 class="mb-3" style="color: white">Nome slide</h3>
                                                  <input class='form-control' name='nomeslide' style='border-radius: 0.5rem'>

                                              </div>
                                              <div class="row m-4" name="descrizioneslide" >
                                                  <h3 class="mb-3" style="color: white">Descrizione slide</h3>

                                                          <textarea type="text" class="ql-editor" name="descrizioneslide" contenteditable="true" style='border-radius: 0.5rem' id="quillExample1"></textarea>

                                              </div>
                                              <div class="row m-4">
                                                  <h3 class="mb-3" style="color: white">Nome Bottone</h3>

                                                  <?php echo"  <input class='form-control' name='nomebottone'  style='border-radius: 0.5rem'>"; ?>

                                              </div>
                                              <div class="row m-4">
                                                  <h3 class="mb-3" style="color: white">Link Bottone</h3>
                                                  <?php echo"  <input class='form-control' name='linkbottone'  style='border-radius: 0.5rem'>"; ?>
                                              </div>
                                          </div>
                                        </div>

                                      <!-- <h3>Slider</h3>

                                      <div class="row"><div class="col">

                                              <center>
                                                  <div class="w3-content w3-display-container" style="max-width:550px">

                                                      <?php
                                                      $query="SELECT foto FROM slider";
                                                      $result=mysqli_query($connect, $query);
                                                      $x=0;
                                                      while($row = mysqli_fetch_array($result)){

                                                          $imm=$row['foto'];
                                                          echo"<img class='mySlides' src='upload/slider/$imm' style='width:100%'>";
                                                          $x++;
                                                      }
                                                      ?>
                                                      <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
                                                          <div class="w3-left w3-hover-text-khaki" style="content: url('sin.png'); max-height: 25px;" onclick="plusDivs(-1)"></div>
                                                          <div class="w3-right w3-hover-text-khaki" style="content: url('des.png'); max-height: 25px;" onclick="plusDivs(1)"></div>

                                                          <?php
                                                          $i=1;
                                                          while($i<=$x){
                                                              echo"<span class='w3-badge demo w3-border w3-transparent w3-hover-white'  onclick='currentDiv($i)'></span>&nbsp;";
                                                              $i++;
                                                          }

                                                          ?>
                                                      </div>
                                                  </div>
                                              </center>
                                          </div></div>
                                      -->

                                     <br><button type="sumbit" class="btn btn-success btn-icon-text btn-lg" name="unoo">
                                          <i class="mdi mdi-upload btn-icon-prepend"></i>
                                          Upload
                                      </button>
                                  </form>


                                  <form method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                                      <br><br><br>
                                      <div style="background-color: #F6F6F6; border-radius: 1rem; padding: 1px" class="p-3 mb-3">
                                            <br><h2><b>Immagini</b></h2><br><br>
                                            <div class="row">
                                                <div class="col">
                                                    <h4><b>Per donne</b></h4><br>
                                          <div class="dropify-wrapper" style='border-radius: 1rem; height: 300px;'>
                                              <div class="dropify-message"><span class="file-icon"></span> <p>Drag and drop a file here or click</p><p class="dropify-error">Ooops, something wrong appended.</p></div><div class="dropify-loader"></div>
                                              <div class="dropify-errors-container"><ul></ul></div>
                                              <input type="file" class="dropify" name="forwomen"><button type="button" class="dropify-clear" required>Remove</button>
                                              <div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p><p class="dropify-infos-message">Drag and drop or click to replace</p></div></div></div></div>
                                                </div>
                                                <div class="col">
                                                    <h4><b>Per uomini</b></h4><br>
                                          <div class="dropify-wrapper" style='border-radius: 1rem; height: 300px;'>
                                              <div class="dropify-message"><span class="file-icon"></span> <p>Drag and drop a file here or click</p><p class="dropify-error">Ooops, something wrong appended.</p></div><div class="dropify-loader"></div>
                                              <div class="dropify-errors-container"><ul></ul></div>
                                              <input type="file" class="dropify" name="formen"><button type="button" class="dropify-clear" required>Remove</button>
                                              <div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p><p class="dropify-infos-message">Drag and drop or click to replace</p></div></div></div></div>
                                                </div>
                                            </div>
                                          <br><br>
                                      </div>
                                      <button type="sumbit" class="btn btn-success btn-icon-text btn-lg m-4" name="forimmagine">
                                          <i class="mdi mdi-upload btn-icon-prepend"></i>
                                          Upload
                                      </button>
                                  </form>


                                  <form method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                                      <div style="background-color: #262b3a; border-radius: 1rem; padding: 1px" class="p-3 mb-3">
                                          <br><h2 style="color: white"><b>Negozio</b></h2>
                                          <div class="col">
                                                      <div class="row m-4">
                                                          <h3 class="mb-3" style="color: white">Nome negozio</h3>
                                                          <?php echo"  <input class='form-control' name='nomenegozio' value='$nomenegozio' style='border-radius: 1rem' required>"; ?>
                                                      </div>

                                                      <div class="row m-4" name="descrizionenegozio" >
                                                          <h3 class="mb-3" style="color: white">Descrizione Negozio</h3>
                                                          <textarea id="quillExample1" class="ql-editor" type="text" name="descrizionenegozio" name  contenteditable="true" style='border-radius: 1rem'> <?php echo"$descrizionenegozio"; ?></textarea>
                                                      </div>
                                                      <div class="row m-4">
                                                          <h3 class="mb-3" style="color: white">Nuovi Arrivi</h3>
                                                          <?php echo" <input class='form-control' name='nuoviarrivi' value='$nuoviarrivi' style='border-radius: 1rem'>"; ?>
                                                      </div>
                                                      <div class="row m-4" name="descrizioneabbigliamento" >
                                                          <h3 class="mb-3" style="color: white">Descrizione Abbigliamento</h3>
                                                          <textarea id="quillExample1" class="ql-editor" type="text" name="descrizioneabbigliamento"   contenteditable="true" style='border-radius: 1rem'><?php echo"$descrizioneabbigliamento"; ?></textarea>
                                                      </div><br><br>
                                          </div>
                                      </div>



                                      <br><button type="sumbit" class="btn btn-success btn-icon-text btn-lg" name="uno">
                                          <i class="mdi mdi-upload btn-icon-prepend"></i>
                                          Upload
                                      </button> </form></center>
                          </div>

                          <div class="tab-pane fade" id="tab3-content" role="tabpanel" aria-labelledby="tab3-content"> <!--               -->

                                  <form method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                                      <!--<form class="forms-sample">-->


                                      <!-- <h1>Shop</h1><br><br>-->
                                      <div class="form-group row">
                                          <div class="col">
                                              <div class="card-body" name="descrizioneshop" style='height: 300px;'>
                                                  <h1 style="margin-bottom: 20px">Descrizione </h1>
                                                  <div id="quillExample1"  class="ql-container ql-snow" style="border: none">

                                                      <textarea class="ql-editor" type="text" name="descrizioneshop" contenteditable="true" style='border-radius: 1rem'><?php echo"$descrizioneshop"; ?></textarea>

                                                  </div>
                                              </div>
                                          </div>
                                      </div><center>
                                      <button type="sumbit" class="btn btn-success btn-icon-text btn-lg" style="margin-top: 80px; margin-left: 40px" name="due">
                                          <i class="mdi mdi-upload btn-icon-prepend"></i>
                                          Upload
                                      </button>
                                  </form></center></div>

                          <div class="tab-pane fade" id="tab4-content" role="tabpanel" aria-labelledby="tab4-content">      <!--               -->

                                  <form method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                                      <!--<form class="forms-sample">-->
                                      <div style="background-color: #EAC564; border-radius: 1rem; padding: 1px">
                                          <div class="form-group col">
                                              <div class="row m-4">
                                                  <h3 class="mb-3" style="color: white">Address</h3>
                                         <?php echo"         <input class='form-control' name='address' value='$andress' >"; ?>
                                              </div>

                                              <div class="row m-4">
                                                  <h3 class="mb-3" style="color: white">Call Center</h3>
                                              <?php echo"    <input class='form-control' name='callcenter' value='$callcenter' >"; ?>
                                              </div>

                                              <div class="row m-4">
                                                  <h3 class="mb-3" style="color: white">Electronic support</h3>
                                               <?php echo"   <input class='form-control' name='electronicsupport' value='$eletronic_support' >"; ?>
                                              </div>

                                              <div class="row m-4">
                                                  <h3 class="mb-3" style="color: white">Call Center Number </h3>
                                              <?php echo"    <input class='form-control' name='callcenternumber' value='$Call_Center_Number' style='height: 25px;'>"; ?>
                                              </div>

                                              <div class="row m-4">
                                                  <h3 class="mb-3" style="color: white">Electronic support Number</h3>
                                        <?php echo"          <input class='form-control' name='electronicsupportnumber' value='$Electronic_support_Number'style='height: 25px;'>"; ?>
                                              </div>
                                            </div>
                                        </div>
                                        <center>
                                      <button type="sumbit" class="btn btn-success btn-icon-text btn-lg" style="margin: 20px" name="tre">
                                          <i class="mdi mdi-upload btn-icon-prepend"></i>
                                          Upload
                                      </button> </center>
                                  </form>


                                  <form method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                                    <div style="background-color: #F6F6F6; border-radius: 1rem; padding: 1px">
                                      <div class="form-group">
                                          <div class="col">
                                              <div class="row m-4">
                                                  <h3 class="mb-3">Store Name</h3>
                                                  <input class="form-control" name="storename" >
                                              </div>

                                              <div class="row m-4">
                                                  <h3 class="mb-3">Store Address</h3>
                                                  <input class="form-control" name="storeaddress" >
                                              </div>
                                              <div class="row m-4">
                                                  <h3 class="mb-3">Store Number</h3>
                                                  <input class="form-control" name="storenumber" >
                                              </div>
                                              <div class="row m-4">
                                                  <h3 class="mb-3">Store Email</h3>
                                                  <input class="form-control" name="storeemail" >
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                    <center>
                                      <button type="sumbit" class="btn btn-success btn-icon-text btn-lg" style="margin: 20px" name="tre1">
                                          <i class="mdi mdi-upload btn-icon-prepend"></i>
                                          Upload
                                      </button> </center>
                                  </form>

                              </center>


                                  <div class="row"> <!----------------------------------------------------------------------------------- ------------------->
                                      <div class="content-wrapper">
                                          <div class="card" style='border-radius: 1rem;'>
                                              <div class="card-body">
                                                  <h4 class="card-title">Sconti immessi</h4>
                                                  <div class="row">
                                                      <div class="col-12">
                                                          <div class="table-responsive">
                                                              <div id="order-listing_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                                                  <div class="row"><div class="col-sm-12 col-md-6">
                                                                          <div class="dataTables_length" id="order-listing_length"></div></div><div class="col-sm-12 col-md-6"><div id="order-listing_filter" class="dataTables_filter"></div></div></div><div class="row"><div class="col-sm-12">
                                                                          <table id="order-listing" class="table-responsive dataTable no-footer" role="grid" aria-describedby="order-listing_info" style="text-align: center">
                                                                              <thead>
                                                                              <tr role="row">
                                                                                  <th class="sorting_asc" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Order #: activate to sort column descending" style="width: 115px;">Codice</th>
                                                                                  <th class="sorting_asc" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Order #: activate to sort column descending" style="width: 115px;">Nome</th>
                                                                                  <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Purchased On: activate to sort column ascending" style="width: 185px;">Indirizzo</th>
                                                                                  <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Customer: activate to sort column ascending" style="width: 139px;">Contatto</th>
                                                                                  <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Ship to: activate to sort column ascending" style="width: 112px;">Email</th>
                                                                                  <th class='sorting' tabindex='0' aria-controls='order-listing' rowspan='1'  aria-label='Actions: activate to sort column ascending' style='text-align:center;width: 118px;'>Actions</th>

                                                                              </tr>
                                                                              </thead>
                                                                              <tbody>
                                                                              <?php
                                                                              include("../functions/users.php");
                                                                              $query="SELECT * FROM STORE";
                                                                              $dati=mysqli_query($connect, $query)
                                                                                or die ("Non riesco ad eseguire la query $dati");
                                                                              $cont=1;
                                                                              while($row = mysqli_fetch_array($dati)){
                                                                                  $idstore=$row['id'];
                                                                                  $nome=$row['name'];
                                                                                  $indirizzo=$row['andress'];
                                                                                   $numero=$row['number'];
                                                                                  $email=$row['email'];
                                                                                  echo" <tr>  
                                                                        <td>$cont</td>
                                                                        <td>$nome</td> 
                                                                        <td>$indirizzo</td>
                                                                        <td>$numero</td>
                                                                        <td>$email</td>
                                                                        
                                                                        <td><a class='btn btn-danger' href='../functions/store_delete.php?id=$idstore' onclick='return conferma1()'>Delete</a></td>";


                                                                                  echo"     </tr> ";$cont++;}
                                                                              ?>

                                                                              </tbody>
                                                                          </table>
                                                                      </div>
                                                                  </div>
                                                                  <div class="row"><div class="col-sm-12 col-md-5"></div>
                                                                      <div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="order-listing_paginate"><ul class="pagination"><li class="paginate_button page-item active"></li></ul></div></div></div></div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>







                                      </div>



                          </div>

                      </div>
                  </div>
              <script>
                  var slideIndex = 1;
                  showDivs(slideIndex);

                  function plusDivs(n) {
                      showDivs(slideIndex += n);
                  }

                  function currentDiv(n) {
                      showDivs(slideIndex = n);
                  }

                  function showDivs(n) {
                      var i;
                      var x = document.getElementsByClassName("mySlides");
                      var dots = document.getElementsByClassName("demo");
                      if (n > x.length) {slideIndex = 1}
                      if (n < 1) {slideIndex = x.length}
                      for (i = 0; i < x.length; i++) {
                          x[i].style.display = "none";
                      }
                      for (i = 0; i < dots.length; i++) {
                          dots[i].className = dots[i].className.replace(" w3-white", "");
                      }
                      x[slideIndex-1].style.display = "block";
                      dots[slideIndex-1].className += " w3-white";
                  }
              </script>
<?php

if(isset($_POST["uno"])){

            $nomeNegozio=$_POST['nomenegozio'];
            $descrizioneNegozio=$_POST['descrizionenegozio'];
            $nuoviArrivi=$_POST['nuoviarrivi'];
            $descrizioneAbbigliamento=$_POST['descrizioneabbigliamento'];
            
            $query="UPDATE Sito set Nome_negozio='$nomeNegozio', Nuovi_arrivi='$nuoviArrivi', Descrizione_negozio='$descrizioneNegozio', Descrizione_abbigliamento='$descrizioneAbbigliamento' where id=1";
                 $dati=mysqli_query($connect, $query)
            or die ("Non riesco ad eseguire la query $dati");
                   header("Location: ./edit-site.php");
            
}

if(isset($_POST["unoo"])){

    $err=0;
    $fotop=$_POST['fotoP'];
    if(isset($_FILES["fotoP"])) { 
        if ((($_FILES["fotoP"]["type"] == "image/gif")
            || ($_FILES["fotoP"]["type"] == "image/jpeg")
            || ($_FILES["fotoP"]["type"] == "image/pjpeg")
            || ($_FILES["fotoP"]["type"] == "image/png"))
            && ($_FILES["fotoP"]["size"] < 40000000))
        {
            move_uploaded_file($_FILES["fotoP"]["tmp_name"],
            "upload/slider/" . $_FILES["fotoP"]["name"]);
            $fotop=$_FILES["fotoP"]["name"];}
        else
    {
            $err=1;
            echo "<script> alert('impossibile caricare la foto'); </script>";
        }
   }  
    $descrizioneslide=$_POST['descrizioneslide'];
    $nomeslide=$_POST['nomeslide'];
    $nomebottone=$_POST['nomebottone'];
    $linkbottone=$_POST['linkbottone'];

    $query="INSERT INTO slider VALUES ('$fotop', '$nomeslide', '$descrizioneslide', '$nomebottone', '$linkbottone')";
    $dati=mysqli_query($connect, $query);

    //header("Location: ./edit-site.php");
    //echo("error: " . mysqli_error($connect));


    header("Location: ./edit-site.php");

}


if(isset($_POST["forimmagine"])){

    $err=0;
    $err1=0;
    $fotow=$_POST['forwomen'];
    $fotom=$_POST['formen'];
    if(isset($_FILES["forwomen"])) {
        if ((($_FILES["forwomen"]["type"] == "image/gif")
                || ($_FILES["forwomen"]["type"] == "image/jpeg")
                || ($_FILES["forwomen"]["type"] == "image/pjpeg")
                || ($_FILES["forwomen"]["type"] == "image/png"))
            && ($_FILES["forwomen"]["size"] < 40000000))
        {
            move_uploaded_file($_FILES["forwomen"]["tmp_name"],
                "upload/index_uomo_donna/" . $_FILES["forwomen"]["name"]);
            $fotow=$_FILES["forwomen"]["name"];
            $query="UPDATE Sito SET donna='$fotow'";
            $dati=mysqli_query($connect, $query);
        }
        else
        {
            $err=1;
            echo "<script> alert('impossibile caricare per la donna'); </script>";
        }
    }

    if(isset($_FILES["formen"])) {
        if ((($_FILES["formen"]["type"] == "image/gif")
                || ($_FILES["formen"]["type"] == "image/jpeg")
                || ($_FILES["formen"]["type"] == "image/pjpeg")
                || ($_FILES["formen"]["type"] == "image/png"))
            && ($_FILES["formen"]["size"] < 40000000))
        {
            move_uploaded_file($_FILES["formen"]["tmp_name"],
                "upload/index_uomo_donna/" . $_FILES["formen"]["name"]);
            $fotom=$_FILES["formen"]["name"];
            $query="UPDATE Sito SET uomo='$fotom'";
            $dati=mysqli_query($connect, $query);}
        else
        {
            $err1=1;
            echo "<script> alert('impossibile caricare per uomo'); </script>";
        }
    }



    //header("Location: ./edit-site.php");
    echo("error: " . mysqli_error($connect));
    header("Location: ./edit-site.php");



}

    if(isset($_POST["due"])){

        $nomeShop=$_POST['descrizioneshop'];
        
        $query="UPDATE Sito set Descrizione_shop='$nomeShop' where id=1";
        $dati=mysqli_query($connect, $query)
        or die ("Non riesco ad eseguire la query $dati");
                           header("Location: ./edit-site.php");

            

    }

    if(isset($_POST["tre"])){

        $nomeAddress=$_POST['address'];
        $nomeCallcenter=$_POST['callcenter'];
        $nomeSupport=$_POST['electronicsupport'];
        $nomeNumber1=$_POST['callcenternumber'];
        $nomeNumber2=$_POST['electronicsupportnumber'];
        
                    $query="UPDATE Sito set Andress='$nomeAddress', Call_center='$nomeCallcenter', eletronic_support='$nomeSupport', Call_center_Number='$nomeNumber1', Electronic_support_Number='$nomeNumber2' where id=1";
                 $dati=mysqli_query($connect, $query)
                or die ("Non riesco ad eseguire la query $dati");
           // echo("error: " . mysqli_error($connect));
                           header("Location: ./edit-site.php");



    }

    if(isset($_POST["qua"])){

        $titoloPagina=$_POST['titolopagina'];
        $titoloLogin=$_POST['titolologin'];
        $titoloRegistrazione=$_POST['titoloregistrazione'];
        $descrizioneLogin=$_POST['descrizionelogin'];
        $descrizioneRegistrazione=$_POST['descrizioneregistrazione'];
        
        $query="UPDATE  Sito set titolo_pagina='$titoloPagina', titolo_login='$titoloLogin', titolo_registrazione='$titoloRegistrazione', descrizione_login='$descrizioneLogin', descrizione_registrazione='$descrizioneRegistrazione' where id=1";   //-----------------------
             $dati=mysqli_query($connect, $query);
            //   or die ("Non riesco ad eseguire la query $dati");
        // echo("error: " . mysqli_error($connect));
                           header("Location: ./edit-site.php");

    }

    if(isset($_POST["tre1"])){

        $nomeName=$_POST['storename'];
        $nomeAddress=$_POST['storeaddress'];
        $nomeNumber=$_POST['storenumber'];
        $nomeEmail=$_POST['storeemail'];

        $query="INSERT INTO store VALUES ('', '$nomeName', '$nomeAddress', '$nomeNumber', '$nomeEmail')";
        $dati=mysqli_query($connect, $query);
    //   or die ("Non riesco ad eseguire la query $dati");
    //echo("error: " . mysqli_error($connect));
        header("Location: ./edit-site.php");

}
?>
    <!-- page-body-wrapper ends -->
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="./table_files/vendor.bundle.base.js"></script>
  <script src="./table_files/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="./table_files/off-canvas.js"></script>
  <script src="./table_files/hoverable-collapse.js"></script>
  <script src="./table_files/template.js"></script>
  <script src="./table_files/settings.js"></script>
  <script src="./table_files/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="./table_files/data-table.js"></script>
  <!-- End custom js for this page-->
<script>


   function conferma1(){

          if (confirm("Sicuro di voler eliminare lo sconto?"))
              return true;
          else
              return false;

      }
    
   function conferma2(){

          if (confirm("Sicuro di voler eliminare la slide?"))
              return true;
          else
              return false;

      }    
</script>
</body>

</html>

