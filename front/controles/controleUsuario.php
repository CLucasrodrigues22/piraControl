<?php
require_once '../includes/valida.php';
require_once '../classes/Usuario.php';
require_once '../classes/UsuarioDAO.php';

$usuario = new Usuario();
$usuarioDAO = new UsuarioDAO();

$acao = $_GET['acao'];
$id = '';
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id_usuario = $_GET['id'];
}

//cadastrar
if ($acao == 'cadastrar') {

    if (!empty($_FILES['imagem']['tmp_name'])) {

        $imagem = explode('.', $_FILES['imagem']['name']);

        $extensao = strtolower(substr($_FILES['imagem']['name'], -4)); //pega a extensão da imagem
        $novo_nome = $imagem[0] . md5(time()) . $extensao; //define o novo nome da imagem

        $nome_final = $novo_nome; //nome final da imagem

        $diretorio = "../demo/image/usuario/"; //define o diretório para onde enviaremos a imagem

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $novo_nome)) {
            $usuario->__set('imagem', $nome_final);
        }
    }

    $usuario->__set('nome', $_POST['nome']);
    $usuario->__set('ultimoNome', $_POST['ultimoNome']);
    $usuario->__set('nomeUsuario', $_POST['nomeUsuario']);
    $usuario->__set('email', $_POST['email']);
    $usuario->__set('matricula', $_POST['matricula']);
    $usuario->__set('senha', md5($_POST['senha']));

    $id_usuario = $usuarioDAO->cadastrarUsuario($usuario);
    $msg = 'Usuário cadastrado com sucesso';

    header('location: ../usuario.php?id=$id_usuario&msg=Usuário cadastrado com sucesso');

} else if ($acao == 'editar') { //editar senha  || ($_SESSION['id_usuario'] == $_POST['id'])
    //atualização de senha
    if ($_POST['senha'] != '') {
        $usuario->__set('senha', $_POST['senha']);
    }
    $id_usuario = $_POST['id'];
    //upload de nova imagem
    if ($_FILES['imagem']['name'] != '') {

        if ($_FILES['imagem']['error'] != 0) {
            $msg = "Não foi possível fazer o upload da imagem, erro:" . $upload['erros'][$_FILES['imagem']['error']]; 
            exit;
        }

        $imagem = explode('.', $_FILES['imagem']['name']);
        $extensao = strtolower(substr($_FILES['imagem']['name'], -4)); //pega a extensão da imagem
        $novo_nome = $imagem[0] . md5(time()) . $extensao; //define o novo nome da imagem
        $nome_final = $novo_nome; //nome final da imagem
        $diretorio = "../demo/image/usuario/"; //define o diretório para onde enviaremos a imagem

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $novo_nome)) {
            $usuario->__set('imagem', $nome_final);

            //alimentando usuario temporario
            $usuarioTemp = $usuarioDAO->get($id_usuario);
            //montando link da imagem atual do usuario, representado pelo usuario temporario
            $imagem_a_remover = $diretorio . $usuarioTemp->__get('imagem');
            //removendo imagem antiga
            if (file_exists($imagem_a_remover)) {
                unlink($imagem_a_remover);
            }

            if ($id_usuario == $_SESSION['id_usuario']) {
                $_SESSION['imagem'] = $usuario->__get('imagem');
            }
        }
    }
    //atualização dos atributos restantes
    $usuario->__set('id', $_POST['id']);
    $usuario->__set('nome', $_POST['nome']);
    $usuario->__set('ultimoNome', $_POST['ultimoNome']);
    $usuario->__set('nomeUsuario', $_POST['nomeUsuario']);
    $usuario->__set('email', $_POST['email']);
    $usuario->__set('matricula', $_POST['matricula']);
    $usuario->__set('senha', md5($_POST['senha']));

    $usuarioDAO->alterarUsuario($usuario);
    header('location: ../usuario.php?id=$id_usuario&msg=O usuario foi atualizado com sucesso');
} else if ($acao == 'deletar') { //deletar usuario

    $usuarioDAO->deletar($id_usuario);
    $msg = 'Usuário excluido com sucesso';

    header("Location: ../usuario.php?msg=$msg");
}
