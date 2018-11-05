<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Model de endereços do sistema */
Class Endereco_model extends CI_Model{

    /* atributos do model de endereco */
    public $id_endereco;
    public $apelido_endereco;
    public $numero_endereco;
    public $rua;
    public $bairro;
    public $cidade;
    public $uf;
    public $cep;
    public $complemento;
    

    /* Construtor do model de endereços */
    public function __constructor($dados){

        $this->id_endereco = $dados['id_endereco'];
        $this->apelido_endereco = $dados['apelido_endereco'];
        $this->numero_endereco = $dados['numero_endereco'];
        $this->rua = $dados['rua'];
        $this->bairro = $dados['bairro'];
        $this->cidade = $dados['cidade'];
        $this->uf = $dados['uf'];
        $this->cep = $dados['cep'];
        $this->complemento = $dados['complemento'];
    }

}


?>