<?php
include('connection.php');
include('users.php');
$connect=connection();
controllo_utente();

$idC=$_GET['idC'];
$idP=$_GET['idP'];
$taglia=$_GET['taglia'];
$pro=$_GET['pro'];
$idD=$_SESSION["idprodotto"];
$tagliaI=$_SESSION["tagliaDetail"];

    $query="delete from carrello_prodotto where (id_carrello=$idC and id_prodotto=$idP and taglia='$taglia')";
    $dati=mysqli_query($connect, $query);



if($pro==1)
    header("location: ../index.php");
elseif($pro==2)
    header("location: ../category-sidebar.php");
elseif($pro==3)
    header("location: ../detail-1.php?wish=0&car=0&idC=$idC&id=$idD&taglia=$tagliaI");
elseif($pro==4)
    header("location: ../privacy.php?");
elseif($pro==5)
    header("location: ../contact.php?");
else
    header("location: ../cart.php?err=0");
?>