<?php
include('connection.php');
$connect=connection();
$idL=$_GET['idL'];
$idP=$_GET['idP'];
$taglia=$_GET['taglia'];

    $query="delete from prodotto_lista_desideri where (id_lista_desideri=$idL and id_prodotto=$idP and taglia='$taglia')";
    $dati=mysqli_query($connect, $query);




header("location: ../customer-wishlist.php?wish=0");
?>