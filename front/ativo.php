<?php
include_once 'layout/header.php';
include_once 'layout/menu.php';
?>

<?php
    require_once 'classes/AtivoDAO.php';
    require_once 'classes/Ativo.php';

    $ativoDAO = new AtivoDAO();
    $ativos = $ativoDAO->listarAtivos();
?>

<div class="adminx-content">
    <div class="adminx-main-content">
        <div class="container-fluid">
            <nav aria-label="breadcrumb" role="navigation" style="float: right;">
                <ol class="breadcrumb adminx-page-breadcrumb">
                    <li><a href="form_ativo" class="btn btn-lg btn-success">Novo Ativo</a></li>
                </ol>
            </nav>
            <div class="pb-3">
                <h1>Lista de Ativos</h1>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-grid">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="card-header-title">Ativos Testados</div>
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
                                        <th scope="col" class="text-center">Produto de Saída</th>
                                        <th scope="col" class="text-center">Categoria</th>
                                        <th scope="col" class="text-center">Chamado GLPI</th>
                                        <th scope="col" class="text-center">Abertura</th>
                                        <th scope="col" class="text-center">Teste</th>
                                        <th scope="col" class="text-center">Resultado</th>
                                        <th scope="col" class="text-center">Ténico</th>
                                        <th scope="col" class="text-center">Ações</th>
                                    </tr>
                                </thead>

                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                <label class="custom-control custom-checkbox m-0 p-0">
                                                    <input type="checkbox" class="custom-control-input table-select-row">
                                                    <span class="custom-control-indicator"></span>
                                                </label>
                                            </th>
                                            <td class="text-center">ID</td>
                                            <td class="text-center">Produto de Saída</td>
                                            <td class="text-center">Categoria</td>
                                            <td class="text-center">Chamado GLPI</td>
                                            <td class="text-center">Abertura</td>
                                            <td class="text-center">Teste</td>
                                            <td class="text-center">Resultado</td>
                                            <td class="text-center">Técnico</td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="form_produto.php?id=<?= $produto->id ?>">Editar</a>
                                                <a class="btn btn-sm btn-danger" href="controles/controleProduto.php?acao=deletar&id=<?= $produto->id ?>">Deletar</a>
                                            </td>
                                        </tr>
                                    </tbody>

                            </table>
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