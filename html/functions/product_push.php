
<?php

    function insert_brand($connect,$nome){
        
        
            
            $query="insert into brand VALUES ('', '$nome')";
            $dati=mysqli_query($connect, $query)
                or die ("Non riesco ad eseguire la query $dati");
    }
        function insert_sconto($connect,$nome,$percentuale,$durata){ 
                         $query="insert into sconto VALUES ('', '$nome','$percentuale', '$durata')";
            $dati=mysqli_query($connect, $query)
                or die ("Non riesco ad eseguire la query $dati");}  
     
        
      function insert_taglia($connect,$tipologia){
                    
            $query="insert into taglia  VALUES ('', '$tipologia')";
            $dati=mysqli_query($connect, $query)
                or die ("Non riesco ad eseguire la query $dati");
    }  

      function insert_colore($connect,$nome,$hex){
        
          $query="insert into colore VALUES ('', '$nome', '$hex')";
            $dati=mysqli_query($connect, $query)
                or die ("Non riesco ad eseguire la query $dati");
    }  
        

      function insert_categoria($connect,$nome,$svg){
        
          $query="insert into categoria VALUES ('', '$nome', '$svg')";
            $dati=mysqli_query($connect, $query)
                or die ("Non riesco ad eseguire la query $dati");
    }  
        


        function insert_prodotto($connect, $nome, $codice, $costo, $descriP, $descriS, $foto_p, $foto_1, $foto_2, $foto_3, $foto_4, $foto_5, $colore, $brand, $categoria, $taglia, $quantita, $taglia1, $quantita1, $taglia2, $quantita2, $taglia3, $quantita3, $taglia4, $quantita4, $materiale, $vestibilita,$tipologia,$sconto){
                    
            $query="SELECT id as idcolore FROM colore where nome='$colore'";
            $dati=mysqli_query($connect, $query);
            $valori=mysqli_fetch_array($dati);
            $idcolore=$valori["idcolore"];
            
        if($sconto){
            $query="SELECT id as idsconto FROM sconto where codice_sconto='$sconto'";
            $dati=mysqli_query($connect, $query);
            $valori=mysqli_fetch_array($dati);
            $idsconto=$valori["idsconto"];}
        else
            $idsconto=0;
            
            $query="SELECT id as idbrand FROM brand where nome='$brand'";
            $dati=mysqli_query($connect, $query);
            $valori=mysqli_fetch_array($dati);
            $idbrand=$valori["idbrand"];
            
            
            $query="SELECT id as idcategoria FROM categoria where tipologia='$categoria'";
            $dati=mysqli_query($connect, $query);
            $valori=mysqli_fetch_array($dati);
            $idcategoria=$valori["idcategoria"];

            
            $query="insert into prodotto VALUES ('', '$codice', '$nome', '$descriP', '$descriS', '$costo', '$materiale', '$vestibilita', '$tipologia', '$idcategoria', '$idbrand', '$idcolore', '$idsconto')";
            $dati=mysqli_query($connect, $query);
            echo("error: " . mysqli_error($connect));
                
            $query="SELECT MAX(id) as massimo FROM prodotto";
            $dati=mysqli_query($connect, $query);
            $valori=mysqli_fetch_array($dati);
            $idprodotto=$valori["massimo"];
            
            $query="SELECT id as idtaglia FROM taglia where tipologia='$taglia'";
            $dati=mysqli_query($connect, $query);
            $valori=mysqli_fetch_array($dati);
            $idtaglia=$valori["idtaglia"];
            
            $query="insert into taglia_prodotto VALUES ('$idtaglia','$idprodotto','$quantita')";
            $dati=mysqli_query($connect, $query);
                
                if($taglia1!="" && $quantita1!=""){
            $query="SELECT id as idtaglia1 FROM taglia where tipologia='$taglia1'";
            $dati=mysqli_query($connect, $query);
            $valori=mysqli_fetch_array($dati);
            $idtaglia1=$valori["idtaglia1"];
            $query="insert into taglia_prodotto VALUES ('$idtaglia1','$idprodotto','$quantita1')";
            $dati=mysqli_query($connect, $query);}
                
                if($taglia2!="" && $quantita2!=""){
            $query="SELECT id as idtaglia2 FROM taglia where tipologia='$taglia2'";
            $dati=mysqli_query($connect, $query);
            $valori=mysqli_fetch_array($dati);
            $idtaglia2=$valori["idtaglia2"];
            $query="insert into taglia_prodotto VALUES ('$idtaglia2','$idprodotto','$quantita2')";
            $dati=mysqli_query($connect, $query);}
                
                if($taglia3!="" && $quantita3!=""){
            $query="SELECT id as idtaglia3 FROM taglia where tipologia='$taglia3'";
            $dati=mysqli_query($connect, $query);
            $valori=mysqli_fetch_array($dati);
            $idtaglia3=$valori["idtaglia3"];
            $query="insert into taglia_prodotto VALUES ('$idtaglia3','$idprodotto','$quantita3')";
            $dati=mysqli_query($connect, $query);}
                
                if($taglia4!="" && $quantita4!=""){
            $query="SELECT id as idtaglia4 FROM taglia where tipologia='$taglia4'";
            $dati=mysqli_query($connect, $query);
            $valori=mysqli_fetch_array($dati);
            $idtaglia4=$valori["idtaglia4"];
            $query="insert into taglia_prodotto VALUES ('$idtaglia4','$idprodotto','$quantita4')";
            $dati=mysqli_query($connect, $query);}
                
                
                
                
            
     
                
            
            $query="insert into immagine VALUES ('','$foto_p','$idprodotto')";
            $dati=mysqli_query($connect, $query);

            if($foto_1){
                $query="insert into immagine VALUES ('','$foto_1','$idprodotto')";
            $dati=mysqli_query($connect, $query);}
            if($foto_2){
                $query="insert into immagine VALUES ('','$foto_2','$idprodotto')";
                $dati=mysqli_query($connect, $query);}
            if($foto_3){
                $query="insert into immagine VALUES ('','$foto_3','$idprodotto')";
                $dati=mysqli_query($connect, $query);}
            if($foto_4){
                $query="insert into immagine VALUES ('','$foto_4','$idprodotto')";
                $dati=mysqli_query($connect, $query);}
            if($foto_5){
                $query="insert into immagine VALUES ('','$foto_5','$idprodotto')";
                $dati=mysqli_query($connect, $query);}
            
            

    }  
        
          function insert_recensione($connect,$name,$dettaglio,$valutazione){
        
  
            $query="insert into 'recensione' (dettaglio,valutazione) VALUES ('$dettaglio','$valutazione')";
            $dati=mysqli_query($connect, $query);
            return 1;
  
    }  
        
