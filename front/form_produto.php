<?php
    include_once 'layout/header.php';
    include_once 'layout/menu.php';
?>

        
<?php
    require_once 'classes/Categoria.php';
    require_once 'classes/CategoriaDAO.php';

    $categoriaDAO = new CategoriaDAO();
    $categorias = $categoriaDAO->listaCategoria();


    require_once 'classes/Produto.php';
    require_once 'classes/ProdutoDAO.php';

    $produto = new Produto();

    if (isset($_GET['id']) && $_GET['id'] != '') {
        $id_produto = $_GET['id'];
        $produtoDAO = new ProdutoDAO();
        $produto = $produtoDAO->get($id_produto);
    }
    if (empty($produto)) {
        header("Location: produto.php?msg=Produto não encontrado no estoque");
    }
?>

<div class="adminx-content">
    <div class="adminx-main-content">
        <div class="container-fluid">
            <div class="pb-3">
                <h1>Cadastro de Produto</h1>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-grid">
                        <div class="card-header">
                            <div class="card-header-title">Validação</div>
                        </div>
                        <div class="card-body">
                            <p>
                                Preencha todos os dados abaixo para a criação de um novo produto.
                            </p>
                            <form action="controles/controleProduto?acao=<?= ($produto->id != '' ? 'editar' : 'cadastrar') ?>" method="POST">
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <input type="hidden" class="form-control" id="validationCustom001" name="id" value="<?= ($produto->id != '' ? $produto->id : '') ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="validationCustom01">Nome do Produto</label>
                                        <input type="text" class="form-control" id="validationCustom01" name="nomeProduto" value="<?= ($produto->nomeProduto != '' ? $produto->nomeProduto : '') ?>" placeholder="Nome do Produto">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label class="form-label" for="validationCustom03">Valor</label>
                                        <input type="text" class="form-control" id="validationCustom03" value="<?= ($produto->valor != '' ? $produto->valor : '') ?>" placeholder="Valor" name="valor">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label class="form-label" for="validationCustom04">Quantidade</label>
                                        <input type="quantidade" class="form-control" id="validationCustom04" name="quantidade" value="<?= ($produto->quantidade != '' ? $produto->quantidade : '') ?>" placeholder="Quantidade">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label class="form-label" for="validationCustom04">Categoria</label>
                                        <select class="form-control form-control-sm" style="width: 90%; height: 57%;" name="nomeCategoria">
                                            <?php foreach ($categorias as $categoria) { ?>
                                                <option value="<?= $categoria->id ?>" <?= ($produto->nomeCategoria != '' && $produto->nomeCategoria == $categoria->id ? 'selected' : '') ?>><?= $categoria->nomeCategoria ?></option>
                                            <?php } ?>
                                        </select>
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