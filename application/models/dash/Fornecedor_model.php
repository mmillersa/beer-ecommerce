<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Model de fornecedores do sistema */
Class Fornecedor_model extends CI_Model{

    /* atributos do model de fornecedor */
    public $id_fornecedor;
    public $id_endereco;
    public $id_contato;
    public $nome_fornecedor;
    public $cnpj_fornecedor;
    public $email_fornecedor;
    public $data_cadastro_fornecedor;

    /* Construtor do model de fornecedor */
    public function __constructor($dados, $endereco, $contato){

        $this->id_fornecedor = $dados['id_fornecedor'];
        $this->nome_fornecedor = $dados['nome_fornecedor'];
        $this->cnpj_fornecedor = $dados['cnpj_fornecedor'];
        $this->email_fornecedor = $dados['email_fornecedor'];
        $this->data_cadastro_fornecedor = date("Y-m-d");
        $this->id_endereco = $endereco;
        $this->id_contato = $contato;
    }

}


?>