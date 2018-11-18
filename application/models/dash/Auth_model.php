<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Model de autenticação do sistema */
Class Auth_model extends CI_Model{

    /* Função para realizar autenticação no sistema */
    public function auth($dados = NULL){

        /* verifica se os dados foram recebidos */
        if($dados){

            /* Carregando o DAO de Auth */
            $this->load->dao("auth_dao", "", true);

            /* Verifica se a autenticação é de um usuário comum ou ADM */
            if(($dados["tipo_auth"] == "user"))
                $retorno = $this->auth_dao->auth_user($dados);

            else
                $retorno = $this->auth_dao->auth_adm($dados);
            

            
            /* verifica se encontrou algum usuário */
            if($retorno->row()){

                /* inserindo dados na sessão */

                if($dados["tipo_auth"] == "user") $this->session->set_userdata("user", $retorno->result_array()[0]);
                if($dados["tipo_auth"] == "adm") $this->session->set_userdata("adm", $retorno->result_array()[0]);

                /* redirecionando */
                redirect("dash/base");
            }

            /* inserir mensagem de erro e retornar falso */
            $this->session->set_flashdata('auth', "<div class = 'alert alert-danger'>Usuário e/ou senha incorretos</div>");
            redirect("dash/");
        }
    }
}


?>