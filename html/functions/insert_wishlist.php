<?php

include('connection.php');
$connect=connection();
$idL=$_GET['idL'];
$idP=$_GET['idP'];
$taglia=$_GET['taglia'];


    $query="insert into prodotto_lista_desideri values ('$idP','$idL', '$taglia')";
    $dati=mysqli_query($connect, $query);

if(mysqli_error($connect))
    header("location: ../detail-1.php?id=$idP&car=0&wish=2&taglia=$taglia");
else
    header("location: ../detail-1.php?id=$idP&car=0&wish=1&taglia=$taglia");
  ?>  
    
    
