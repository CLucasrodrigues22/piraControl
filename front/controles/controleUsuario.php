<?php

    require '../classes/Usuario.php';
    require '../classes/UsuarioDAO.php';

    $usuario = new Usuario();
    $usuarioDAO = new UsuarioDao();

    $acao = $_GET['acao'];
    $id = '';

    if(isset($_GET['id_usuario']) && $_GET['id_usuario'] != '') {
        $id_usuario = $_GET['id_usuario'];
    }

    if ($acao == 'cadastrar') {

        if (!empty($_FILES['imagem']['tmp_name'])) {
            
            $imagem = explode('.', $_FILES['imagem']['name']);

            $extensao = strtolower(substr($_FILES['imagem']['name'], -4));//pega a extensão da imagem
            $novo_nome = $imagem[0] . md5(time()) . $extensao; //define o novo nome da imagem

            $nome_final = $novo_nome; //nome final da imagem

            $diretorio = "../demo/image/usuario/"; //define o diretório para onde enviaremos a imagem

            if (move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$novo_nome)) {
                $usuario->__set('imagem', $nome_final);
            }
        }

        $usuario->__set('nome', $_POST['nome']);
        $usuario->__set('ultimoNome', $_POST['ultimoNome']);
        $usuario->__set('usuario', $_POST['usuario']);
        $usuario->__set('email', $_POST['email']);
        $usuario->__set('matricula', $_POST['matricula']);
        $usuario->__set('senha', md5($_POST['senha']));

        $id_usuario = $usuarioDAO->cadastrarUsuario($usuario);
        $msg = 'Usuário cadastrado com sucesso';

        // echo '<pre>';
        // var_dump($_POST);
        // var_dump($_FILES);
        // echo '</pre>';

        header('location: ../usuario.php?id=$id_usuario&msg=Usuário cadastrado com sucesso');
    }