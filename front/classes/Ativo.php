<?php

class Ativo
{

    private $id;
    private $nomeAtivo;
    private $chamadoGLPI;
    private $dataAbertura;
    private $dataTeste;
    private $tecnico;
    private $resultado;

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }
}
