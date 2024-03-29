<?php

include('connection.php');
$connect=connection();
$idC=$_GET['idC'];
$idP=$_GET['idP'];
$taglia=$_GET['taglia'];

    $query="insert into carrello_prodotto values ('$idC','$idP', '$taglia', '1')";
    $dati=mysqli_query($connect, $query);

    if(mysqli_error($connect)){
    

 $query="SELECT id FROM taglia where tipologia='$taglia'";
                            $dati=mysqli_query($connect, $query);
                            $valori=mysqli_fetch_array($dati);
                            $idtaglia=$valori["id"];
                        
                        
                            $query="SELECT quantita FROM taglia_prodotto where (id_taglia=$idtaglia and id_prodotto=$idP)";
                            $dati=mysqli_query($connect, $query);
                            $valori=mysqli_fetch_array($dati);
                            $vecchiaQuantità=$valori["quantita"];
        
                            $query="SELECT quantita FROM carrello_prodotto where (id_carrello=$idC and id_prodotto=$idP and taglia='$taglia')";
                            $dati=mysqli_query($connect, $query);
                            $valori=mysqli_fetch_array($dati);
                            $vecchiaQuantità=$valori["quantita"];

        
        
                            $query="SELECT id FROM taglia where tipologia='$taglia'";
                            $dati=mysqli_query($connect, $query);
                            $valori=mysqli_fetch_array($dati);
                            $idtaglia=$valori["id"];
                        
                            $query="SELECT quantita FROM taglia_prodotto where (id_taglia=$idtaglia and id_prodotto=$idP)";
                            $dati=mysqli_query($connect, $query);
                            $valori=mysqli_fetch_array($dati);
                            $quantitatotale=$valori["quantita"];
        
                        
                            $nuovaquantita=$vecchiaQuantità+1;

if($nuovaquantita>$quantitatotale){

    header("location: ../customer-wishlist.php?wish=2"); }
        
        
        
else{
                                                                                    
    $query="UPDATE carrello_prodotto set quantita='$nuovaquantita' where (id_carrello=$idC and id_prodotto=$idP and taglia='$taglia')";
     $dati=mysqli_query($connect, $query);
    }}

$query="delete from prodotto_lista_desideri where (id_lista_desideri=$idC and id_prodotto=$idP and taglia='$taglia')";
$dati=mysqli_query($connect, $query);
header("location: ../customer-wishlist.php?wish=1");


   
    
    





  ?>  