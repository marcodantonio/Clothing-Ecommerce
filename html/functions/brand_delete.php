<?php
include('connection.php');
$connect=connection();
$id=$_GET['id'];

    $query="delete from brand  where id=$id";
    $dati=mysqli_query($connect, $query)
    or die ("Non riesco ad eseguire la query $dati");
    //echo("error: " . mysqli_error($connect));





header("location: ../backend/info-product.php");
?>