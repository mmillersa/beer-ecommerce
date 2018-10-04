<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Model de autenticação do sistema */
Class Auth_model extends CI_Model{

    /* Função para realizar autenticação no sistema */
    public function auth($dados = NULL){

        /* verifica se os dados foram recebidos */
        if($dados){

            /* Definindo um limite */
            $this->db->limit(1);

            /* Verifica se a autenticação é de um usuário comum ou ADM */
            if(($dados["tipo_auth"] == "user")){

                /* Condição do cpf */
                $this->db->where($dados["cpf"], $dados["cpf"]);
                    
                /* Condição da senha */
                $this->db->where("senha", $dados["senha"]);
                
                /* Requisitando */
                $query = $this->db->get("usuario");

            }else{
                
                /* Condição do cpf */
                $this->db->where("cpf_adm", $dados["cpf"]);
                    
                /* Condição da senha */
                $this->db->where("senha_adm", $dados["senha"]);

                /* Requisitando */
                $query = $this->db->get("adm");
                
            }

            
            /* verifica se encontrou algum usuário */
            if($query->row()){

                /* inserindo dados na sessão */

                if($dados["tipo_auth"] == "user") $this->session->set_userdata("user", $query->result_array()[0]);
                if($dados["tipo_auth"] == "adm") $this->session->set_userdata("adm", $query->result_array()[0]);

                /* retornando mensagem de sucesso */
                return true;
            }

            /* inserir mensagem de erro e retornar falso */
            $this->session->set_flashdata('auth', "<div class = 'alert alert-danger'>Usuário e/ou senha incorretos</div>");
            return false;
        }
    }
}


?>