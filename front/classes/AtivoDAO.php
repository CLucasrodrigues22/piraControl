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
    }
}
