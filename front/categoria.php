<?php
require_once 'layout/header.php';
require_once 'layout/menu.php';
?>

<?php
include_once 'classes/Categoria.php';
include_once 'classes/CategoriaDAO.php';
$categoriaDAO = new CategoriaDAO();
$categorias = $categoriaDAO->listaCategoria();
?>


<div class="adminx-content">
    <div class="adminx-main-content">
        <div class="container-fluid">
            <nav aria-label="breadcrumb" role="navigation" style="float: right;">
              <ol class="breadcrumb adminx-page-breadcrumb">
                <li ><a href="form_categoria" class="btn btn-lg btn-success" >Nova Categoria</a></li>
              </ol>
            </nav>
            <div class="pb-3">
                <h1>Categorias</h1>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-grid">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="card-header-title">Lista de Categorias</div>
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
                                        <th scope="col">ID</th>
                                        <th scope="col">Categoria</th>
                                        <th scope="col" class="text-center">Ações</th>
                                    </tr>
                                </thead>

                                <?php foreach ($categorias as $categoria) { ?>
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                <label class="custom-control custom-checkbox m-0 p-0">
                                                    <input type="checkbox" class="custom-control-input table-select-row">
                                                    <span class="custom-control-indicator"></span>
                                                </label>
                                            </th>
                                            <td><?= $categoria->id ?></td>
                                            <td><?= $categoria->nomeCategoria ?></td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="form_categoria.php?acao=editar&id=<?= $categoria->id ?>">Editar</a>
                                                <a class="btn btn-sm btn-danger" href="controles/controleCategoria.php?acao=deletar&id=<?= $categoria->id ?>">Deletar</a>
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