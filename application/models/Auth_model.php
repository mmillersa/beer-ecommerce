<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Model de autenticação do sistema */
Class Auth_model extends CI_Model{

    /* Função para realizar autenticação no sistema */
    public function auth($dados){

        /* verifica se os dados foram recebidos */
        if($dados){
            
            /* Condição do cpf */
            $this->db->where("cpf", $dados["cpf"]);
                
            /* Condição da senha */
            $this->db->where("senha", $dados["senha"]);

            /* Definindo um limite */
            $this->db->limit(1);

            /* Verifica se a autenticação é de um usuário comum ou ADM */

            if(($dados["tipo_auth"] == "user"))
                /* Requisitando */
                $query = $this->db->get("usuario");

            else
                /* Requisitando */
                $query = $this->db->get("adm");

            /* verifica se encontrou algum usuário */
            if($query->row()){

                /* inserindo dados na sessão */

                if($dados["tipo_auth"] == "user") $this->session->set_userdata("user", $query->result_array()[0]);
                if($dados["tipo_auth"] == "adm") $this->session->set_userdata("adm", $query->result_array()[0]);

                /* retornando mensagem de sucesso */
                return true;
            }

            /* inserir mensagem de erro e retornar falso */
            $this->session->set_flashdata('auth', "");
            return false;
        }
    }
}


?>