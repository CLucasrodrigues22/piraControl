<?php
include_once 'layout/header.php';
include_once 'layout/menu.php';

include_once 'classes/Usuario.php';
include_once 'classes/UsuarioDAO.php';

$usuarioDAO = new UsuarioDAO();
$usuarios = $usuarioDAO->listarUsuarios();

// $usuarioTotal = $usuarios->id + 
include_once 'classes/Produto.php';
include_once 'classes/ProdutoDAO.php';

include_once 'classes/Ativo.php';
include_once 'classes/AtivoDAO.php';


?>

<div class="adminx-content">
  <div class="adminx-main-content">
    <div class="container-fluid">
      <div class="pb-3">
        <h1>Dashboard</h1>
      </div>

      <div class="row">
        <div class="col-md-6 col-lg-4 d-flex">
          <div class="card border-0 bg-primary text-white text-center mb-grid w-100">
            <div class="d-flex flex-row align-items-center h-100">
              <div class="card-icon d-flex align-items-center h-100 justify-content-center">
                <i data-feather="shopping-cart"></i>
              </div>
              <div class="card-body">
                <div class="card-info-title"><h4>Estoque</h4><span>(Total)</span></div>
                <h3 class="card-title mb-0">
                  5
                </h3>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 d-flex">
          <div class="card border-0 bg-success text-white text-center mb-grid w-100">
            <div class="d-flex flex-row align-items-center h-100">
              <div class="card-icon d-flex align-items-center h-100 justify-content-center">
                <i data-feather="users"></i>
              </div>
              <div class="card-body">
                <div class="card-info-title"><h4>Usuários</h4><span>(Total)</span></div>
                <h3 class="card-title mb-0">
                  21
                </h3>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 d-flex">
          <div class="card border-0 bg-success text-white text-center mb-grid w-100">
            <div class="d-flex flex-row align-items-center h-100">
              <div class="card-icon d-flex align-items-center h-100 justify-content-center">
                <i data-feather="users"></i>
              </div>
              <div class="card-body">
                <div class="card-info-title"><h4>Teste de Ativos</h4><span>(Total)</span></div>
                <h3 class="card-title mb-0">
                  2
                </h3>
              </div>
            </div>
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