<?php
session_start();
require 'front/classes/Usuario.php';
require 'front/classes/UsuarioDAO.php';
$usuarioDAO = new UsuarioDAO();

$nome = $_POST['usuario'];
$senha = md5($_POST['senha']);

$usuario = $usuarioDAO->getLogin($nome, $senha);

if(empty($nome)) {
	session_destroy();
	$msg = 'Usuário não encontrado';
	header("Location: inicio?msg=$msg");
} else {
	$_SESSION['usuario'] = $nome;
	$msg = 'Usuário logado com sucesso!';
	header("Location: front/inicio?msg=$msg");
}
?>
