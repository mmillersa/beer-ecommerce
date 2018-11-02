<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Model de foenecedores */
Class Fornecedor_model extends CI_Model{
    
    /* Construtor do model de promoções */
    public function __construct(){

        /* carregando o DAO de promoção */
        parent::__construct();
        $this->load->dao("fornecedor_dao", "", true);
        
    }
    /* função para adicionar um novo fornecedor ao banco de dados */
    public function addFornecedor($dados = NULL, $contato = NULL, $endereco = NULL){

        /* verifica se todos os dados foram inseridos */
        if($dados && $contato && $dados){
            
            /* adicionando o contato */
            $this->fornecedor_dao->insert_contato($contato);
            
            /* recupera o id do contato que foi criado */
            $id_contato = $this->fornecedor_dao->recupera_ultimo_id();

            /* adicionando endereco */
            $this->fornecedor_dao->insert_endereco($endereco);

            /* recupera o id do endereco que foi criado */
            $id_endereco = $this->fornecedor_dao->recupera_ultimo_id();

            /* adicionando fornecedor */
            $this->fornecedor_dao->insert_fornecedor($id_contato, $id_endereco, $dados);

            /* Adicionando mensagen de sucesso na sessão */
            $this->session->set_flashdata('gravar_dados_fornecedores', "<div class = 'alert alert-success'>Fornecedor adicionado com sucesso.</div>");

        }else{
            /* Adicionando mensagen de erro na sessão */
            $this->session->set_flashdata('gravar_dados_fornecedores', "<div class = 'alert alert-danger'>Erro ao adicionar fornecedor, certifique-se que preencheu todos os dados corretamente.</div>");
        }

    }

    /* função para recuperar fornecedores do banco de dados */
    public function getFornecedores(){

        $fornecedores = $this->fornecedor_dao->get_fornecedores();

        /* Verificando se retornou algo e guardando o resultado */
        if($fornecedores) $fornecedores->result_array();
        return $fornecedores->result_array;
    }

    /* função para recuperar informações específicas de um fornecedor */
    public function getFornecedorByID($id = NULL){

        /* verificando se existe um id */
        if($id){

            $fornecedor = $this->fornecedor_dao->get_fornecedor_by_id($id);

            /* retornando o array */
            return $fornecedor->result_array();
            
        }

    }

    /* função para atualizar um fornecedor no banco de dados */
    public function attFornecedor($dados = NULL, $contato = NULL, $endereco = NULL, $id_contato = NULL, $id_endereco = NULL){

        /* verifica se os dados foram passados */
        if($dados && $contato && $endereco && $id_contato && $id_endereco){

            $this->fornecedor_dao->att_fornecedor($dados, $id_contato, $id_endereco, $contato, $endereco);

            /* Retornando mensagem de sucesso */
            $this->session->set_flashdata('gravar_dados_fornecedores', "<div class = 'alert alert-success'>Fornecedor atualizado com sucesso.</div>");
        }
        else{
            /* Adicionando mensagen de erro na sessão */
            $this->session->set_flashdata('gravar_dados_fornecedores', "<div class = 'alert alert-danger'>Erro ao atualizar fornecedor, certifique-se que preencheu todos os dados corretamente.</div>");

        }

    }

}


?>