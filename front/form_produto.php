<?php
include_once 'layout/header.php';
include_once 'layout/menu.php';
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
                            <form action="controles/controleProduto.php?acao=cadastrar" method="POST">
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <input type="hidden" class="form-control" id="validationCustom001" name="id" value="" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="validationCustom01">Nome do Produto</label>
                                        <input type="text" class="form-control" id="validationCustom01" name="nomeProduto" value="" placeholder="Nome do Produto">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label class="form-label" for="validationCustom03">Valor</label>
                                        <input type="text" class="form-control" id="validationCustom03" value="" placeholder="Valor" name="valor">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label class="form-label" for="validationCustom04">Quantidade</label>
                                        <input type="quantidade" class="form-control" id="validationCustom04" name="quantidade" placeholder="Quantidade">
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