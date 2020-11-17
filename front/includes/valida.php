<?php 
session_start();
if(empty($_SESSION['usuario'])){
	$msg = "Sessão finalizada.";
	header("Location: ../inicio.php?msg=$msg");
	exit;
}