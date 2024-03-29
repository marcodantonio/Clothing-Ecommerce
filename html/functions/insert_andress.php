<?php
    include("connection.php");
        $connect=connection();
    include("users.php");
    session_start();

        $id=$_SESSION["id"];
        $fullname=$_POST['fullname'];
        $email=$_POST['email'];
        $via=$_POST['via'];
        $via=str_replace("'", "&ap;", $via); 
        $cap=$_POST['cap'];
        $stato=$_POST['stato'];
        $stato=str_replace("'", "&ap;", $stato); 
        $citta=$_POST['citta']; 
        $citta=str_replace("'", "&ap;", $citta); 


            $query="insert into indirizzo VALUES ('','$fullname','$email', '$via','$cap','$stato','$citta');";
            $dati=mysqli_query($connect, $query);
        
            $query="SELECT MAX(id) as massimo FROM indirizzo";
            $dati=mysqli_query($connect, $query);
            $valori=mysqli_fetch_array($dati);
            $idindririzzo=$valori["massimo"];
            
            $query="insert into utente_indirizzo VALUES ('$id', '$idindririzzo');";
            $dati=mysqli_query($connect, $query);
            header("location: ../customer-addresses.php");



            $query="insert into backup_indirizzo VALUES ('$idindririzzo','$fullname','$email', '$via','$cap','$stato','$citta','$id');";
            $dati=mysqli_query($connect, $query);
            

?>