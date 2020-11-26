<?php
require_once 'layout/header.php';
require_once 'layout/menu.php';
?>

<?php
require_once 'classes/Categoria.php';
require_once 'classes/CategoriaDAO.php';
require_once 'classes/Produto.php';
require_once 'classes/ProdutoDAO.php';
$categoriaDAO = new CategoriaDAO();
$produtoDAO = new ProdutoDAO();
$produtos = $produtoDAO->listarProduto();
?>

<div class="adminx-content">
    <div class="adminx-main-content">
        <div class="container-fluid">
            <nav aria-label="breadcrumb" role="navigation" style="float: right;">
              <ol class="breadcrumb adminx-page-breadcrumb">
                <li ><a href="form_produto" class="btn btn-lg btn-success" >Novo Produto</a></li>
              </ol>
            </nav>
            <div class="pb-3">
                <h1>Estoque</h1>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-grid">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="card-header-title">Produtos em Estoque</div>
                            <span style="float: right;">Valor em estoque: <strong>R$ 1111,00</strong></span>
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
                                        <th scope="col" class="text-center">Nome de Produto</th>
                                        <th scope="col" class="text-center">Categoria</th>
                                        <th scope="col" class="text-center">Valor R$</th>
                                        <th scope="col" class="text-center">Entrada</th>
                                        <th scope="col" class="text-center">Saida</th>
                                        <th scope="col" class="text-center">Em Estoque</th>
                                        <th scope="col" class="text-center">Status</th>
                                        <th scope="col" class="text-center">Ações</th>
                                    </tr>
                                </thead>

                                <?php foreach ($produtos as $produto) { 
                                    $categoria = $categoriaDAO->get($produto->nomeCategoria);     
                                ?>
                                    <tbody>
                                        <tr 
                                            <?php if ($produto->quantidade >= 10) {
                                                        echo 'class="table-success"';
                                                    } elseif ($produto->quantidade >= 5 && $produto->quantidade <= 9) {
                                                        echo 'class="table-warning"';
                                                    } else {
                                                        echo 'class="table-danger"';
                                                    }
                                                ?>
                                        >
                                            <th scope="row">
                                                <label class="custom-control custom-checkbox m-0 p-0">
                                                    <input type="checkbox" class="custom-control-input table-select-row">
                                                    <span class="custom-control-indicator"></span>
                                                </label>
                                            </th>
                                            <td class="text-center"><?= $produto->id ?></td>
                                            <td class="text-center"><?= $produto->nomeProduto ?></td>
                                            <td class="text-center"><?= $categoria->nomeCategoria ?></td>
                                            <td class="text-center">R$ <?= $produto->valor ?></td>
                                            <td class="text-center">3</td>
                                            <td class="text-center">5</td>
                                            <td class="text-center"><?= $produto->quantidade ?></td>
                                            <td class="text-center"><?= ($produto->quantidade >= 5 ? 'Estoque Alto' : 'Estoque Baixo') ?></td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="form_produto.php?id=<?= $produto->id ?>">Editar</a>
                                                <a class="btn btn-sm btn-danger" href="controles/controleProduto.php?acao=deletar&id=<?= $produto->id ?>">Deletar</a>
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

<?php
require_once 'layout/footer.php';
?>