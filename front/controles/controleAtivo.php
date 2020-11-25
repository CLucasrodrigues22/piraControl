<?php

require_once '../includes/valida.php';
require_once '../classes/Ativo.php';
require_once '../classes/AtivoDAO.php';

$ativo = new Ativo();
$ativoDAO = new AtivoDAO();

$acao = $_GET['acao'];
$id = '';
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id_ativo = $_GET['id'];
}

if ($acao == 'cadastrar') {
    
    $ativo->__set('nomeAtivo', $_POST['nomeAtivo']);
    $ativo->__set('chamadoGLPI', $_POST['chamadoGLPI']);
    $ativo->__set('dataAbertura', $_POST['dataAbertura']);
    $ativo->__set('dataTeste', $_POST['dataTeste']);
    $ativo->__set('tecnico', $_POST['tecnico']);
    $ativo->__set('resultado', $_POST['resultado']);
    
    $id_ativo = $ativoDAO->cadastrarAtivo($ativo);
    header("location: ../ativo?msg=ativo testado");
} elseif ($acao == 'editar') {
    
    $ativo->__set('id', $_POST['id']);
    $ativo->__set('nomeAtivo', $_POST['nomeAtivo']);
    $ativo->__set('chamadoGLPI', $_POST['chamadoGLPI']);
    $ativo->__set('dataAbertura', $_POST['dataTeste']);
    $ativo->__set('tecnico', $_POST['tecnico']);
    $ativo->__set('resultado', $_POST['resultado']);

    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
    // exit;
    $ativoDAO->alterarAtivo($ativo);
    header("location: ../ativo?msg=Edição realizada com sucesso");
}