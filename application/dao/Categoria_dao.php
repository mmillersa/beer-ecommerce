<?php

/* Não permitindo que a URL seja acessada diretamente */
defined('BASEPATH') OR exit('No direct script access allowed');

/* Classe responsável por se conectar ao banco de dados com a tabela fornecedor */

Class Categoria_dao extends MY_Dao{

    /* construtor da classe */
    public function __construct(){
        /* carregando os models e DAOs necessários */
		parent::__construct();
        $this->load->model("dash/Categoria_model", "categoria_model");
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

    /* função para recuperar uma categoria pelo ID */
    public function getCategoriaByID($id = NULL){

        if($id)
            return $this->db->get_where("categoria", ["id_categoria" => $id])->result_array();
    }

    /* função para inserir uma nova categoria no banco de dados */
    public function insert($descricao){

        /* verifica se os dados não são nulos */
        if($descricao){

            /* criando o model */
            $this->categoria_model->__constructor(['descricao_categoria' => $descricao]);


            $this->db->insert("categoria", $this->categoria_model);

            /* Adiconando mensagem de sucesso na sessão */
            $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-success'>Categoria adicionada com sucesso</div>");

        }else{
            /* Adiconando mensagem de erro na sessão */
            $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-danger'>Erro ao adicionar categoria, certifique que preencheu os dados corretamente</div>");
        }
    }

    /* função para deletar uma categoria do banco de dados */
    public function delete($id_categoria = NULL){

        /* verifica se os dados foram enviados */
        if($id_categoria){

            /* faz a consulta no bd para verificar se existe */
            /* verifica se foi encontrado algum registro */

            if($this->getCategoriaByID($id_categoria)){

                /* verifica se o registro foi apagado */
                if($this->db->delete("categoria", ["id_categoria" => $id_categoria]))
                    $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-success'>Categoria apagada com sucesso</div>");
                else
                    $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-danger'>Não foi possível excluir a categoria</div>");
            }else
                $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-danger'>Não foi possível excluir a categoria, certifique-se que preencheu todos os campos corretamente</div>");
            
            
        }else
            $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-danger'>Não foi possível excluir a categoria, certifique-se que preencheu todos os campos corretamente</div>");
        
    }

    /* função para atualizar uma categoria do banco de dados */
    public function update($descricao_categoria = NULL, $id_categoria = NULL){

        /* verifica se os dados foram preenchidos */
        if($descricao_categoria && $id_categoria){

            echo $id_categoria;

            /* criando o model de categoria */
            $this->categoria_model->__constructor([
                "descricao_categoria" => $descricao_categoria,
                "id_categoria" => $id_categoria
            ]);

            /* atualizando as informações */
            if($this->db->update("categoria", $this->categoria_model, "id_categoria = $id_categoria"))

                /* Adiconando mensagem de sucesso na sessão */
                $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-success'>Categoria atualizada com sucesso</div>");

            else
                $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-danger'>Erro ao atualizar categoria</div>");
        }else
            $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-danger'>Erro ao atualizar categoria, certifique-se que preencheu todos os campos corretamente</div>");
    }

}


?>