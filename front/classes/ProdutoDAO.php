<?php

require_once 'Model.php';

class ProdutoDAO extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->class = 'Produto';
        $this->tabela = 'produto';
        $this->coluna = 'nomeProduto, valor, quantidade';
    }

    public function cadastrarProduto(Produto $produto)
    {
        $values = "'{$produto->__get('nomeProduto')}',
                    '{$produto->__get('valor')}',
                    '{$produto->__get('quantidade')}'";

        return $this->cadastrar($values);
    }

    public function listarProduto($condicao = '')
    {
        $where = '';
        if ($condicao != '') {
            $where = "WHERE {$condicao}";
        }
        $query = "SELECT id, nomeProduto, valor, quantidade FROM {$this->tabela}";
        $stmt = $this->db->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function alterarProduto(Produto $produto)
    {
        $values = "
                nomeProduto = '{$produto->__get('nomeProduto')}',
                valor = '{$produto->__get('valor')}',
                quantidade = '{$produto->__get('quantidade')}'
            ";

        $this->alterar($produto->__get('id'), $values);
    }
}
