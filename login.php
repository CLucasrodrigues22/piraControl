<?php
require_once 'front/classes/Usuario.php';
require_once 'front/classes/UsuarioDAO.php';
$usuarioDAO = new UsuarioDAO();

$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);

$usuario = $usuarioDAO->getLogin($usuario, $senha);

if(empty($usuario)) {
	session_destroy();
	$msg = 'Usuário ou senha inválida!';
	header("Location: inicio?msg=$msg");
} else {
	$msg = 'Usuário logado com sucesso!';
	header("Location: front/inicio?msg=$msg");
}