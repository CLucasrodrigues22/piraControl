<?php
    session_start();
    if(!$_SESSION['nomeUsuario']) {
        $msg = "Sessão finalizada";
        header("Location: ../inicio?msg=$msg");
        exit();
    } 

    // if ( session_start() !== PHP_SESSION_ACTIVE ) {
    //     session_start();
    // }
