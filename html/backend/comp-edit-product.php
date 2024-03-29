<?php
if(isset($_POST["invia"])){
    include("../functions/connection.php");
        $connect=connection();
    session_start();
    
$idprodotto=$_SESSION["id_prodotto"];
$codiceA=$_POST["codiceA"];
$nome=$_POST["nome"];
$costo=$_POST["costo"];
$costo=trim($costo,"$");
$query="SELECT MAX(costo) as costomaggiore FROM prodotto";
$result=mysqli_query($connect, $query);
$maxcosto = mysqli_fetch_array($result);
$maxcosto=$maxcosto['costomaggiore'];

$query="SELECT MIN(costo) as costominore FROM prodotto";
$result=mysqli_query($connect, $query);
$mincosto = mysqli_fetch_array($result);
$mincosto=$mincosto['costominore'];
$_COOKIE['costominimo_def']=$mincosto;
$_COOKIE['costomassimo_def']=$maxcosto;
    
    
    
if($costo>$_COOKIE["costomassimo_def"])
    $_COOKIE["costomassimo_def"]=$costo;
if($costo<$_COOKIE["costominimo_def"])
    $_COOKIE["costomiminimo_def"]=$costo;
$descriP=$_POST["descriP"];
$descriS=$_POST["descriS"];
$brand=$_POST["brand"];
$colore=$_POST["colore"];
$categoria=$_POST["categoria"];
$materiale=$_POST["materiale"];    
$tipologia=$_POST["tipologia"];    
$sconto=$_POST["sconto"];    

$vestibilita=$_POST["vestibilita"];  
$taglia=$_POST["taglia"];    
$taglia1=$_POST["taglia1"];    
$taglia2=$_POST["taglia2"];    
$taglia3=$_POST["taglia3"];    
$taglia4=$_POST["taglia4"];
$quantita=$_POST["quantita"];    
$quantita1=$_POST["quantita1"];    
$quantita2=$_POST["quantita2"];    
$quantita3=$_POST["quantita3"];    
$quantita4=$_POST["quantita4"];
    echo $nome;

    
  if($taglia && $quantita) {  
 if(!isset($_SESSION["arrayQ"][0]) && (!isset($_SESSION["arrayT"][0]))){
        $query="SELECT id as idtaglia FROM taglia where tipologia='$taglia'";
            $dati=mysqli_query($connect, $query);
            $valori=mysqli_fetch_array($dati);
            $idtaglia=$valori["idtaglia"];
            
            $query="insert into taglia_prodotto VALUES ('$idtaglia','$idprodotto','$quantita')";
            $dati=mysqli_query($connect, $query);} 
    
else{
    $tavgliaV=$_SESSION["arrayT"][0];
            $query="select * from taglia where tipologia='$taglia'";
            $dati=mysqli_query($connect, $query);
            $valori=mysqli_fetch_array($dati);
            $codtaglia=$valori["id"];  
            
            
            $query="select * from taglia where tipologia='$tavgliaV'";
            $dati=mysqli_query($connect, $query);
            $valori=mysqli_fetch_array($dati);
            $codtagliaV=$valori["id"];     
    
            $queryy="UPDATE taglia_prodotto SET id_taglia='$codtaglia', quantita='$quantita' where (id_prodotto=$idprodotto and id_taglia=$codtagliaV)";
            $datii=mysqli_query($connect, $queryy);
            } } 
    
    
    
    
    if($taglia1 && $quantita1) {  
 if(!isset($_SESSION["arrayQ"][1]) && (!isset($_SESSION["arrayT"][1]))){
        $query="SELECT id as idtaglia FROM taglia where tipologia='$taglia1'";
            $dati=mysqli_query($connect, $query);
            $valori=mysqli_fetch_array($dati);
            $idtaglia=$valori["idtaglia"];
            $query="insert into taglia_prodotto VALUES ('$idtaglia','$idprodotto','$quantita1')";
            $dati=mysqli_query($connect, $query);
            } 
else{
    $tavgliaV=$_SESSION["arrayT"][1];
         
            $query="select * from taglia where tipologia='$taglia1'";
            $dati=mysqli_query($connect, $query);
            $valori=mysqli_fetch_array($dati);
            $codtaglia=$valori["id"];  
            
            
            $query="select * from taglia where tipologia='$tavgliaV'";
            $dati=mysqli_query($connect, $query);
            $valori=mysqli_fetch_array($dati);
            $codtagliaV=$valori["id"];     
    
            $queryy="UPDATE taglia_prodotto SET id_taglia='$codtaglia', quantita='$quantita1' where (id_prodotto=$idprodotto and id_taglia=$codtagliaV)";
            $datii=mysqli_query($connect, $queryy);
           } }  
      
      
      
    if($taglia2 && $quantita2) {  
 if(!isset($_SESSION["arrayQ"][2]) && (!isset($_SESSION["arrayT"][2]))){
        $query="SELECT id as idtaglia FROM taglia where tipologia='$taglia2'";
            $dati=mysqli_query($connect, $query);
            $valori=mysqli_fetch_array($dati);
            $idtaglia=$valori["idtaglia"];
            $query="insert into taglia_prodotto VALUES ('$idtaglia','$idprodotto','$quantita2')";
            $dati=mysqli_query($connect, $query);} 
            
else{
    $tavgliaV=$_SESSION["arrayT"][2];
         
            $query="select * from taglia where tipologia='$taglia2'";
            $dati=mysqli_query($connect, $query);
            $valori=mysqli_fetch_array($dati);
            $codtaglia=$valori["id"];  
            
            
            $query="select * from taglia where tipologia='$tavgliaV'";
            $dati=mysqli_query($connect, $query);
            $valori=mysqli_fetch_array($dati);
            $codtagliaV=$valori["id"];     
    
            $queryy="UPDATE taglia_prodotto SET id_taglia='$codtaglia', quantita='$quantita2' where (id_prodotto=$idprodotto and id_taglia=$codtagliaV)";
            $datii=mysqli_query($connect, $queryy);
        } }  
      
      
    if($taglia3 && $quantita3) {  
 if(!isset($_SESSION["arrayQ"][3]) && (!isset($_SESSION["arrayT"][3]))){
        $query="SELECT id as idtaglia FROM taglia where tipologia='$taglia3'";
            $dati=mysqli_query($connect, $query);
            $valori=mysqli_fetch_array($dati);
            $idtaglia=$valori["idtaglia"];
            $query="insert into taglia_prodotto VALUES ('$idtaglia','$idprodotto','$quantita3')";
            $dati=mysqli_query($connect, $query);
            } 
else{
    $tavgliaV=$_SESSION["arrayT"][3];
         
            $query="select * from taglia where tipologia='$taglia3'";
            $dati=mysqli_query($connect, $query);
            $valori=mysqli_fetch_array($dati);
            $codtaglia=$valori["id"];  
            
            
            $query="select * from taglia where tipologia='$tavgliaV'";
            $dati=mysqli_query($connect, $query);
            $valori=mysqli_fetch_array($dati);
            $codtagliaV=$valori["id"];     
    
            $queryy="UPDATE taglia_prodotto SET id_taglia='$codtaglia', quantita='$quantita3' where (id_prodotto=$idprodotto and id_taglia=$codtagliaV)";
            $datii=mysqli_query($connect, $queryy);
            } }         
      
    
    
  if($taglia4 && $quantita4) {  
 if(!isset($_SESSION["arrayQ"][4]) && (!isset($_SESSION["arrayT"][4]))){
        $query="SELECT id as idtaglia FROM taglia where tipologia='$taglia4'";
            $dati=mysqli_query($connect, $query);
            $valori=mysqli_fetch_array($dati);
            $idtaglia=$valori["idtaglia"];
            $query="insert into taglia_prodotto VALUES ('$idtaglia','$idprodotto','$quantita4')";
            $dati=mysqli_query($connect, $query);
            } 
else{
    $tavgliaV=$_SESSION["arrayT"][4];
         
            $query="select * from taglia where tipologia='$taglia4'";
            $dati=mysqli_query($connect, $query);
            $valori=mysqli_fetch_array($dati);
            $codtaglia=$valori["id"];  
            
            
            $query="select * from taglia where tipologia='$tavgliaV'";
            $dati=mysqli_query($connect, $query);
            $valori=mysqli_fetch_array($dati);
            $codtagliaV=$valori["id"];     
    
            $queryy="UPDATE taglia_prodotto SET id_taglia='$codtaglia', quantita='$quantita4' where (id_prodotto=$idprodotto and id_taglia=$codtagliaV)";
            $datii=mysqli_query($connect, $queryy);
            } }  
    
    

    
    
if($sconto) {  
$query="select * from sconto where codice_sconto='$sconto'";
$dati=mysqli_query($connect, $query);
$valori=mysqli_fetch_array($dati);
    $codsconto=$valori["id"]; } 
else
    $sconto=0;
    
if($colore)   {  
$query="select * from colore where nome='$colore'";
$dati=mysqli_query($connect, $query);
$valori=mysqli_fetch_array($dati);
    $codcolore=$valori["id"]; } 
     
  if($brand)  {    
$query="select * from brand where nome='$brand'";
$dati=mysqli_query($connect, $query);
$valori=mysqli_fetch_array($dati);
    $codbrand=$valori["id"];} 
    
  if($categoria) {    
$query="select * from categoria where tipologia='$categoria'";
$dati=mysqli_query($connect, $query);
$valori=mysqli_fetch_array($dati);
    $codcategoria=$valori["id"];} 

    
$query="UPDATE prodotto SET codice_articolo='$codiceA', nome='$nome', descrizione1='$descriP', descrizione2='$descriS', costo='$costo', materiale='$materiale', vestibilita='$vestibilita', tipologia='$tipologia', id_colore='$codcolore', id_brand='$codbrand', id_categoria='$codcategoria', id_sconto='$codsconto' where id=$idprodotto limit 1";
$query=mysqli_query($connect, $query);
    
             echo("error: " . mysqli_error($connect));   
    


    header("location: view-product.php");
   
}

?>