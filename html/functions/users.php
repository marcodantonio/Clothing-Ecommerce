<?php
include("user_session.php");


    function login($connect,$email,$password){



            $query="SELECT u.id, u.nome, cognome, email, password, foto, telefono, fax, g.nome as ruolo FROM `utente` u join gruppo g on (u.`id_gruppo`=g.id) where email='$email' AND password='$password'";
            
            $dati=mysqli_query($connect, $query);
            $valori=mysqli_fetch_array($dati);

            if($valori){
            
                $emailDB=$valori["email"];
                $passswordDB=$valori["password"];
                $nome=$valori["nome"];
                $cognome=$valori["cognome"];
                $id=$valori["id"];
                $ruolo=$valori['ruolo'];
            
                $_SESSION["ruolo"]=$ruolo;
                $_SESSION["email"]=$email;
                $_SESSION["password"]=$password;
                $_SESSION["nome"]=$nome;
                $_SESSION["cognome"]=$cognome;
                $_SESSION["id"]=$id;
                controllo_utente();
                if($_SESSION['carrello']!=null){
                    $_SESSION["NEGRO"]=1;
                    $max=sizeof($_SESSION['carrello']);
                        for($i=0; $i<$max; $i+=4) {
                            
                            $idP = $_SESSION['carrello'][$i];
                            $taglia = $_SESSION['carrello'][$i+1];
                            $quantita = $_SESSION['carrello'][$i+2];
                            $query="insert into carrello_prodotto values ('$id','$idP', '$taglia', '$quantita')";
                                $dati=mysqli_query($connect, $query);}}
                            if(mysqli_error($connect)){
                                $query="UPDATE carrello_prodotto set quantita='$quantita' where (id_carrello=$id and id_prodotto=$idP and taglia='$taglia')";
                                    $dati=mysqli_query($connect, $query); } 
                                    
                return $valori;
            }
                    
            
            return 0; 
         
    }


    function wishlist_accesso($connect,$id){
        $query="SELECT p.id as prodotto, l.id as wishlist, taglia, quantita, p.nome as nome_prodotto, p.costo, co.nome as colore, s.percentuale_sconto FROM prodotto p join colore co on (p.id_colore = co.id) join prodotto_lista_desideri pl on (p.id = pl.id_prodotto) join lista_desideri l on (pl.id_lista_desideri = l.id) join taglia_prodotto tp on(p.id=tp.id_prodotto) join taglia t on(t.id=tp.id_taglia) join utente u on (l.id=u.id_lista_desideri) left join sconto s on (s.id=p.id_sconto) where  (u.id=$id and pl.taglia=t.tipologia)";
        $dati=mysqli_query($connect, $query)
        or die ("Non riesco ad eseguire la query $dati");

        return $dati;
    }

    function carrello_accesso($connect,$id){
        $query="SELECT p.id as prodotto, p.codice_articolo as codice, c.id as carrello, taglia, cp.quantita, tp.quantita as quantitatotale, s.percentuale_sconto, t.id as idtaglia, p.nome as nome_prodotto, p.costo, co.nome as colore, cat.tipologia as categoria, b.nome as brand FROM prodotto p join colore co on (p.id_colore = co.id) join carrello_prodotto cp on
        (p.id = cp.id_prodotto) join carrello c on (cp.id_carrello = c.id) join taglia_prodotto tp on(p.id=tp.id_prodotto) join taglia t on(t.id=tp.id_taglia) join utente u on (c.id=u.id_carrello) join categoria cat on(p.id_categoria=cat.id) join brand b on (p.id_brand=b.id)  left join sconto s on (s.id=p.id_sconto) where (u.id=$id and cp.taglia=t.tipologia)";
        $dati=mysqli_query($connect, $query);

        return $dati;
    }


    function sing_in($connect, $nome, $cognome, $email,$password){
        

            
            $query="insert into utente (nome, cognome, email, password, id_gruppo) VALUES ('$nome','$cognome', '$email','$password', '1');";
            $dati=mysqli_query($connect, $query);
            
            $query="SELECT MAX(id) as massimo FROM utente";
            $dati=mysqli_query($connect, $query);
            $valori=mysqli_fetch_array($dati);
            $idutente=$valori["massimo"];
        
            $query="insert into carrello VALUES ('$idutente');";
            $dati=mysqli_query($connect, $query);
           
            $query="insert into lista_desideri VALUES ('$idutente');";
            $dati=mysqli_query($connect, $query);
            
            $query="UPDATE utente set id_carrello=$idutente, id_lista_desideri=$idutente where id=$idutente;";
            $dati=mysqli_query($connect, $query);
        
                controllo_utente();
                if($_SESSION['carrello']!=null){
                    $max=sizeof($_SESSION['carrello']);
                        for($i=0; $i<$max; $i+=4) {
                            
                            $idP = $_SESSION['carrello'][$i];
                            $taglia = $_SESSION['carrello'][$i+1];
                            $quantita = $_SESSION['carrello'][$i+2];
                            $query="insert into carrello_prodotto values ('$idutente','$idP', '$taglia', '$quantita')";
                                $dati=mysqli_query($connect, $query);}}
                            
    }


    //function controllo_variabili(){

   //     if(empty($_SESSION["carrello"])){

    //        $_SESSION["carrello"]=array();

    //    }
    //}

    //function init(){

     //   if(empty($_SESSION["carello"])){
     //   $_SESSION["carello"]=array();}}

    function controllo_utente(){

        session_start();


        if(!isset($_SESSION['carrello'])){
            //echo"<script>alert('carrello creato')</script>";
            $_SESSION['carrello']=array();
        }


       // if(isset($_SESSION['ruolo'])){

           // if(($_SERVER['REQUEST_URI']=="/Tecnologie/html/customer-login.php") && ($_SESSION['ruolo']=="Amministratore" || $_SESSION['ruolo']=="Proprietario")){

          //      header("location: /Tecnologie/html/backend/index.php");
          //  }

          //  elseif(($_SERVER['REQUEST_URI']=="/Tecnologie/html/customer-login.php") && ($_SESSION['ruolo']!="Amministratore" || $_SESSION['ruolo']!="Proprietario") ){

         //       header("location: /Tecnologie/html/customer-account.php");
         //   }

           // elseif((($_SERVER['REQUEST_URI']!="/Tecnologie/html/backend/index.php" || $_SERVER['REQUEST_URI']=="/Tecnologie/html/backend/index.php"  ||
           //      $_SERVER['REQUEST_URI']=="/Tecnologie/html/backend/insert-product.php" ||
           //      $_SERVER['REQUEST_URI']=="/Tecnologie/html/backend/view-product.php" || $_SERVER['REQUEST_URI']=="/Tecnologie/html/backend/info-product.php" ||
           //      $_SERVER['REQUEST_URI']=="/Tecnologie/html/backend/view-users.php") &&
           //      ($_SESSION['ruolo']!="Amministratore" || $_SESSION['ruolo']!="Proprietario"))){



            //    header("location: /Tecnologie/html/customer-account.php");
           // }

        //}

    if(isset($_SESSION['ruolo'])){

        if($_SERVER['REQUEST_URI']=="/Tecnologie/html/cart.php"){
            // METTERE LA QUERY DEL CARRELLO DEL CLIENTE
            return ;//QUERY;
        }

        if($_SERVER['REQUEST_URI']=="/Tecnologie/html/customer-login.php"){

            header("location: /Tecnologie/html/customer-account.php");

        }

    }


    }

    //function carrello_nolog(){

    //        controllo_variabili();
    //        return mostra_carrello();

   // }



    function select_indirizzo($connect){
        $query="SELECT id_utente, via, cap, stato, citta, telefono, i.email from utente u join utente_indirizzo ui on (u.id=ui.id_utente) join indirizzo i on (i.id=ui.id_indirizzo)";
        $dati=mysqli_query($connect, $query)
        or die ("Non riesco ad eseguire la query $dati");

        return $dati;
    }

    function select_indirizzo_utente($connect, $id){
        $query="SELECT id_utente, i.id, fullname, via, cap, stato, citta, telefono, i.email from utente u join utente_indirizzo ui on (u.id=ui.id_utente) join indirizzo i on (i.id=ui.id_indirizzo) WHERE u.id=$id";
        $dati=mysqli_query($connect, $query)
        or die ("Non riesco ad eseguire la query $dati");

        return $dati;
    }

    function select_backup_indirizzo_utente($connect, $id){
        $query="SELECT id_utente, id, fullname, via, cap, stato, citta, email from backup_indirizzo WHERE id_utente=$id";
        $dati=mysqli_query($connect, $query)
        or die ("Non riesco ad eseguire la query $dati");

        return $dati;
    }


    function select_carta_utente($connect, $id){
        $query="SELECT id_utente, c.id, proprietario, numero, data_scadenza, cvv from utente u join utente_cartacredito uc on (u.id=uc.id_utente) join carta_credito c on (c.id=uc.id_carta_credito) WHERE u.id=$id";
        $dati=mysqli_query($connect, $query)
        or die ("Non riesco ad eseguire la query $dati");

        return $dati;
    }

    function select_utente($connect){
        $query="SELECT u.id, nome, cognome, u.email, telefono, via, citta, cap from utente u LEFT join utente_indirizzo ui on (u.id=ui.id_utente) left join indirizzo i on (i.id=ui.id_indirizzo) where id_gruppo=1 GROUP by u.id";

        
        $dati=mysqli_query($connect, $query)
            or die ("Non riesco ad eseguire la query $dati");

        return $dati;
    }

    function select_utente_singolo($connect, $id){
        $query="SELECT u.id, nome, cognome, u.email, telefono, via, citta, cap, fax from utente u LEFT join utente_indirizzo ui on (u.id=ui.id_utente) left join indirizzo i on (i.id=ui.id_indirizzo) where u.id=$id";

        $dati=mysqli_query($connect, $query);
            //echo("error: " . mysqli_error($connect));
        return $dati;
    }





    function select_amministratore($connect){
        $query="SELECT * from utente where id_gruppo>1 order by id_gruppo DESC";
        
        $dati=mysqli_query($connect, $query)
            or die ("Non riesco ad eseguire la query $dati");

        return $dati;
    }

    function select_totale_utenti ($connect){
        $query="SELECT COUNT(*) as totale FROM utente";
        
        $dati=mysqli_query($connect, $query)
            or die ("Non riesco ad eseguire la query $dati");
        $valori=mysqli_fetch_array($dati);
        $count=$valori["totale"];
            return $count;
    }

    function update_password($connect,$id,$vecchiaPSW,$nuovaPSW, $rptnuovaPSW){
        $query="SELECT * from utente where id='$id'";
        $dati=mysqli_query($connect, $query)
            or die ("Non riesco ad eseguire la query $dati");
    
        $valori=mysqli_fetch_array($dati);
        $vecchiaPSWDB=$valori["password"];
        if($vecchiaPSWDB==$vecchiaPSW){
            if($nuovaPSW==$rptnuovaPSW){
                $query="UPDATE utente set password='$nuovaPSW' where id='$id'";
                $dati=mysqli_query($connect, $query)
                    or die ("Non riesco ad eseguire la query $dati");                   
                
                return 1; // tutto ok
            }
            return 2;  // le immesse non coincidono
        }
        return 3; // passwd account errata
    }

    function update_info($connect, $id, $nome,$cognome,$email, $telefono, $fax){

        $query="UPDATE utente set nome='$nome', cognome='$cognome', email='$email', telefono='$telefono', fax='$fax' where id='$id'";
        $dati=mysqli_query($connect, $query)
        or die ("Non riesco ad eseguire la query $dati");

    }

    function logout(){
        
        unset($_SESSION['carrello']);
        unset($_SESSION['id']);
        unset($_SESSION['indirizzo_nome']);
        unset($_SESSION['carta_proprietario']);     
        session_destroy();

        header("location: ../index.php");
        
    }



    