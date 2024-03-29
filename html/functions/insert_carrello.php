<?php

include('connection.php');
include('users.php');
include('product_pull.php');
$connect=connection();
controllo_utente();

$idP=$_GET['idP'];
$taglia=$_POST['size'];
$quantita=$_POST['items'];

$query="select quantita from prodotto p join taglia_prodotto tp on(tp.id_prodotto=p.id) join taglia t on (t.id=tp.id_taglia) where (p.id=$idP and t.tipologia='$taglia')";
$dati=mysqli_query($connect, $query);
$result=mysqli_fetch_array($dati);
$quantitamax=$result["quantita"];

if(isset($_SESSION['ruolo'])){
    $idC=$_SESSION['id'];




        $query="SELECT quantita FROM carrello_prodotto where (id_carrello=$idC and id_prodotto=$idP and taglia='$taglia')";
        $dati=mysqli_query($connect, $query);
        $valori=mysqli_fetch_array($dati);
        $quantitacarrello=$valori["quantita"];

        $quantitacarrello+=$quantita;
    
    if($quantita<=0)
        header("location: ../detail-1.php?id=$idP&car=4&wish=0&taglia=$taglia");


    elseif(($quantitamax<$quantita)||($quantitamax<$quantitacarrello))
        header("location: ../detail-1.php?id=$idP&car=3&wish=0&taglia=$taglia");
    
    else{

        $query="insert into carrello_prodotto values ('$idC','$idP', '$taglia', '$quantita')";
        $dati=mysqli_query($connect, $query);

    if(mysqli_error($connect)){
    $query="UPDATE carrello_prodotto set quantita='$quantitacarrello' where (id_carrello=$idC and id_prodotto=$idP and taglia='$taglia')";
     $dati=mysqli_query($connect, $query);  
    header("location: ../detail-1.php?id=$idP&car=1&wish=0&taglia=$taglia");} 
        
    else
        header("location: ../detail-1.php?id=$idP&car=1&wish=0&taglia=$taglia");
    }
}

else{
    //if(!empty($_SESSION['carrello'])){$_SESSION['carrello']=array();}
    //controllo_variabili();
    if($quantitamax<$quantita)
        header("location: ../detail-1.php?id=$idP&car=3&wish=0&taglia=$taglia");
    else{
    
        $imm=select_immaginiP_detail($connect,$idP);
        $result=mysqli_fetch_array($imm);
        $imm=$result["nome"];
        
        $idP=(string)$idP;
        echo gettype($idP);
        $cont=count($_SESSION['carrello']);
        //$cont-=4;
        $presente=0;
        var_dump($_SESSION['carrello']);
        echo $cont;
        $i=0;
        $t=1;
        $q=2;
        while($i<$cont){
            if($idP==$_SESSION['carrello'][$i])
                if($taglia==$_SESSION['carrello'][$t]){                
                    $presente=1;
                    $vechieaQuantita=$_SESSION['carrello'][$q];
                    $nuovaquantita=$vechieaQuantita+$quantita;
                    if($nuovaquantita>$quantitamax){
                      header("location: ../detail-1.php?id=$idP&car=3&wish=0&taglia=$taglia");}
                    else{
                        $_SESSION['carrello'][$q]=$nuovaquantita;
                        header("location: ../detail-1.php?id=$idP&car=6&wish=0&taglia=$taglia");
                    }

                    }
            $i=$i+4;
            $t=$t+4;
            $q=$q+4;
            
        
        }
 

        if($presente==0){
            array_push($_SESSION['carrello'],$idP);
            array_push($_SESSION['carrello'],$taglia);
            array_push($_SESSION['carrello'],$quantita);
            array_push($_SESSION['carrello'],$imm);
        //echo"<script>alert('aggiunto');</script>";
        //
            header("location: ../detail-1.php?id=$idP&car=6&wish=0&taglia=$taglia");}

    }    }



  ?>  