<?php

/* Não permitindo que a URL seja acessada diretamente */
defined('BASEPATH') OR exit('No direct script access allowed');

/* Classe responsável por se conectar ao banco de dados com a tabela fornecedor */

Class Fornecedor_dao extends MY_Dao{

    /* construtor da classe */
    public function __construct(){

        /* carregando os models e DAOs necessários */
		parent::__construct();
        $this->load->model("dash/Fornecedor_model", "fornecedor_model");
        $this->load->model("dash/Contato_model", "contato_model");
        $this->load->model("dash/Endereco_model", "endereco_model");
    }

    /* função para recuperar todos fornecedores do bd */
    public function getFornecedores(){

        $fornecedores = $this->db->get("fornecedor");

        /* Verificando se retornou algo e guardando o resultado */
        if($fornecedores) $fornecedores->result_array();

        /* retornando o resultado */
        return $fornecedores->result_array;

    }
    
    /* função para recuperar um fornecedor específico do sistema */
    public function getFornecedorByID($id = NULL){

        /* iniciando os parâmetros da query */
        $this->db->join("endereco", "fornecedor.id_endereco = endereco.id_endereco", "inner");
        $this->db->join("contato", "fornecedor.id_contato = contato.id_contato", "inner");
        $this->db->where("fornecedor.id_fornecedor", $id);

        /* Definindo um limite */
        $this->db->limit(1);

        /* iniciando requisição e retornando o array */
        return $this->db->get("fornecedor")->result_array();
    }

    /* função para inserir um novo fornecedor no sistema */
    public function insert($fornecedor = NULL, $contato = NULL, $endereco = NULL){

        /* verifica se todos os dados foram inseridos */
        if($fornecedor && $contato && $endereco){
    
            /* Criando um model de contato e inserindo no banco de dados */
            $this->contato_model->__constructor($contato);
            $this->db->insert("contato", $contato);

            /* recupera o id do contato que foi criado */
            $id_contato = $this->db->insert_id();

            /* Criando um model de endereço e inserindo no banco de dados */
            $this->endereco_model->__constructor($endereco);
            $this->db->insert("endereco", $endereco);

            /* recupera o id do endereco que foi criado */
            $id_endereco = $this->db->insert_id();

            /*  Criando um model de fornecedor e inserindo no banco de dados  */
            $this->fornecedor_model->__constructor($fornecedor, $id_endereco, $id_contato);
            $this->db->insert("fornecedor", $this->fornecedor_model);

            /* Adicionando mensagen de sucesso na sessão */
            $this->session->set_flashdata('gravar_dados_fornecedores', "<div class = 'alert alert-success'>Fornecedor adicionado com sucesso.</div>");

        }else{
            /* Adicionando mensagen de erro na sessão */
            $this->session->set_flashdata('gravar_dados_fornecedores', "<div class = 'alert alert-danger'>Erro ao adicionar fornecedor, certifique-se que preencheu todos os dados corretamente.</div>");
        }
    }

    /* função para atualizar um fornecedor no sistema */
    public function update($fornecedor = NULL, $contato = NULL, $endereco = NULL){

        /* verifica se todos os dados foram enviados */
        if($fornecedor && $contato && $endereco){

            /* Criando os models */
            $this->contato_model->__constructor($contato);
            $this->endereco_model->__constructor($endereco);
            $this->fornecedor_model->__constructor($fornecedor, $endereco['id_endereco'], $contato['id_contato']);

            /* atualizando os dados */
            $this->db->update("contato", $this->contato_model, "id_contato = ".$contato['id_contato']);
            $this->db->update("endereco", $this->endereco_model, "id_endereco = ".$endereco['id_endereco']);
            $this->db->update("fornecedor", $this->fornecedor_model, "id_fornecedor =".$fornecedor['id_fornecedor']);

            /* enviando mensagem de sucesso */
            $this->session->set_flashdata('gravar_dados_fornecedores', "<div class = 'alert alert-success'>Fornecedor atualizado com sucesso!</div>");

        }else
            $this->session->set_flashdata('gravar_dados_fornecedores', "<div class = 'alert alert-danger'>Erro ao atualizar fornecedor, certifique-se que preencheu todos os dados corretamente.</div>");

    }   

    /* função para deletar um fornecedor do banco do sistema */
    public function delete($fornecedor = NULL, $contato = NULL, $endereco = NULL){

        /* verificando se os campos foram preenchidos */
        if($fornecedor && $contato && $endereco){

            /* deletando o fornecedor */
            $this->db->delete("fornecedor", "id_fornecedor = $fornecedor");
            
            /* deletando o endereço */
            $this->db->delete("endereco", "id_endereco = $endereco");

            /* deletando o contato */
            $this->db->delete("contato", "id_contato = $contato");

            /* enviando mensagem de sucesso */
            $this->session->set_flashdata('gravar_dados_fornecedores', "<div class = 'alert alert-success'>Fornecedor deletado com sucesso!</div>");

        }else
            /* enviando mensagem de erro */
            $this->session->set_flashdata('gravar_dados_fornecedores', "<div class = 'alert alert-danger'>Erro ao deletar fornecedor, tente novamente mais tarde!</div>");

    }

}


?>