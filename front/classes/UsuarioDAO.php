<?php

require_once 'Model.php';

class UsuarioDAO extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->class = 'Usuario';
        $this->tabela = 'usuario';
        $this->coluna = 'nome, ultimoNome, nomeUsuario, email, matricula, senha, imagem';
    }
    

    public function cadastrarUsuario(Usuario $usuario)
    {
        $values = "'{$usuario->__get('nome')}', 
                        '{$usuario->__get('ultimoNome')}', 
                        '{$usuario->__get('nomeUsuario')}',
                        '{$usuario->__get('email')}', 
                        '{$usuario->__get('matricula')}',
                        '{$usuario->__get('senha')}',
                        '{$usuario->__get('imagem')}'";
        return $this->cadastrar($values);
    }

    public function listarUsuarios($condicao = '')
    {
        $where = '';
        if ($condicao != '') {
            $where = " WHERE {$condicao}";
        }
        $query = "SELECT id, nome, ultimoNome, nomeUsuario, email, matricula, imagem FROM {$this->tabela}";
        $stmt = $this->db->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getLogin($nomeUsuario, $senha)
    {
        $query = "SELECT nomeUsuario, senha FROM `usuario` WHERE nomeUsuario = :nomeUsuario AND senha = :senha";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nomeUsuario', $nomeUsuario);
        $stmt->bindValue(':senha', $senha);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $stmt->execute();
        echo $nomeUsuario;
        echo '<br>';
        echo $senha;
    }

    public function alterarUsuario(Usuario $usuario)
    {
        $altera_senha = ($usuario->__get('senha') != '' ? ", senha = '{$usuario->__get('senha')}'" : '');
        $alterar_imagem = ($usuario->__get('imagem') != '' ? ", imagem = '{$usuario->__get('imagem')}'" : '');

        $values = "
                nome = '{$usuario->__get('nome')}',
                ultimoNome = '{$usuario->__get('ultimoNome')}',
                nomeUsuario = '{$usuario->__get('nomeUsuario')}',
                email = '{$usuario->__get('email')}',
                matricula = '{$usuario->__get('matricula')}'
                {$altera_senha}
                {$alterar_imagem}
            ";

        $this->alterar($usuario->__get('id'), $values);
    }
}
