<?php

function connection(){
        $connect=mysqli_connect("localhost", "amministratore", "webpass", "ansima");
        return $connect;
    }

?>