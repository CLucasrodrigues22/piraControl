<?php
include_once 'layout/header.php';
include_once 'layout/menu.php';
?>

<?php
require_once 'classes/Usuario.php';
require_once 'classes/UsuarioDAO.php';

$usuario = new Usuario();

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id_usuario = $_GET['id'];
    $usuarioDAO = new UsuarioDAO();
    $usuario = $usuarioDAO->get('id');
}
if(empty($usuario)) {
    header("Location: usuario.php?msg=Usuário não encontrado.");
}
?>

<div class="adminx-content">
    <div class="adminx-main-content">
        <div class="container-fluid">
            <div class="pb-3">
                <h1>Cadastro de Usuário</h1>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-grid">
                        <div class="card-header">
                            <div class="card-header-title">Validation</div>
                        </div>
                        <div class="card-body">
                            <p>
                                Preencha todos os dados abaixo para a criação de um novo usuário. Todos os dados abaixo são obrigatórios (exceto Foto para Perfil).
                            </p>
                            <form action="controles/controleUsuario?acao=<?= ( $usuario->id != '' ? 'editar' : 'cadastrar' )?>" method="POST" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <input type="hidden" class="form-control" id="validationCustom001" name="id" value="<?=($usuario->id != '' ? $usuario->id : '')?>" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="validationCustom01">Nome</label>
                                        <input type="text" class="form-control" id="validationCustom01" name="nome" value="<?=($usuario->nome != '' ? $usuario->nome : '')?>" placeholder="Nome">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="validationCustom02">Último Nome</label>
                                        <input type="text" class="form-control" id="validationCustom02" name="ultimoNome" value="<?=($usuario->ultimoNome != '' ? $usuario->ultimoNome : '')?>" placeholder="Último nome">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="validationCustom03">Usuário</label>
                                        <input type="text" class="form-control" id="validationCustom03" value="<?=($usuario->nomeUsuario != '' ? $usuario->nomeUsuario : '')?>" placeholder="Usuário" name="nomeUsuario">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="validationCustom04">Email</label>
                                        <input type="email" class="form-control" id="validationCustom04" name="email" value="<?=($usuario->email != '' ? $usuario->email : '')?>" placeholder="Email">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="validationCustom05">Matrícula</label>
                                        <input type="text" class="form-control" id="validationCustom05" name="matricula" value="<?=($usuario->matricula != '' ? $usuario->matricula : '')?>" placeholder="Matrícula">
                                        <div class="invalid-feedback">
                                            Matrícula não encontrada, digite novamente.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="validationCustom06">Senha</label>
                                        <input type="password" class="form-control" id="validationCustom06" <?= ($usuario->id == '' ? '' : '' ) ?> placeholder="Senha" name="senha">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="validationCustom07">Foto para Perfil</label>
                                        <input type="file" class="form-control" id="validationCustom07" name="imagem">
                                    </div>
                                </div>
                                <button class="btn btn-primary mr-2" type="submit">Salvar</button>
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