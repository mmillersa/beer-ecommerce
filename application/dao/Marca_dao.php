<?php

/* Não permitindo que a URL seja acessada diretamente */
defined('BASEPATH') OR exit('No direct script access allowed');

/* Classe responsável por se conectar ao banco de dados com a tabela marca */

Class Marca_dao extends MY_Dao{

    /* construtor da classe */
    public function __construct(){

        /* carregando os models e DAOs necessários */
		parent::__construct();
        $this->load->model("dash/Marca_model", "marca_model");
    }

    /* função para recuperar marcas do banco de dados */
    public function getMarcas(){

        /* recuperando as marcas */
        $marcas = $this->db->get('marca');

        /* Verificando se retornou algo e guardando o resultado */
        if($marcas) $marcas->result_array();
        
        /* retornando o array final */
        return $marcas->result_array;
        
    }

    /* função para recuperar uma marca pelo ID */
    public function getMarcaByID($id = NULL){

        if($id)
            return $this->db->get_where("marca", ["id_marca" => $id])->result_array();
    }

    /* função para inserir uma nova marca no banco de dados */
    public function insert($nome){

        /* verifica se os dados não são nulos */
        if($nome){

            /* criando o model */
            $this->marca_model->__constructor(['nome_marca' => $nome]);


            $this->db->insert("marca", $this->marca_model);

            /* Adiconando mensagem de sucesso na sessão */
            $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-success'>Marca adicionada com sucesso</div>");

        }else{
            /* Adiconando mensagem de erro na sessão */
            $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-danger'>Erro ao adicionar marca, certifique que preencheu os dados corretamente</div>");

        }
    }

    /* função para deletar uma marca do banco de dados */
    public function delete($id_marca = NULL){

        /* verifica se os dados foram enviados */
        if($id_marca){

            /* faz a consulta no bd para verificar se existe */
            /* verifica se foi encontrado algum registro */

            if($this->getMarcaByID($id_marca)){

                /* verifica se o registro foi apagado */
                if($this->db->delete("marca", ["id_marca" => $id_marca]))
                    $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-success'>Marca apagada com sucesso</div>");
                else
                    $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-danger'>Não foi possível excluir a marca</div>");
            }else
                $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-danger'>Não foi possível excluir a marca, certifique-se que preencheu todos os campos corretamente</div>");
            
            
        }else
            $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-danger'>Não foi possível excluir a marca, certifique-se que preencheu todos os campos corretamente</div>");
        
    }

    /* função para atualizar uma marca do banco de dados */
    public function update($nome_marca = NULL, $id_marca = NULL){

        /* verifica se os dados foram preenchidos */
        if($nome_marca && $id_marca){

            echo $id_marca;

            /* criando o model de marca */
            $this->marca_model->__constructor([
                "nome_marca" => $nome_marca,
                "id_marca" => $id_marca
            ]);

            /* atualizando as informações */
            if($this->db->update("marca", $this->marca_model, "id_marca = $id_marca"))

                /* Adiconando mensagem de sucesso na sessão */
                $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-success'>Marca atualizada com sucesso</div>");

            else
                $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-danger'>Erro ao atualizar marca</div>");
        }else
            $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-danger'>Erro ao atualizar marca, certifique-se que preencheu todos os campos corretamente</div>");
    }

}


?>