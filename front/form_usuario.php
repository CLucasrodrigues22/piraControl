<?php
include_once 'layout/header.php';
include_once 'layout/menu.php';
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
                            <form action="controles/controleUsuario?acao=cadastrar" method="POST" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="validationCustom01">Nome</label>
                                        <input type="text" class="form-control" id="validationCustom01" name="nome" placeholder="Nome" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="validationCustom02">Último Nome</label>
                                        <input type="text" class="form-control" id="validationCustom02" name="ultimoNome" placeholder="Último nome" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="validationCustom03">Nome de Usuário</label>
                                        <input type="text" class="form-control" id="validationCustom03" name="usuario" placeholder="Nome de Usuário" required>
                                        <div class="invalid-feedback">
                                            Nome de Usuário já existe.
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="validationCustom04">Email</label>
                                        <input type="email" class="form-control" id="validationCustom04" name="email" placeholder="Email" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="validationCustom05">Matrícula</label>
                                        <input type="text" class="form-control" id="validationCustom05" name="matricula" placeholder="Matrícula" required>
                                        <div class="invalid-feedback">
                                            Matrícula não encontrada, digite novamente.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="validationCustom06">Senha</label>
                                        <input type="password" class="form-control" id="validationCustom06" placeholder="Senha" name="senha" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="validationCustom07">Foto para Perfil</label>
                                        <input type="file" class="form-control" id="validationCustom07" name="imagem">
                                    </div>
                                </div>
                                <button class="btn btn-primary mr-2" type="submit">Cadastrar</button>
                                <small class="text-muted">
                                    Novo usuário a ser cadastrado.
                                </small>
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