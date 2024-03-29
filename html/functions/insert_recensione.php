      <?php
        session_start();
    include("./connection.php");
        $connect=connection();
        if(isset($_POST["inviaRec"])){
            $tagliaI=$_GET["taglia"];
        
        $idutente=$_SESSION["id"];
        $idprodotto=$_SESSION["idprodotto"];
        $dettaglio=$_POST['dettaglio'];
            $dettaglio=str_replace("'", "&ap;", $dettaglio);

        $rating=$_POST['rating'];
            $query="insert into recensione VALUES ('', '$dettaglio', '$idutente','$rating', '$idprodotto')";
            $dati=mysqli_query($connect, $query);
            //echo("error: " . mysqli_error($connect));

                
         header("location: ../detail-1.php?id=$idprodotto&car=0&wish=0&taglia=$tagliaI");
            
        }
//$dettaglio=str_replace("'", "&ap;", $dettaglio); $dettaglio=str_replace("&ap;", "'", $dettaglio);

            
            ?>