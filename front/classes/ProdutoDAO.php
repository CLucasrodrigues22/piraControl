<?php

require_once 'Model.php';

class ProdutoDAO extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->class = 'Produto';
        $this->tabela = 'produto';
        $this->coluna = 'nomeProduto, valor, quantidade, nomeCategoria';
    }

    public function cadastrarProduto(Produto $produto)
    {
        $values = "'{$produto->__get('nomeProduto')}',
                    '{$produto->__get('valor')}',
                    '{$produto->__get('quantidade')}',
                    '{$produto->__get('nomeCategoria')}'";

        return $this->cadastrar($values);
    }

    public function listarProduto($condicao = '')
    {
        $where = '';
        if ($condicao != '') {
            $where = "WHERE {$condicao}";
        }
        $query = "SELECT id, nomeProduto, valor, quantidade, nomeCategoria FROM {$this->tabela}";
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
                quantidade = '{$produto->__get('quantidade')}',
                nomeCategoria = '{$produto->__get('nomeCategoria')}'
            ";

        $this->alterar($produto->__get('id'), $values);
    }
}
