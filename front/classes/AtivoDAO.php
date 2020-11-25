<?php

require_once 'Model.php';

class AtivoDAO extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->class = 'Ativo';
        $this->tabela = 'ativo';
        $this->coluna = 'nomeAtivo, chamadoGLPI, dataAbertura, dataTeste, tecnico, resultado';
    }

    public function cadastrarAtivo(Ativo $ativo)
    {
        $values = "'{$ativo->__get('nomeAtivo')}',
                    '{$ativo->__get('chamadoGLPI')}',
                    '{$ativo->__get('dataAbertura')}',
                    '{$ativo->__get('dataTeste')}',
                    '{$ativo->__get('tecnico')}',
                    '{$ativo->__get('resultado')}'";

        return $this->cadastrar($values);
    }

    public function listarAtivos($condicao = '')
    {
        $where = '';
        if ($condicao != '') {
            $where = " WHERE {$condicao}";
        }
        $query = "SELECT id, nomeAtivo, chamadoGLPI, dataAbertura, dataTeste, tecnico, resultado FROM {$this->tabela}";
        $stmt = $this->db->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function alterarAtivo(Ativo $ativo)
    {
        $values = "
            nomeAtivo = '{$ativo->__get('nomeAtivo')}',
            chamadoGLPI = '{$ativo->__get('chamadoGLPI')}',
            dataAbertura = '{$ativo->__get('dataAbertura')}',
            dataTeste = '{$ativo->__get('dataTeste')}',
            tecnico = '{$ativo->__get('tecnico')}',
            resultado = '{$ativo->__get('resultado')}'        
        ";

        $this->alterar($ativo->__get('id'), $values);
    }
}
