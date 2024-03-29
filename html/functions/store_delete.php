<?php
include('connection.php');
$connect=connection();
$id=$_GET['id'];

    $query="delete from store  where id=$id";
    $dati=mysqli_query($connect, $query);
    echo("error: " . mysqli_error($connect));




header("location: ../backend/edit-site.php");
?>