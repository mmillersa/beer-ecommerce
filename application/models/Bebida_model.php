<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Model de autenticação do sistema */
Class Bebida_model extends CI_Model{

    /* função para adicionar uma nova categoria de bebida */
    public function addCategoria($dados = NULL){

        /* verifica se os dados não são nulos */
        if($dados){
            /* criando um laço para cada tabela de categoria que irá recebela */
            foreach($dados["bebidas"] as $bebida){
                $this->db->insert("categoria_".$bebida, ["categoria_$bebida" => $dados["nome-categoria"]]);
            }
        }
        
        /* Adiconando mensagem de sucesso na sessão */
        $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-success'>Categoria adicionada com sucesso</div>");

    }

    /* função para recuperar categorias do banco de dados */
    public function getCategorias(){

        /* recuperando as categorias das quatro tabelas */
        $cachaca = $this->db->get('categoria_cachaca');
        $whisky = $this->db->get('categoria_whisky');
        $cerveja = $this->db->get('categoria_cerveja');
        $vodka = $this->db->get('categoria_vodka');

        /* Verificando se retornou algo e guardando o resultado */
        if($cachaca) $cachaca->result_array();
        if($whisky) $whisky->result_array();
        if($cerveja) $cerveja->result_array();
        if($vodka) $vodka->result_array();

        
        /* retornando o array final */
        return array("cervejas" => $cerveja->result_array, "whiskys" => $whisky->result_array,
        "vodkas" => $vodka->result_array, "cachacas" => $cachaca->result_array);
    }

    /* função para atualizar categorias do banco de dados */
    public function atualizarCategoria($dados = NULL){
        
        /* verifica se os dados foram preenchidos */
        if($dados){
            $tabela = $dados['tabela'];
            $id = $dados['id'];
            $nome = $dados['nome'];

            /* atualizando as informações */
            if($this->db->update("categoria_$tabela", array("categoria_$tabela" => $nome), "id_categoria_$tabela = $id"))

                /* Adiconando mensagem de sucesso na sessão */
                $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-success'>Categoria atualizada com sucesso</div>");

            else
                $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-danger'>Erro ao atualizar categoria</div>");
        }
    }

    /* função para apagar uma categoria de cerveja */
    public function apagarCategoriaCerveja($id = NULL){

        /* verifica se existe id */
        if(!$id) return false;
        
        /* faz a consulta no bd para verificar se existe */
		$query = $this->getProdutoByID($id);

		/* verifica se foi encontrado algum registro */
		if($query){

            /* verifica se o registro foi apagado */
            if($this->db->delete("categoria_cerveja", array("id" => $id))){
                $this->session->set_flashdata('msg_listar_produtos', "<div class = 'alert alert-success'>Produto apagado com sucesso</div>");
            }
            return true;
        }
        $this->session->set_flashdata('msg_listar_produtos', "<div class = 'alert alert-danger'>Não foi possível excluir o produto</div>");
		return false;

    }
}


?>