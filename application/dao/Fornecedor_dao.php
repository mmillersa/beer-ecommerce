<?php

/* Não permitindo que a URL seja acessada diretamente */
defined('BASEPATH') OR exit('No direct script access allowed');

/* Classe responsável por se conectar ao banco de dados com a tabela fornecedor */

Class Fornecedor_dao extends MY_Dao{

    public function insert_contato($contato){
        $this->db->insert("contato", $contato);
    }

    public function insert_endereco($endereco){
        $this->db->insert("endereco", $endereco);
    }

    public function insert_fornecedor($id_contato, $id_endereco, $dados){

        /* terminando de preencher o array de inserção */
        $dados['data_cadastro_fornecedor'] = date("Y-m-d");
        $dados['id_endereco'] = $id_endereco;
        $dados['id_contato'] = $id_contato;

        $this->db->insert("fornecedor", $dados);
    }

    public function recupera_ultimo_id(){
        return $this->db->insert_id();
    }

    public function get_fornecedores(){
        return $this->db->get("fornecedor");
    }

    public function get_fornecedor_by_id($id){

        /* iniciando os parâmetros da query */
        $this->db->join("endereco", "fornecedor.id_endereco = endereco.id_endereco", "inner");
        $this->db->join("contato", "fornecedor.id_contato = contato.id_contato", "inner");
        $this->db->where("fornecedor.id_fornecedor", $id);

        /* Definindo um limite */
        $this->db->limit(1);

        /* iniciando requisição */
        return $this->db->get("fornecedor");
    }

    public function att_fornecedor($dados, $id_contato, $id_endereco, $contato, $endereco){
        /* atualizando o contato */
        $this->db->update("contato", $contato, "id_contato = $id_contato");

        /* atualizando o endereco */
        $this->db->update("endereco", $endereco, "id_endereco = $id_endereco");

        /* atualizando informações pessoais */
        $this->db->update("fornecedor", $dados, "id_fornecedor = " . $dados['id_fornecedor']);
    }

}


?>