<?php

require_once '../includes/valida.php';
require_once '../classes/Produto.php';
require_once '../classes/ProdutoDAO.php';

$produto = new Produto();
$produtoDAO = new ProdutoDAO();

$acao = $_GET['acao'];
$id = '';
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id_produto = $_GET['id'];
}

if ($acao == 'cadastrar') {

    $produto->__set('nomeProduto', $_POST['nomeProduto']);
    $produto->__set('valor', $_POST['valor']);
    $produto->__set('quantidade', $_POST['quantidade']);
    $produto->__set('nomeCategoria', $_POST['nomeCategoria']);

    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
    // exit;

    $id_produto = $produtoDAO->cadastrarProduto($produto);
    $msg = "Produto cadastrado com sucesso";

    header("location: ../produto.php?msg=$msg");
} elseif ($acao == 'editar') {

    $produto->__set('id', $_POST['id']);
    $produto->__set('nomeProduto', $_POST['nomeProduto']);
    $produto->__set('valor', $_POST['valor']);
    $produto->__set('quantidade', $_POST['quantidade']);
    $produto->__set('nomeCategoria', $_POST['nomeCategoria']);

    $produtoDAO->alterarProduto($produto);

    $msg = "Produto editado com sucesso";

    header("Location: ../produto.php?msg=$msg");
} elseif ($acao == 'deletar') {
    
    $produtoDAO->deletar($id_produto);
    $msg = "Produto deletado com sucesso";
    header("Location: ../produto.php?msg=$msg");
} elseif ($acao == 'adicionar') {

    $produtoDAO->adicionarProduto($id_produto);
    $msg = "Adicionado com sucesso";
    header("Location: ../produto.php?msg=$msg");
    
}
