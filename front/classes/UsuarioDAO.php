<?php

    require_once 'Model.php';

    class UsuarioDao extends Model {
        
        public function __construct()
        {
            parent::__construct();
            $this->class = 'Usuario';
            $this->tabela = 'usuario';   
            $this->coluna = 'nome, ultimoNome, usuario, email, matricula, senha, imagem'; 
        }

        public function cadastrarUsuario(Usuario $usuario) {
            $values = "'{$usuario->__get('nome')}', 
                        '{$usuario->__get('ultimoNome')}', 
                        '{$usuario->__get('usuario')}',
                        '{$usuario->__get('email')}', 
                        '{$usuario->__get('matricula')}',
                        '{$usuario->__get('senha')}',
                        '{$usuario->__get('imagem')}'";
            return $this->cadastrar($values);
        }

        public function listarUsuarios($condicao = '') {
            $where = '';
            if ($condicao != '') {
                $where = " WHERE {$condicao}";
            }
            $query = "SELECT id_usuario, nome, ultimoNome, usuario, email, matricula FROM {$this->tabela}";
            $stmt = $this->db->prepare($query);
            $stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public function getLogin($usuario, $senha) {
            $query = "SELECT usuario, senha FROM {$this->tabela} WHERE usuario = :usuario AND senha = :senha";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':senha', $senha);
            $stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
            $stmt->execute();
            return $stmt->fetch();
        }
    }