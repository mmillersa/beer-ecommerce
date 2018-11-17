<?php

/* Não permitindo que a URL seja acessada diretamente */
defined('BASEPATH') OR exit('No direct script access allowed');

/* Classe responsável por se conectar ao banco de dados com a tabela promoção */

Class Promocao_dao extends MY_Dao{

    /* Construtor do DAO de promoções */
    public function __construct(){

        /* carregando o DAO de promoção */
        parent::__construct();
        $this->load->model("dash/Promocao_model", "promocao_model");
        
    }

    /* função para adicionar uma nova promoção no sistema */
    public function addPromocao($dados = NULL){

        /* verifica se os dados foram passados  */
        if($dados){

            /* verifica se a porcentagem é maior que 0 */
            if($dados['desconto'] > 0){

                /* verifica se já existe um desconto com esse nome */
                $exists_promocao = $this->db->get_where("promocao", ["apelido_promocao" => $dados['apelido_promocao']]);

                if(!$exists_promocao->result()){


                    /* criando o model de promoção */
                    $this->promocao_model->__constructor($dados);
                    
                    /* adicionando dados na tabela promocao */
                    $this->db->insert("promocao", $this->promocao_model);

                    /* recuperando o id que foi criado */
                    $id = $this->db->insert_id();

                    /* fazendo as relações com as bebidas marcadas */

                    /* verifica se as opções que estão marcadas e adiciona a relação */
                    foreach($this->promocao_model->bebidas_desconto as $bebida)
                        
                        /* inserindo a relação */
                        $this->db->insert("promocao_has_tipo_bebida", 
                            ["id_bebida" => (int)$bebida, "id_promocao" => $id]);
    
                    /* Adicionando mensagen de sucesso na sessão */
                    $this->session->set_flashdata('gravar_dados_promocoes', "<div class = 'alert alert-success'>Promoção adicionada com sucesso.</div>");
               
                }else{
                    /* Adicionando mensagen de erro na sessão */
                    $this->session->set_flashdata('gravar_dados_promocoes', "<div class = 'alert alert-danger'>Erro ao adicionar promoção, já existe uma cadastrada com este apelido.</div>");
                }

            }else{
                /* Adicionando mensagen de erro na sessão */
                $this->session->set_flashdata('gravar_dados_promocoes', "<div class = 'alert alert-danger'>Erro ao adicionar promoção, o desconto tem que ser superior à 0.</div>");
            }
            
        }else{
            /* Adicionando mensagen de erro na sessão */
            $this->session->set_flashdata('gravar_dados_promocoes', "<div class = 'alert alert-danger'>Erro ao adicionar promoção, verifica se todos os campos foram preenchidos corretamente.</div>");
        }
    }

    /* função para atualizar uma promocão */
    public function attPromocao($dados = NULL, $id = NULL){

        $dados['id_promocao'] = $id;

        /* verifica se os dados e o id foram preenchidos */
        if($dados && $id){

            /* removendo a promoção das bebidas atuais atuais */
            $this->db->where("id_promocao = $id");
            $this->db->delete("promocao_has_tipo_bebida");
            
            /* adicionando as novas bebidas */
            foreach($dados['bebidas_desconto'] as $key => $value)

                /* executando a query */
                $this->db->query("INSERT INTO promocao_has_tipo_bebida (id_bebida, id_promocao)
                SELECT $value, $id FROM DUAL WHERE NOT EXISTS (
                    SELECT * FROM promocao_has_tipo_bebida WHERE id_bebida = $value AND id_promocao = $id
                );");

            
            /* Criando o novo model */
            $this->promocao_model->__constructor($dados);

            /* atualizando as informações */
            if($this->db->update("promocao", $this->promocao_model, "id_promocao = $id"))

                /* Adicionando mensagem de sucesso na sessão */
                $this->session->set_flashdata('gravar_dados_promocoes', "<div class = 'alert alert-success'>Promoção atualizada com sucesso</div>");

            else
                $this->session->set_flashdata('gravar_dados_promocoes', "<div class = 'alert alert-danger'>Erro ao atualizar promoção, certifique-se que preencheu todos os dados corretamente.</div>");
                
        }else{
            $this->session->set_flashdata('gravar_dados_promocoes', "<div class = 'alert alert-danger'>Erro ao atualizar promoção, certifique-se que preencheu todos os dados corretamente.</div>");
        }
    }

    /* função para recuperar as promoções do banco de dados */
    public function getPromocoes(){

        /* retornando os dados */
        return $this->db->get("promocao")->result_array();

    }

    /* função para recuperar uma promoção específica */
    public function getPromocaoByID($id = NULL){
        /* verificando se existe um id */
        if($id){

            /* Definindo um limite */
            $this->db->limit(1);

            /* iniciando requisição */
            $promocao = $this->db->get_where("promocao", "id_promocao = $id");

            /* recuperando as relações de bebidas e promoções */
            $relacoes = $this->db->get_where("promocao_has_tipo_bebida", "id_promocao = $id");


            /* retornando o array */
            return array(['promocao' => $promocao->result_array(), 'relacoes' => $relacoes->result_array()]);
            
        }
    }

    /* função para atualizar status de uma promoção */
    public function attStatusPromocao($id = NULL, $status = NULL ){
        
        /* verifica se os dados foram enviados */
        if($id && $status){
            
            /* verificando qual o status foi enviado */
            $status = ($status == "checked") ? "unchecked" : "checked";

            /* chamando o update */
            $this->db->update("promocao", ["status" => $status], "id_promocao = $id" );

        }   

    }

}


?>
