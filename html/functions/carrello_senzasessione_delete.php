<?php
include('users.php');
controllo_utente();
$i=$_GET["i"];
$pro=$_GET["pro"];
$idC=$_GET['idC'];
$idP=$_GET['id'];
$taglia=$_GET['taglia'];
$idD=$_SESSION["idprodotto"];
$tagliaI=$_SESSION["tagliaDetail"];

$cont=0;
while($cont<4){
    array_splice($_SESSION["carrello"],$i,1);
    $cont++;}
if($pro==1)
    header("location: ../index.php");
elseif($pro==2)
    header("location: ../category-sidebar.php");
elseif($pro==3)
    header("location: ../detail-1.php?&wish=0&car=0&id=$idP&taglia=$tagliaI");
elseif($pro==4)
    header("location: ../privacy.php");
else
    header("location: ../contact.php");

?>


