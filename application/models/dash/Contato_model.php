<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Model de contatos do sistema */
Class Contato_model extends CI_Model{

    /* atributos do model de contato */
    public $id_contato;
    public $numero_telefone;
    public $numero_celular;

    /* Construtor do model de contatos */
    public function __constructor($dados){

        $this->id_contato = $dados['id_contato'];
        $this->numero_telefone = $dados['numero_telefone'];
        $this->numero_celular = $dados['numero_celular'];
    }

}


?>