<?php
include('connection.php');
$connect=connection();
$id=$_GET["id"];

    $query="update utente set id_gruppo=2 where id=$id";
    $dati=mysqli_query($connect, $query)
    or die ("Non riesco ad eseguire la query $dati");
    //echo("error: " . mysqli_error($connect));





header("location: ../backend/view-users.php");?>