<?php

require_once 'Model.php';

class CategoriaDAO extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->class = 'Categoria';
        $this->tabela = 'categoria';
        $this->coluna = 'nomeCategoria';
    }

    public function cadastraCategoria(Categoria $categoria)
    {
        $values = "
            '{$categoria->__get('nomeCategoria')}'
        ";

        $this->cadastrar($values);
    }

    public function listaCategoria($condicao = '')
    {
        $where = '';
        if ($condicao != '') {
            $where = "WHERE {$condicao}";
        }
        $query = "SELECT id, nomeCategoria FROM {$this->tabela}";
        $stmt = $this->db->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
