<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Model de autenticação do sistema */
Class Bebida_model extends CI_Model{
    
    /* atributos do model de bebida */
    public $id_bebida;
    public $nome_bebida;
    public $ml;
    public $preco_bebida;
    public $descricao_bebida;
    public $teor_alcoolico;
    public $id_marca;
    public $tipo_bebida;
    public $status_bebida;
    public $qtd_estoque;

    /* Construtor do model de bebidas */
    public function __constructor($dados){

        $this->id_bebida = $dados['id_bebida'];
        $this->nome_bebida = $dados['nome_bebida'];
        $this->ml = $dados['ml'];
        $this->preco_bebida = $dados['preco_bebida'];
        $this->descricao_bebida = $dados['descricao_bebida'];
        $this->teor_alcoolico = $dados['teor_alcoolico'];
        $this->id_marca = $dados['id_marca'];
        $this->tipo_bebida = $dados['tipo_bebida'];
        $this->status_bebida = $dados['status_bebida'];
        $this->qtd_estoque = $dados['qtd_estoque'];
    }

}


?>