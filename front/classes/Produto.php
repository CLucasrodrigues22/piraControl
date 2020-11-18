<?php

    class Produto {

        private $id;
        private $nomeProduto;
        private $valor;
        private $quantidade;

        public function __get($atributo) {
            return $this->$atributo;
        }

        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }

    }