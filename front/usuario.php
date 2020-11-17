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
                                        <th scope="col" class="text-center">Matrícula</th>
                                        <th scope="col" class="text-center">Nome</th>
                                        <th scope="col" class="text-center">Email</th>
                                        <th scope="col" class="text-center">Usuário</th>
                                        <th scope="col" class="text-center">Perfil</th>
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
                                            <td class="text-center"><?= $usuario->id_usuario ?></td>
                                            <td class="text-center"><?= $usuario->matricula ?></td>
                                            <td class="text-center"><?= $usuario->nome ?> <?= $usuario->ultimoNome ?></td>
                                            <td class="text-center"><?= $usuario->email ?></td>
                                            <td class="text-center"><?= $usuario->usuario ?></td>
                                            <td class="text-center">
                                                <span class="badge badge-pill badge-primary">Administrador</span>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary">Editar</button>
                                                <button class="btn btn-sm btn-danger">Deletar</button>
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