<?php

session_start();
require_once 'front/classes/Conn.php';

if (empty($_POST['nomeUsuario']) || empty($_POST['senha'])) {
    $msg = "Usuário ou senha inválida";
    header("Location: inicio?msg=$msg");
    exit();
}

$nomeUsuario = mysqli_real_escape_string($conexao, $_POST['nomeUsuario']);
$senha = mysqli_real_escape_string($conexao, md5($_POST['senha']));

$query = "SELECT * FROM usuario WHERE nomeUsuario = '{$nomeUsuario}' AND senha = '{$senha}'";

$result = mysqli_query($conexao, $query);

// echo '<pre>';
// print_r($query);
// echo '</pre>';

$row = mysqli_num_rows($result);

// echo '<pre>';
// print_r($row);
// echo '</pre>';

if ($row == 1) {
    $_SESSION['nomeUsuario'] = $nomeUsuario;
    // echo '<pre>';
    // print_r($_SESSION);
    // echo '</pre>';
    $msg = "Usuário logado com sucesso";
    header("Location: front/inicio?msg=$msg");
    exit();
} else {
    $msg = "Usuário ou senha inválida";
    header("location: inicio?msg=$msg");
    exit;
}
