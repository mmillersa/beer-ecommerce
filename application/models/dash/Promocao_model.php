<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Model de promoções do sistema */
Class Promocao_model extends CI_Model{

    /* atributos do model de promoção */
    public $id_promocao;
    public $status;
    public $desconto;
    public $apelido_promocao;
    public $bebidas_desconto;

    /* Construtor do model de promoção */
    public function __constructor($dados){

        $this->id_promocao = isset($dados['id_promocao']) ? $dados['id_promocao'] : null;
        $this->status = isset($dados['id_promocao']) ? $dados['status'] : "checked";
        $this->desconto = $dados['desconto'];
        $this->apelido_promocao = $dados['apelido_promocao'];
        $this->bebidas_desconto = $dados['bebidas_desconto'];
    }


}


?>