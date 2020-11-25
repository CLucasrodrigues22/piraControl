<?php
include_once 'layout/header.php';
include_once 'layout/menu.php';
?>

<?php

require_once 'classes/Usuario.php';
require_once 'classes/UsuarioDAO.php';
$UsuarioDAO = new UsuarioDAO();
$usuarios = $UsuarioDAO->listarUsuarios();


require_once 'classes/Ativo.php';
require_once 'classes/AtivoDAO.php';
$ativo = new Ativo();
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id_ativo = $_GET['id'];
    $ativoDAO =new AtivoDAO();
    $ativo = $ativoDAO->get('id');
}
if (empty($ativo)) {
    header("location: ativo?msg=Equipamento não encontrado");
}
?>

<div class="adminx-content">
    <div class="adminx-main-content">
        <div class="container-fluid">
            <div class="pb-3">
                <h1>Formulário de Ativos</h1>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-grid">
                        <div class="card-header">
                            <div class="card-header-title">Validação</div>
                        </div>
                        <div class="card-body">
                            <p>
                                Preencha todos os dados abaixo para a criação de um novo Ativo. Todos os dados abaixo são obrigatórios.
                            </p>
                            <form action="controles/controleAtivo?acao=<?= ($ativo->id != '' ? 'editar' : 'cadastrar') ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <input type="hidden" class="form-control" id="validationCustom001" name="id" value="<?= ($ativo->id != '' ? $ativo->id : '') ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="validationCustom01">Nome do Ativo</label>
                                        <input type="text" class="form-control" id="validationCustom01" name="nomeAtivo" value="<?= ($ativo->nomeAtivo != '' ? $ativo->nomeAtivo : '') ?>" placeholder="Nome do Ativo">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label class="form-label" for="validationCustom02">Chamado GLPI</label>
                                        <input type="text" class="form-control" id="validationCustom02" name="chamadoGLPI" value="<?= ($ativo->chamadoGLPI != '' ? $ativo->chamadoGLPI : '') ?>" placeholder="ID Chamado">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label class="form-label" for="validationCustom03">Data de Abertura</label>
                                        <input type="date" class="form-control" id="validationCustom03" value="<?= ($ativo->dataAbertura != '' ? $ativo->dataAbertura : '') ?>" name="dataAbertura">
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label class="form-label" for="validationCustom05">Data do Teste</label>
                                        <input type="date" class="form-control" id="validationCustom05" name="dataTeste" value="<?= ($ativo->dataTeste != '' ? $ativo->dataTeste : '') ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-2 mb-3">
                                        <label class="form-label" for="validationCustom04">Técnico</label>
                                        <select class="form-control form-control-sm" style="width: 90%; height: 57%;" name="tecnico">
                                            <?php foreach ($usuarios as $usuario) { ?>
                                                <option value="<?= $usuario->id ?>" <?= ($usuario->nome != '' && $usuario->nome == $usuario->id ? 'selected' : '') ?>><?= $usuario->nome ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label class="form-label">Resultado</label>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio1" name="resultado" class="custom-control-input" value="testeOk" <?= ($ativo->resultado == 'testeOk' ? 'selected="selected"' : '') ?>>
                                            <label class="custom-control-label" for="customRadio1">Teste OK</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio2" name="resultado" class="custom-control-input" value="testeFall" <?= ($ativo->resultado == 'testeFall' ? 'selected="selected"' : '') ?>>
                                            <label class="custom-control-label" for="customRadio2">Falha no Teste</label>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary mr-2" type="submit" style="float: right;">Salvar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'layout/footer.php';
?>