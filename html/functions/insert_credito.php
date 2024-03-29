<?php      
      
          include("connection.php");
        $connect=connection();
    include("users.php");
    session_start();
      
        $id=$_SESSION["id"];
        $proprietario=$_POST['proprietario'];
        $numero=$_POST['numero'];
        $data_scadenza=$_POST['data_scadenza'];
        $cvv=$_POST['cvv'];
      
      
      
      
      $query="insert into carta_credito VALUES ('', '$proprietario','$numero','$data_scadenza','$cvv')";
            $dati=mysqli_query($connect, $query);
            //echo("error: " . mysqli_error($connect));
            

        
            $query="SELECT MAX(id) as massimo FROM carta_credito";
            $dati=mysqli_query($connect, $query);
            $valori=mysqli_fetch_array($dati);
            $idcarta=$valori["massimo"];
            
            $query="insert into utente_cartacredito VALUES ('$id', '$idcarta');";
            $dati=mysqli_query($connect, $query);
            
            
header("location: ../customer-creditcard.php");

            
            ?>