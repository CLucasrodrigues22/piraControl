<!DOCTYPE html>
<html lang="en">
  <head>
    <title>PiraControl - Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="assets/css/adminx.css" media="screen" />
  </head>
  <body style="background-color: #0093cf;">
    <div class="adminx-container d-flex justify-content-center align-items-center">
      <div class="page-login">
        <div class="text-center">
          <a class="navbar-brand mb-4 h1" href="login.html">
            <img src="assets/img/logo.png" class="d-inline-block align-top " alt="">
          </a>
        </div>

        <div class="card mb-0">
          <div class="card-body">
            <form action="login" method="POST">
              <div class="form-group">
                <label for="exampleDropdownFormEmail1" class="form-label">Nome de Usuário</label>
                <input type="text" class="form-control" id="exampleDropdownFormEmail1" name="usuario" placeholder="Usuário">
              </div>
              <div class="form-group">
                <label for="exampleDropdownFormPassword1" class="form-label">Senha</label>
                <input type="password" class="form-control" id="exampleDropdownFormPassword1" name="senha" placeholder="Senha">
              </div>
              <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">Lembrar Senha</label>
                </div>
              </div>
              <button type="submit" class="btn btn-sm btn-block btn-primary">Entrar</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/vendor.js"></script>
    <script src="assets/js/adminx.js"></script>

  </body>
</html>