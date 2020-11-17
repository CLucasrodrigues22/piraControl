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
            echo $query;
            var_dump($stmt->execute());
            // return $this->db->lastInsertId();
        }
    }
