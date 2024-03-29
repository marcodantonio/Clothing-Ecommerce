<?php

function aggiungi_carrello($id){

    array_push($_SESSION["carrello"],$id);

}



//for($i=0; $i<$max; $i++) {                                        al richiamo della funzione ci va questo

//   while (list ($key, $val) = each ($_SESSION['cart'][$i])) {
//       echo "$key -> $val ,";

//    }
// }
//}

//function elimina_carrello($id){

  //  $_SESSION[carrello]=array_diff(carrello[cart],$id);

//}




?>