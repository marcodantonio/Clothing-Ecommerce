<?php
include('connection.php');
$connect=connection();
$id=$_GET["id"];

    $query="delete from colore where id=$id";
    $dati=mysqli_query($connect, $query)
    or die ("Non riesco ad eseguire la query $dati");
    





header("location: ../backend/info-product.php");?>