<?php
require_once 'layout/header.php';
require_once 'layout/menu.php';
?>

<?php
require_once 'classes/Usuario.php';
require_once 'classes/UsuarioDAO.php';
$usuarioDAO = new UsuarioDAO();
$usuarios = $usuarioDAO->listarUsuarios();
?>

<div class="adminx-content">
    <div class="adminx-main-content">
        <div class="container-fluid">
            <nav aria-label="breadcrumb" role="navigation" style="float: right;">
              <ol class="breadcrumb adminx-page-breadcrumb">
                <li ><a href="form_usuario" class="btn btn-lg btn-success" >Novo Usuário</a></li>
              </ol>
            </nav>
            <div class="pb-3">
                <h1>Usuários</h1>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-grid">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="card-header-title">Lista de Usuários</div>
                        </div>
                        <div class="table-responsive-md">
                            <table class="table table-actions table-striped table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            <label class="custom-control custom-checkbox m-0 p-0">
                                                <input type="checkbox" class="custom-control-input table-select-all">
                                                <span class="custom-control-indicator"></span>
                                            </label>
                                        </th>
                                        <th scope="col" class="text-center">ID</th>
                                        <!-- <th scope="col" class="text-center">Foto</th> -->
                                        <th scope="col" class="text-center">Matrícula</th>
                                        <th scope="col" class="text-center">Nome</th>
                                        <th scope="col" class="text-center">Email</th>
                                        <th scope="col" class="text-center">Usuário</th>
                                        <th scope="col" class="text-center">Ações</th>
                                    </tr>
                                </thead>

                                <?php foreach ($usuarios as $usuario) { ?>
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                <label class="custom-control custom-checkbox m-0 p-0">
                                                    <input type="checkbox" class="custom-control-input table-select-row">
                                                    <span class="custom-control-indicator"></span>
                                                </label>
                                            </th>
                                            <td class="text-center"><?= $usuario->id ?></td>
                                            <!-- <td class="text-center"><div class="p-2"><img src="demo/image/usuario/" class="rounded-circle" width="50"></img></div></td> -->
                                            <td class="text-center"><?= $usuario->matricula ?></td>
                                            <td class="text-center"><?= $usuario->nome ?> <?= $usuario->ultimoNome ?></td>
                                            <td class="text-center"><?= $usuario->email ?></td>
                                            <td class="text-center"><?= $usuario->nomeUsuario ?></td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="form_usuario?id=<?= $usuario->id ?>">Editar</a>
                                                <a class="btn btn-sm btn-danger" href="controles/controleUsuario.php?acao=deletar&id=<?= $usuario->id ?>">Deletar</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php } ?>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php
require_once 'layout/footer.php';
?>