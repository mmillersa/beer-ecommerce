<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Model de foenecedores */
Class Fornecedor_model extends CI_Model{

    /* função para adicionar um novo fornecedor ao banco de dados */
    public function addFornecedor($dados = NULL, $contato = NULL, $endereco = NULL){

        /* verifica se todos os dados foram inseridos */
        if($dados && $contato && $dados){
            
            /* adicionando o contato */
            $this->db->insert("contato", $contato);
            
            /* recupera o id do contato que foi criado */
            $id_contato = $this->db->insert_id();

            /* adicionando endereco */
            $this->db->insert("endereco", $endereco);

            /* recupera o id do endereco que foi criado */
            $id_endereco = $this->db->insert_id();

            /* terminando de preencher o array de inserção */
            $dados['data_cadastro_fornecedor'] = date("Y-m-d");
            $dados['id_endereco'] = $id_endereco;
            $dados['id_contato'] = $id_contato;

            /* adicionando fornecedor */
            $this->db->insert("fornecedor", $dados);

            /* Adicionando mensagen de sucesso na sessão */
            $this->session->set_flashdata('gravar_dados_fornecedores', "<div class = 'alert alert-success'>Fornecedor adicionado com sucesso.</div>");

        }else{
            /* Adicionando mensagen de erro na sessão */
            $this->session->set_flashdata('gravar_dados_fornecedores', "<div class = 'alert alert-danger'>Erro ao adicionar fornecedor, certifique-se que preencheu todos os dados corretamente.</div>");
        }

    }

    /* função para recuperar fornecedores do banco de dados */
    public function getFornecedores(){

        $fornecedores = $this->db->get("fornecedor");

        /* Verificando se retornou algo e guardando o resultado */
        if($fornecedores) $fornecedores->result_array();
        return $fornecedores->result_array;
    }

    /* função para recuperar informações específicas de um fornecedor */
    public function getFornecedorByID($id = NULL){

        /* verificando se existe um id */
        if($id){

            /* iniciando os parâmetros da query */
            $this->db->join("endereco", "fornecedor.id_endereco = endereco.id_endereco", "inner");
            $this->db->join("contato", "fornecedor.id_contato = contato.id_contato", "inner");
            $this->db->where("fornecedor.id_fornecedor", $id);

            /* Definindo um limite */
            $this->db->limit(1);

            /* iniciando requisição */
            $fornecedor = $this->db->get("fornecedor");

            /* retornando o array */
            return $fornecedor->result_array();
            
        }

    }

    /* função para atualizar um fornecedor no banco de dados */
    public function attFornecedor($dados = NULL, $contato = NULL, $endereco = NULL, $id_contato = NULL, $id_endereco = NULL){

        /* verifica se os dados foram passados */
        if($dados && $contato && $endereco && $id_contato && $id_endereco){

            /* atualizando o contato */
            $this->db->update("contato", $contato, "id_contato = $id_contato");

            /* atualizando o endereco */
            $this->db->update("endereco", $endereco, "id_endereco = $id_endereco");

            /* atualizando informações pessoais */
            $this->db->update("fornecedor", $dados, "id_fornecedor = " . $dados['id_fornecedor']);

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