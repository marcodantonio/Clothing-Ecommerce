<?php
include("./connection.php");
include("./users.php");
include("./product_pull.php");
$connect=connection();
controllo_utente();
$idcarrello=$_SESSION['id'];
$taglia=$_GET['taglia'];
$quantita=$_GET['newquantita'];
$idprodotto=$_GET['idprodotto'];


$query="select * from taglia where tipologia='$taglia'";
$dati=mysqli_query($connect, $query);
$valori=mysqli_fetch_array($dati);
$codtaglia=$valori["id"];  

$query="select quantita from taglia_prodotto where (id_taglia=$codtaglia and id_prodotto=$idprodotto)";
$dati=mysqli_query($connect, $query);
$valori=mysqli_fetch_array($dati);
$quantitaTOT=$valori["quantita"];  

if($quantita<=0){
    
  header("location: ../cart.php?err=1")  ;
    
}

elseif($quantita>$quantitaTOT){
    
  header("location: ../cart.php?err=2")  ;
    
}


else{
$query="UPDATE carrello_prodotto SET quantita='$quantita' where (id_prodotto=$idprodotto and id_carrello=$idcarrello and taglia='$taglia')";
$query=mysqli_query($connect, $query);

header("location: ../cart.php?err=0");
}
?>