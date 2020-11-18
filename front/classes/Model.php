<?php

    require 'Conexao.php';

    class Model {

        protected $tabela;
        protected $coluna;
        protected $class;
        protected $db;

        public function __construct()
        {
            $conexao = new Conexao();
            $this->db = $conexao->conectar();
        }

        public function cadastrar($values) {
            $query = "INSERT INTO {$this->tabela} ({$this->coluna}) VALUES ($values)";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $this->db->lastInsertId();
        }

        public function get($id) {
            $query = "SELECT * FROM {$this->tabela} WHERE id = {$id}";
            $stmt = $this->db->prepare($query);
            $stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
            $stmt->execute();
            return $stmt->fetch();
        }

        public function alterar($id, $values) {
            $query = "UPDATE {$this->tabela} SET {$values} WHERE id = {$id}";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
        }
        
        public function deletar($id) { 
            $query = "DELETE FROM {$this->tabela} WHERE id = :id"; 
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute(); 
        }
    }

