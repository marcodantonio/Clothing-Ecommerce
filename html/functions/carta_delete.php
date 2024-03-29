<?php
include('connection.php');
$connect=connection();
$id=$_GET['id'];

    $query="delete from carta_credito  where id=$id";
    $dati=mysqli_query($connect, $query)
    or die ("Non riesco ad eseguire la query $dati");
    //echo("error: " . mysqli_error($connect));




header("location: ../customer-creditcard.php");
?>