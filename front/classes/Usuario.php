<?php

    class Usuario {

        private $id;
        private $nome;
        private $ultimoNome;
        private $usuario;
        private $email;
        private $matricula;
        private $imagem;
        private $senha;

        public function __get($atributo) {
            return $this->$atributo;
        }
    
        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }
        
    }