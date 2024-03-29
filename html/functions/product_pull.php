<?php



function select_singolo_prodotto($connect,$id){
    $query="SELECT p.id, t.id as id_taglia, codice_articolo, p.nome, costo, b.nome as brand, c.nome as colore, cat.tipologia as categoria, t.tipologia as taglia  FROM prodotto p left join brand b on(b.id=p.id_brand) left join colore c on (c.id=p.id_colore) join categoria cat on (cat.id=p.id_categoria) join taglia_prodotto tp on (tp.id_prodotto=p.id) join taglia t on (tp.id_taglia=t.id) WHERE p.id=$id";
    $dati=mysqli_query($connect, $query);
    //or die ("Non riesco ad eseguire la query $dati");
    return $dati;
}

        function select_prodotti($connect){
            $query="SELECT p.id, t.id as id_taglia, codice_articolo, p.nome, costo, b.nome as brand, c.nome as colore, cat.tipologia as categoria, t.tipologia as taglia  FROM prodotto p left join brand b on(b.id=p.id_brand) left join colore c on (c.id=p.id_colore) join categoria cat on (cat.id=p.id_categoria) join taglia_prodotto tp on (tp.id_prodotto=p.id) join taglia t on (tp.id_taglia=t.id)";
            $dati=mysqli_query($connect, $query);
                //or die ("Non riesco ad eseguire la query $dati");
            return $dati;
        }

        function select_colore($connect){
            $query="SELECT * FROM colore order by id";

            $dati=mysqli_query($connect, $query)
                or die ("Non riesco ad eseguire la query $dati");
            return $dati;

    }
        function select_sconto($connect){
            $query="SELECT * FROM sconto order by id";

            $dati=mysqli_query($connect, $query)
                or die ("Non riesco ad eseguire la query $dati");
            return $dati;

    }

        function select_taglia($connect){
            $query="SELECT * FROM taglia order by id";

            $dati=mysqli_query($connect, $query)
                or die ("Non riesco ad eseguire la query $dati");
            return $dati;

    }
   

        function select_brand($connect){
            $query="SELECT * FROM brand order by id";
            $dati=mysqli_query($connect, $query)
                or die ("Non riesco ad eseguire la query $dati");
            return $dati;

    }

        function select_categoria($connect){
            $query="SELECT * FROM categoria order by id";
            $dati=mysqli_query($connect, $query)
                or die ("Non riesco ad eseguire la query $dati");
            return $dati;

    }
        function select_sottocategoria($connect,$categoria){
            $query="SELECT * FROM sottocategoria sc join categoria c on(sc.id_categoria=c.id) where tipologia='$categoria' order by sc.id";
            $dati=mysqli_query($connect, $query)
                or die ("Non riesco ad eseguire la query $dati");
            return $dati;

    }

        function select_totale_ordini($connect){
        $query="SELECT COUNT(*) as totale FROM ordine";

        $dati=mysqli_query($connect, $query)
            or die ("Non riesco ad eseguire la query $dati");
        $valori=mysqli_fetch_array($dati);
        $count=$valori["totale"];
            return $count;
    }












        function select_totale_ordini_utente($connect, $id){
        $query="SELECT COUNT(*) as totale FROM ordine o join indirizzo i on (o.id_indirizzo=i.id) join utente_indirizzo ui on (i.id=ui.id_indirizzo) join utente u on (u.id=ui.id_utente) where u.id=$id";

        $dati=mysqli_query($connect, $query)
            or die ("Non riesco ad eseguire la query $dati");
        $valori=mysqli_fetch_array($dati);
        $count=$valori["totale"];
            return $count;
    }

        function select_totale_carrello_utente($connect, $id){
        $query="SELECT COUNT(*) as totale FROM carrello c join carrello_prodotto cp on(c.id=cp.id_carrello) where c.id=$id";

        $dati=mysqli_query($connect, $query)
            or die ("Non riesco ad eseguire la query $dati");
        $valori=mysqli_fetch_array($dati);
        $count=$valori["totale"];
            return $count;
    }


        function select_totale_wishlist_utente($connect, $id){
        $query="SELECT COUNT(*) as totale FROM lista_desideri l join prodotto_lista_desideri ld on(l.id=ld.id_lista_desideri) where l.id=$id";

        $dati=mysqli_query($connect, $query)
            or die ("Non riesco ad eseguire la query $dati");
        $valori=mysqli_fetch_array($dati);
        $count=$valori["totale"];
            return $count;
    }

        function select_ordini($connect){
            $query="SELECT o.id, o.codice, o.stato_pagamento, o.tipo_spedizione, o.stato_ordine, i.citta, i.via, u.nome, u.cognome FROM ordine o join indirizzo i on(o.id_indirizzo=i.id) join utente_indirizzo ui on (ui.id_indirizzo=i.id) join utente u on (u.id=ui.id_utente) ";

            $dati=mysqli_query($connect, $query)
                or die ("Non riesco ad eseguire la query $dati");
            return $dati;
    }


        function select_ordini_utente($connect, $id){
            $query="SELECT o.id, codice, stato_ordine, data FROM ordine o join indirizzo i on (o.id_indirizzo=i.id) join utente_indirizzo ui on (i.id=ui.id_indirizzo) join utente u on (u.id=ui.id_utente) join prodotto_ordine po ON (o.id=po.id_ordine) join dettaglio_prodotto dp on (po.id_prodotto=dp.id) where u.id=$id group by o.codice order by o.data DESC";

            $dati=mysqli_query($connect, $query);
            
            return $dati;
             
    }




        function select_ordine_utente($connect, $id){
            $query="SELECT i.fullname, i.email, data, stato_ordine, telefono, i.via,i.cap, i.stato, i.citta, codice FROM ordine o join indirizzo i on (o.id_indirizzo=i.id) join utente_indirizzo ui on (i.id=ui.id_indirizzo) join utente u on (u.id=ui.id_utente) where o.id=$id";

            $dati=mysqli_query($connect, $query);
            
            return $dati;
             
    }




        function select_ordini_utente_costo($connect, $id){
            $totale=0;
            $query="SELECT costo, quantita, o.tipo_spedizione  FROM ordine o join indirizzo i on (o.id_indirizzo=i.id) join utente_indirizzo ui on (i.id=ui.id_indirizzo) join utente u on (u.id=ui.id_utente) join prodotto_ordine po ON(o.id=po.id_ordine) join dettaglio_prodotto dp on (po.id_prodotto=dp.id) where o.id=$id";

            $dati=mysqli_query($connect, $query);
            while($row = mysqli_fetch_array($dati)){
                $quantita=$row["quantita"];
                $costo=$row["costo"];
                $spedizione=$row["tipo_spedizione"];
                $sub_totale=$costo*$quantita;
                $totale+=$sub_totale; } 
                if($spedizione=="standard")
                    $spedizione=5;
                else
                    $spedizione=10;
            $iva=($totale*22)/100;
            $totale_iva=$totale+$iva;
            $totale_iva+=$spedizione;
            return $totale_iva;

        }   

        function select_prodotti_ordine_utente_costo($connect, $id){
            $query="SELECT dp.id, o.tipo_spedizione, dp.codice_articolo, dp.immagine, dp.nome as nomeprodotto, dp.costo, dp.quantita, dp.taglia, dp.colore FROM ordine o join prodotto_ordine po ON(o.id=po.id_ordine) join dettaglio_prodotto dp on (po.id_prodotto=dp.id) where o.id=$id";
            $dati=mysqli_query($connect, $query);
            
            return $dati;
        }   

 function select_ordine_utente_costo($connect, $idordine){
            $query="SELECT costo, quantita, o.tipo_spedizione  FROM ordine o join indirizzo i on (o.id_indirizzo=i.id) join utente_indirizzo ui on (i.id=ui.id_indirizzo) join utente u on (u.id=ui.id_utente) join prodotto_ordine po ON(o.id=po.id_ordine) join dettaglio_prodotto dp on (po.id_prodotto=dp.id) where o.id=$idordine";

            $dati=mysqli_query($connect, $query);
            return $dati;
        }   



















        function select_totale_brand($connect){
        $query="SELECT COUNT(*) as totale FROM brand";

        $dati=mysqli_query($connect, $query)
            or die ("Non riesco ad eseguire la query $dati");
        $valori=mysqli_fetch_array($dati);
        $count=$valori["totale"];
            return $count;
    }


        function select_totale_prodotti($connect){
        $query="SELECT COUNT(*) as totale FROM prodotto";

        $dati=mysqli_query($connect, $query)
            or die ("Non riesco ad eseguire la query $dati");
        $valori=mysqli_fetch_array($dati);
        $count=$valori["totale"];
            return $count;
    }

    function select_prodotto($connect, $id){
        $query="SELECT p.id, codice_articolo, p.tipologia, sc.codice_sconto,  descrizione1, descrizione2, p.nome, costo, b.nome as brand, tp.quantita, c.nome as colore, cat.tipologia as categoria, i.nome as foto, materiale, vestibilita  FROM prodotto p left join brand b on(b.id=p.id_brand) left join colore c on (c.id=p.id_colore) join categoria cat on (cat.id=p.id_categoria) join immagine i on (i.id_prodotto=p.id) join taglia_prodotto tp on (tp.id_prodotto=p.id) left join sconto sc on (p.id_sconto=sc.id) where p.id=$id";
        $dati=mysqli_query($connect, $query)
                or die ("Non riesco ad eseguire la query $dati");
           $valori=mysqli_fetch_array($dati);
        return $valori;
        }

    function select_prodotto_taglie($connect, $id){
        $query="SELECT * FROM taglia_prodotto tp join taglia t on(tp.id_taglia=t.id) where tp.id_prodotto=$id";
        $dati=mysqli_query($connect, $query)
                or die ("Non riesco ad eseguire la query $dati");
        return $dati;
        }


    function select_prodotto_tagliaI($connect, $id){
        $query="SELECT * FROM taglia_prodotto tp join taglia t on(tp.id_taglia=t.id) where tp.id_prodotto=$id order by t.id limit 1";
        $dati=mysqli_query($connect, $query)
                or die ("Non riesco ad eseguire la query $dati");
                   $valore=mysqli_fetch_array($dati);

        $taglia=$valore["tipologia"];
        return $taglia;
        }


        function select_prodotti_shop_backend($connect){
            $query="SELECT p.id, t.id as id_taglia, codice_articolo, p.nome, costo, b.nome as brand, c.nome as colore, cat.tipologia as categoria, i.nome as foto, t.tipologia as taglia  FROM prodotto p left join brand b on(b.id=p.id_brand) left join colore c on (c.id=p.id_colore) join categoria cat on (cat.id=p.id_categoria) join immagine i on (i.id_prodotto=p.id) left join taglia_prodotto tp on (tp.id_prodotto=p.id) left join taglia t on (tp.id_taglia=t.id) group by p.id order by codice_articolo, t.id"; 
        
            $dati=mysqli_query($connect, $query);
                //or die ("Non riesco ad eseguire la query $dati");
            return $dati;}
        
        
        
        function select_prodotti_index($connect){

         $query="SELECT p.id, t.id as id_taglia, codice_articolo, p.nome, costo, b.nome as brand, c.nome as colore, cat.tipologia as categoria, i.nome as foto, t.tipologia as taglia, sc.percentuale_sconto  FROM prodotto p left join brand b on(b.id=p.id_brand) left join colore c on (c.id=p.id_colore) join categoria cat on (cat.id=p.id_categoria) join immagine i on (i.id_prodotto=p.id) left join taglia_prodotto tp on (tp.id_prodotto=p.id) left join taglia t on (tp.id_taglia=t.id) left join sconto sc on(p .id_sconto=sc.id) group by p.id order by p.id DESC";    
            
            $dati=mysqli_query($connect, $query);
                //or die ("Non riesco ad eseguire la query $dati");
            return $dati;        } 


        function select_prodotti_shop($connect){
            
            $query="SELECT COUNT(*) as totale FROM brand";
            $dati=mysqli_query($connect, $query)
                or die ("Non riesco ad eseguire la query $dati");
            $valori=mysqli_fetch_array($dati);
            $contbrandmax=$valori["totale"];
            $contbrand=0;
            
            $query="SELECT COUNT(*) as totale FROM colore";
            $dati=mysqli_query($connect, $query)
                or die ("Non riesco ad eseguire la query $dati");
            $valori=mysqli_fetch_array($dati);
            $contcoloremax=$valori["totale"];
            $contcolore=0;
            
            $query="SELECT COUNT(*) as totale FROM taglia";
            $dati=mysqli_query($connect, $query)
                or die ("Non riesco ad eseguire la query $dati");
            $valori=mysqli_fetch_array($dati);
            $conttagliamax=$valori["totale"];
            $conttaglia=0;
            
            $query="SELECT COUNT(*) as totale FROM categoria";
            $dati=mysqli_query($connect, $query)
                or die ("Non riesco ad eseguire la query $dati");
            $valori=mysqli_fetch_array($dati);
            $contcategoriamax=$valori["totale"];
            $contcategoria=0;
             
            if(!isset($_COOKIE["costo"])){
                if(!isset($_COOKIE["costominimo"])){
                    $costomin=0;
                    $costomax=999;}
                else{
                $costomin=$_COOKIE["costominimo"];
                $costomax=$_COOKIE["costomassimo"];}
                $query="SELECT p.id, t.id as id_taglia, codice_articolo, p.nome, costo, b.nome as brand, c.nome as colore, cat.tipologia as categoria, i.nome as foto, t.tipologia as taglia, sc.id as idsconto,
                r.valutazione, sc.percentuale_sconto  FROM prodotto p left join brand b on(b.id=p.id_brand) left join colore c on (c.id=p.id_colore) join categoria cat on (cat.id=p.id_categoria) join immagine i on (i.id_prodotto=p.id) left join taglia_prodotto tp on (tp.id_prodotto=p.id) left join taglia t on (tp.id_taglia=t.id) left join sconto sc on(p .id_sconto=sc.id) left  join recensione r on(p.id=r.id_prodotto)  where costo BETWEEN '$costomin' AND '$costomax'";
                }
            
            
             else{  
                $costo=$_COOKIE["costo"];
                $arr = explode(",", $costo);
                $_COOKIE["nuovocostomin"]=$arr[0]; //per il range a category !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                $_COOKIE["nuovocostomax"]=$arr[1];
                $query="SELECT p.id, t.id as id_taglia, codice_articolo, p.nome, costo, b.nome as brand, c.nome as colore, cat.tipologia as categoria, i.nome as foto, t.tipologia as taglia, r.valutazione, sc.percentuale_sconto FROM prodotto p left join brand b on(b.id=p.id_brand) left join colore c on (c.id=p.id_colore) join categoria cat on (cat.id=p.id_categoria) join immagine i on (i.id_prodotto=p.id) left join taglia_prodotto tp on (tp.id_prodotto=p.id) left join taglia t on (tp.id_taglia=t.id) left join sconto sc on(p .id_sconto=sc.id) left join recensione r on(p.id=r.id_prodotto)  where costo BETWEEN  '$arr[0]'  AND '$arr[1]'";}
            
            
            if((isset($_COOKIE["ricerca"]))||($_COOKIE["ricerca"]=!"null")){
                $search=$_COOKIE["ricerca"];
                $query .="AND (p.nome LIKE '%$search%')";}
                
                
                
            $controlloB=1;
            while($contbrand<$contbrandmax){
            if((isset($_COOKIE["clothes-brand$contbrand"])) && ($_COOKIE["clothes-brand$contbrand"])!="null"){
                $arrayB=array();
                $arrayB[$contbrand]=$_COOKIE["clothes-brand$contbrand"];
                if($controlloB){
                    $query .="AND (b.nome='$arrayB[$contbrand]'";
                    $controlloB=0;}
                else
                    $query .="OR b.nome='$arrayB[$contbrand]'";}
                if(($contbrand==$contbrandmax-1) && ($controlloB==0))
                    $query .=")";
                $contbrand++;}
            
            $contFemm=0;
            if(((isset($_COOKIE["Uomo"])) && ($_COOKIE["Uomo"]!="null")) && ((isset($_COOKIE["Donna"])) && ($_COOKIE["Donna"]!="null"))){
                    $query .="AND (p.tipologia='Uomo' or p.tipologia='Donna')";}
            
            if(((!isset($_COOKIE["Uomo"])) || ($_COOKIE["Uomo"]=="null")) && ((isset($_COOKIE["Donna"])) && ($_COOKIE["Donna"]!="null"))){
                    $query .="AND ( p.tipologia='Donna')";}
            
            if(((isset($_COOKIE["Uomo"])) && ($_COOKIE["Uomo"]!="null")) && ((!isset($_COOKIE["Donna"])) || ($_COOKIE["Donna"]=="null"))){
                    $query .="AND ( p.tipologia='Uomo')";}

        

            
        


            
            $controlloC=1;
            while($contcategoria<$contcategoriamax){
            if((isset($_COOKIE["category$contcategoria"])) && ($_COOKIE["category$contcategoria"])!="null"){
                $arrayC=array();
                $arrayC[$contcategoria]=$_COOKIE["category$contcategoria"];
                if($controlloC){
                    $query .="AND (cat.tipologia='$arrayC[$contcategoria]'";
                    $controlloC=0;}
                else
                    $query .="OR cat.tipologia='$arrayC[$contcategoria]'";}
                if(($contcategoria==$contcategoriamax-1) && ($controlloC==0))
                    $query .=")";
                $contcategoria++;}
            
            $controlloT=1;
            while($conttaglia<$conttagliamax){
            if((isset($_COOKIE["size$conttaglia"]))&&($_COOKIE["size$conttaglia"])!="null"){
                $arrayT=array();
                $arrayT[$conttaglia]=$_COOKIE["size$conttaglia"];
                if($controlloT){
                    $query .="AND (t.tipologia ='$arrayT[$conttaglia]'";
                    $controlloT=0;}
                else
                    $query .="OR t.tipologia='$arrayT[$conttaglia]'";}
                if(($conttaglia==$conttagliamax-1) && ($controlloT==0))
                    $query .=")";
                $conttaglia++;}



            $controlloColore=1;
            while($contcolore<$contcoloremax){
            if((isset($_COOKIE["clothes-colors$contcolore"])) && ($_COOKIE["clothes-colors$contcolore"])!="null"){
                $arrayColor=array();
                $arrayColor[$contcolore]=$_COOKIE["clothes-colors$contcolore"];
                if($controlloColore){
                    $query .="AND (c.nome='$arrayColor[$contcolore]'";
                    $controlloColore=0;}
                else
                    $query .="OR c.nome='$arrayColor[$contcolore]'";}
                if(($contcolore==$contcoloremax-1) && ($controlloColore==0))
                    $query .=")";
                $contcolore++;}


            
            
            
            $query .="group by p.id ";
            
            
            
        if(!isset($_COOKIE["sort"])){    
            $query .="order by costo ASC";}

        if(isset($_COOKIE["sort"])){
           if($_COOKIE["sort"]=="Default")
             $query .="order by costo ASC";
                
           if($_COOKIE["sort"]=="Newest")
             $query .="order by p.id DESC";
            
           if($_COOKIE["sort"]=="Rating"){
             $query .="order by r.valutazione DESC";}
  
           if($_COOKIE["sort"]=="Price") //cambiare
             $query .="order by costo DESC";
        }
            if(!isset($_COOKIE["limite"]) || $_COOKIE["limite"]=='LIMIT 9')
                $query .=" LIMIT 9";
            else
                
                $query .=" LIMIT 9,18";
            
            
            
            $dati=mysqli_query($connect, $query);
                //or die ("Non riesco ad eseguire la query $dati");
            return $dati;        } 



        function select_prodotti_detail($connect, $id){
            $query="SELECT codice_articolo, p.nome, costo, b.nome as brand, c.nome as colore, cat.tipologia as categoria, descrizione1, descrizione2, vestibilita, sc.percentuale_sconto, materiale FROM prodotto p left join brand b on(b.id=p.id_brand) left join colore c on (c.id=p.id_colore) join categoria cat on (cat.id=p.id_categoria) left join sconto sc on(p .id_sconto=sc.id) where p.id='$id'";
            $dati=mysqli_query($connect, $query);
                //or die ("Non riesco ad eseguire la query $dati");
            return $dati;
        }




        function select_taglia_detail($connect, $id){
            $query="SELECT * FROM prodotto p join taglia_prodotto tp on (tp.id_prodotto=p.id) join taglia t on (tp.id_taglia=t.id) where p.id='$id' order by t.id";
            $dati=mysqli_query($connect, $query)
                or die ("Non riesco ad eseguire la query $dati");
            return $dati;

    }


        function select_immagini_detail($connect, $id){
            $query="SELECT i.nome FROM prodotto p JOIN immagine i on (i.id_prodotto=p.id) where p.id='$id' order by i.id";
            $dati=mysqli_query($connect, $query);
                //or die ("Non riesco ad eseguire la query $dati");
            return $dati;
        }

        function select_immaginiP_detail($connect, $id){
            $query="SELECT i.nome FROM prodotto p JOIN immagine i on (i.id_prodotto=p.id) where p.id='$id' order by i.id limit 1";
            $dati=mysqli_query($connect, $query);
                //or die ("Non riesco ad eseguire la query $dati");
            return $dati;
        }
        function select_immagine2_shop($connect,$idprodotto){
            $query="SELECT i.nome FROM prodotto p JOIN immagine i on (i.id_prodotto=p.id) where p.id='$idprodotto' order by i.id limit 2";
            $dati=mysqli_query($connect, $query);
            while($row = mysqli_fetch_array($dati)){
                $foto2=$row["nome"];}
            return $foto2;
                
            
        }


    function select_recensione($connect, $id){
        $query="SELECT * FROM recensione r join utente u on (u.id=r.id_utente) where id_prodotto=$id";
        $dati=mysqli_query($connect, $query)
                or die ("Non riesco ad eseguire la query $dati");
        return $dati;
        }




        function select_totale_recensioni($connect,$id){
        $query="SELECT COUNT(*) as totale FROM recensione where id_prodotto=$id";

        $dati=mysqli_query($connect, $query)
            or die ("Non riesco ad eseguire la query $dati");
        $valori=mysqli_fetch_array($dati);
        $count=$valori["totale"];
            return $count;
    }

        function select_media_recensioni($connect,$id){
        $query="SELECT AVG(valutazione) as media FROM recensione where id_prodotto=$id";

        $dati=mysqli_query($connect, $query)
            or die ("Non riesco ad eseguire la query $dati");
        $valori=mysqli_fetch_array($dati);
        $count=$valori["media"];
            return $count;
    }


        function select_prodotti_fresh($connect){
            $query="SELECT id from prodotto ORDER BY id DESC limit 6";
            $dati=mysqli_query($connect, $query);
                //or die ("Non riesco ad eseguire la query $dati");
            return $dati;
        }

        function select_ordine_effettuato($connect, $idordine){
            $query="SELECT * from ordine where id=$idordine";
            $dati=mysqli_query($connect, $query);
                //or die ("Non riesco ad eseguire la query $dati");
            return $dati;
        }
