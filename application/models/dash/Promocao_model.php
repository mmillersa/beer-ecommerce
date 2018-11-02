<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Model de promoções do sistema */
Class Promocao_model extends CI_Model{

    /* Construtor do model de promoções */
    public function __construct(){

        /* carregando o DAO de promoção */
        parent::__construct();
        $this->load->dao("promocao_dao", "", true);
        
    }

    /* função para adicionar uma nova promoção no sistema */
    public function addPromocao($dados = NULL){

        /* verifica se os dados foram passados  */
        if($dados){

            /* verifica se a porcentagem é maior que 0 */
            if($dados['desconto'] > 0){

                /* verifica se já existe um desconto com esse nome */
                $promocao = $this->promocao_dao->get_por_apelido($dados);

                if(!$promocao->result()){
                
                    /* adicionando dados na tabela promocao */
                    $this->promocao_dao->insert($dados);

                    /* recuperando o id que foi criado */
                    $id = $this->promocao_dao->recupera_ultimo_id();

                    /* fazendo as relações com as bebidas marcadas */

                    /* verifica se as opções que estão marcadas e adiciona a relação */
                    foreach($dados['bebidas_desconto'] as $bebida)
                        
                        /* inserindo a relação */
                        $this->promocao_dao->insert_relacao($bebida, $id);
                        
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

        /* verifica se os dados e o id foram preenchidos */
        if($dados && $id){


            /* removendo a promoção das bebidas atuais atuais */
            $this->promocao_dao->remove_promocoes_atuais($id);
            
            /* adicionando as novas bebidas */
            foreach($dados['bebidas_desconto'] as $key => $value)
                $this->promocao_dao->adicionar_novas_bebidas($value, $id);



            /* atualizando as informações */
            if($this->promocao_dao->att_promocao($id, $dados))

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
        return $this->promocao_dao->get()->result_array();

    }

    /* função para recuperar uma promoção específica */
    public function getPromocaoByID($id = NULL){
        /* verificando se existe um id */
        if($id){

            /* Definindo um limite */
            $this->db->limit(1);

            /* iniciando requisição */
            $promocao = $this->promocao_dao->get_por_id();

            /* recuperando as relações de bebidas e promoções */
            $relacoes = $this->db->get_relacoes();


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
            $this->promocao_dao->att_status_promocao($id, $status);

        }   

    }
}


?>