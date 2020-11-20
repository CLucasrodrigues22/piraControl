<?php
include_once 'layout/header.php';
include_once 'layout/menu.php';
?>

<?php
require_once 'classes/Categoria.php';
require_once 'classes/CategoriaDAO.php';

$categoria = new Categoria();

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id_categoria = $_GET['id'];
    $categoriaDAO = new CategoriaDAO();
    $categoria = $categoriaDAO->get('id');
}
if (empty($categoria)) {
    header("Location: categoria.php?msg=");
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
                                Preencha todos os dados abaixo para a criação de uma nova categoria.
                            </p>
                            <form action="controles/controleCategoria.php?acao=<?= ($categoria->id != '' ? 'editar' : 'cadastrar') ?>" method="POST">
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <input type="hidden" class="form-control" id="validationCustom001" name="id" value="<?= ($categoria->id != '' ? $categoria->id : '') ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label" for="validationCustom01">Nome da Categoria</label>
                                        <input type="text" class="form-control" id="validationCustom01" name="nomeCategoria" value="<?= ($categoria->nomeCategoria != '' ? $categoria->nomeCategoria : '') ?>" placeholder="Nome da Categoria">
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