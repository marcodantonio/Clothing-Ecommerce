<?php

    function insert_andress($connect, $id,$fullname,$email, $via, $cap, $stato, $citta){
            
            
            $query="insert into indirizzo VALUES ('','$fullname','$email', '$via','$cap','$stato','$citta');";
            $dati=mysqli_query($connect, $query);
        
            $query="SELECT MAX(id) as massimo FROM indirizzo";
            $dati=mysqli_query($connect, $query);
            $valori=mysqli_fetch_array($dati);
            $idindririzzo=$valori["massimo"];
            
            $query="insert into utente_indirizzo VALUES ('$id', '$idindririzzo');";
            $dati=mysqli_query($connect, $query);
            
            $query="insert into backup_indirizzo VALUES ('$idindririzzo','$fullname','$email', '$via','$cap','$stato','$citta','$id');";
            $dati=mysqli_query($connect, $query);
        
                    return $idindririzzo;


    }

    function insert_cart($connect, $id, $proprietario, $numero, $data_scadenza, $cvv){
             
            $query="insert into carta_credito VALUES ('', '$proprietario','$numero','$data_scadenza','$cvv')";
            $dati=mysqli_query($connect, $query);
            //echo("error: " . mysqli_error($connect));
            

        
            $query="SELECT MAX(id) as massimo FROM carta_credito";
            $dati=mysqli_query($connect, $query);
            $valori=mysqli_fetch_array($dati);
            $idcarta=$valori["massimo"];
            
            $query="insert into utente_cartacredito VALUES ('$id', '$idcarta');";
            $dati=mysqli_query($connect, $query);
            return 1;
    }