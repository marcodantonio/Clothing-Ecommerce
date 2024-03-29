<?php
include("./connection.php");
$connect=connection();
$nome=$_POST["nome"];
$percentuale=$_POST["percentuale"];
$durata=$_POST["durata"];

$query="insert into sconto VALUES ('', '$nome','$percentuale', '$durata')";
            $dati=mysqli_query($connect, $query);
                //or die ("Non riesco ad eseguire la query $dati");

             echo("error: " . mysqli_error($connect));

          header("location: ../backend/sale.php");

?>