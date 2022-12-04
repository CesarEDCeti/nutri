<?php
    //Este script de php va a destruir la session activa y se manda llamar al index principal.
    include 'connection.php';
    CloseSession();

    //Se va al index principal
    echo "<script>window.location='../index.html';</script>"

?>