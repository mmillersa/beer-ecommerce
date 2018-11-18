<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Model de marcas do sistema */
Class Marca_model extends CI_Model{

    /* atributos do model de marca */
    public $id_marca;
    public $nome_marca;

    /* Construtor do model de marcas */
    public function __constructor($dados){

        $this->nome_marca = $dados['nome_marca'];
        $this->id_marca = $dados['id_marca'];
    }

}


?>