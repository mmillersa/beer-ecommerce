<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Model de categorias do sistema */
Class Categoria_model extends CI_Model{

    /* atributos do model de categoria */
    public $id_categoria;
    public $descricao_categoria;

    /* Construtor do model de categorias */
    public function __constructor($dados){

        $this->descricao_categoria = $dados['descricao_categoria'];
        $this->id_categoria = $dados['id_categoria'];
    }

}


?>