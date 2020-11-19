<body>
    <div class="adminx-container">
      <nav class="navbar navbar-expand justify-content-between fixed-top">
        <a class="navbar-brand mb-0 h1 d-none d-md-block" href="inicio">
          <img src="./demo/img/logo.png" class=" d-inline-block align-top mr-2" alt="">
          PiraControl
        </a>

        <form class="form-inline form-quicksearch d-none d-md-block mx-auto">
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-icon">
                <i data-feather="search"></i>
              </div>
            </div>
            <input type="text" class="form-control" id="search" placeholder="Digite para pesquisar">
          </div>
        </form>

        <div class="d-flex flex-1 d-block d-md-none">
          <a href="#" class="sidebar-toggle ml-3">
            <i data-feather="menu"></i>
          </a>
        </div>

        <ul class="navbar-nav d-flex justify-content-end mr-2">
          <!-- Notificatoins -->
          <li class="nav-item dropdown d-flex align-items-center mr-2">
            <a class="nav-link nav-link-notifications" id="dropdownNotifications" data-toggle="dropdown" href="#">
              <i class="oi oi-bell display-inline-block align-middle"></i>
              <span class="nav-link-notification-number">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-notifications" aria-labelledby="dropdownNotifications">
              <div class="notifications-header d-flex justify-content-between align-items-center">
                <span class="notifications-header-title">
                  Notificações
                </span>
                <a href="#" class="d-flex"><small>Marque todas como lidas</small></a>
              </div>

              <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action unread">
                  <p class="mb-1">Invitation for <strong>Lunch</strong> on <strong>Jan 12th 2018</strong> by <strong>Laura</strong></p>

                  <div class="mb-1">
                    <button type="button" class="btn btn-primary btn-sm">Accept invite</button>
                    <button type="button" class="btn btn-outline-danger btn-sm">Decline</button>
                  </div>

                  <small>1 hour ago</small>
                </a>

                <a href="#" class="list-group-item list-group-item-action">
                  <p class="mb-1"><strong class="text-success">Goal completed</strong><br />1,000 new members today</p>
                  <small>3 days ago</small>
                </a>

                <a href="#" class="list-group-item list-group-item-action">
                  <p class="mb-1 text-danger"><strong>System error detected</strong></p>
                  <small>3 days ago</small>
                </a>

                <a href="#" class="list-group-item list-group-item-action">
                  <p class="mb-1">Your task <strong>Design Draft</strong> is due today.</p>
                  <small>4 days ago</small>
                </a>
              </div>

              <div class="notifications-footer text-center">
                <a href="#"><small>View all notifications</small></a>
              </div>
            </div>
          </li>
          <!-- Notifications -->
          <li class="nav-item dropdown">
            <a class="nav-link avatar-with-name" id="navbarDropdownMenuLink" data-toggle="dropdown" href="#">
              <img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg" class="d-inline-block align-top" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">My Profile</a>
              <a class="dropdown-item" href="#">My Tasks</a>
              <a class="dropdown-item" href="#">Settings</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-danger" href="../logout">Sair</a>
            </div>
          </li>
        </ul>
      </nav>

      <!-- expand-hover push -->
      <!-- Sidebar -->
      <div class="adminx-sidebar expand-hover push">
        <ul class="sidebar-nav">
          <li class="sidebar-nav-item">
            <a href="inicio" class="sidebar-nav-link active">
              <span class="sidebar-nav-icon">
                <i data-feather="home"></i>
              </span>
              <span class="sidebar-nav-name">
                Dashboard
              </span>
              <span class="sidebar-nav-end">

              </span>
            </a>
          </li>
          
          <li class="sidebar-nav-item">
            <a class="sidebar-nav-link collapsed" data-toggle="collapse" href="#navForms" aria-expanded="false" aria-controls="navForms">
              <span class="sidebar-nav-icon">
                <i data-feather="edit"></i>
              </span>
              <span class="sidebar-nav-name">
                Formulários
              </span>
              <span class="sidebar-nav-end">
                <i data-feather="chevron-right" class="nav-collapse-icon"></i>
              </span>
            </a>
            <ul class="sidebar-sub-nav collapse" id="navForms">
              <li class="sidebar-nav-item">
                <a href="form_usuario" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    <i class="fas fa-plus-circle"></i>
                  </span>
                  <span class="sidebar-nav-name">
                    Novo Usuário
                  </span>
                </a>
              </li>
              <li class="sidebar-nav-item">
                <a href="form_produto" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    <i class="fas fa-plus-circle"></i>
                  </span>
                  <span class="sidebar-nav-name">
                    Novo Produto
                  </span>
                </a>
              </li>
              <li class="sidebar-nav-item">
                <a href="form_categoria" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    <i class="fas fa-plus-circle"></i>
                  </span>
                  <span class="sidebar-nav-name">
                    Nova Categoria
                  </span>
                </a>
              </li>
            </ul>
          </li>

          <li class="sidebar-nav-item">
            <a href="usuario" class="sidebar-nav-link">
              <span class="sidebar-nav-icon">
                <i class="fas fa-users"></i>
              </span>
              <span class="sidebar-nav-name">
                Usuários
              </span>
            </a>
          </li>

          <li class="sidebar-nav-item">
            <a href="produto" class="sidebar-nav-link">
              <span class="sidebar-nav-icon">
                <i class="fas fa-box"></i>
              </span>
              <span class="sidebar-nav-name">
                Estoque
              </span>
            </a>
          </li>

          <li class="sidebar-nav-item">
            <a href="categoria" class="sidebar-nav-link">
              <span class="sidebar-nav-icon">
                <i class="fas fa-sticky-note"></i>
              </span>
              <span class="sidebar-nav-name">
                Categorias
              </span>
            </a>
          </li>
        </ul>

      </div><!-- Sidebar End -->