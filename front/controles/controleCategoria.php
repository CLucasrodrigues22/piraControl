<?php

require_once '../includes/valida.php';
require_once '../classes/Categoria.php';
require_once '../classes/CategoriaDAO.php';

$categoria = new Categoria();
$categoriaDAO = new CategoriaDAO();

$acao = $_GET['acao'];
$id = '';
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id_categoria = $_GET['id'];
}

if ($acao == 'cadastrar') {
    
    $categoria->__set('nomeCategoria', $_POST['nomeCategoria']);
    
    $id_categoria = $categoriaDAO->cadastraCategoria($categoria);

    $msg = "Categoria cadastrada com sucesso";
    header("Location: ../categoria.php?msg=$msg");
}