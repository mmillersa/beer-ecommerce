<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Model de autenticação do sistema */
Class Bebida_model extends CI_Model{

    /* função para retornar uma categoria */
    public function getCategoriaByID($id = NULL){

        if($id){
            /* Condição do id */
            $this->db->where("id_categoria", $id);

            /* Definindo um limite */
            $this->db->limit(1);

            /* Requisitando e retornando */
            $query = $this->db->get("categoria");
            return $query->row();
        }

    }

    /* função para adicionar uma nova categoria de bebida */
    public function addCategoria($dados = NULL){

        /* verifica se os dados não são nulos */
        if($dados){
            $this->db->insert("categoria", ["descricao_categoria" => $dados["nome-categoria"]]);
        }
        
        /* Adiconando mensagem de sucesso na sessão */
        $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-success'>Categoria adicionada com sucesso</div>");

    }

    /* função para recuperar categorias do banco de dados */
    public function getCategorias(){

        /* recuperando as categorias */
        $categorias = $this->db->get('categoria');

        /* Verificando se retornou algo e guardando o resultado */
        if($categorias) $categorias->result_array();
        
        /* retornando o array final */
        return $categorias->result_array;
        
    }

    /* função para atualizar categorias do banco de dados */
    public function atualizarCategoria($dados = NULL){
        
        /* verifica se os dados foram preenchidos */
        if($dados){
            $id = $dados['id'];
            $nome = $dados['nome'];

            /* atualizando as informações */
            if($this->db->update("categoria", array("descricao_categoria" => $nome), "id_categoria = $id"))

                /* Adiconando mensagem de sucesso na sessão */
                $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-success'>Categoria atualizada com sucesso</div>");

            else
                $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-danger'>Erro ao atualizar categoria</div>");
        }
    }

    /* função para apagar uma categoria */
    public function apagarCategoria($id = NULL){

        /* verifica se os dados foram enviados */
        if(!$id && $tabela) return false;
        
        /* faz a consulta no bd para verificar se existe */
		$query = $this->getCategoriaByID($id);

		/* verifica se foi encontrado algum registro */
		if($query){

            /* verifica se o registro foi apagado */
            if($this->db->delete("categoria", array("id_categoria" => $id))){
                $this->session->set_flashdata('msg_listar_produtos', "<div class = 'alert alert-success'>Categoria apagada com sucesso</div>");
            }
            return true;
        }
        $this->session->set_flashdata('msg_listar_produtos', "<div class = 'alert alert-danger'>Não foi possível excluir a categoria</div>");
		return false;

    }
}


?>