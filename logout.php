<?php 
session_start();
session_destroy();
$msg = "Sessão finalizada";
header("Location: inicio.php?msg=$msg");
?>