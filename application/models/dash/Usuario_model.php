<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Model de controle do usuario */
Class Usuario_model extends CI_Model{

    /* Função para retornar um usuário do db */
    public function getUserByCPF($cpf = NULL, $tipo_user = NULL){

        /* Verifica se foi passado um cpf e um tipo de usuário (adm ou normal) */
        if($cpf && $tipo_user){

            /* Definindo um limite da query */
            $this->db->limit(1);

            if($tipo_user == "adm"){
                /* em caso de usuário adm */
                /* Condição do id */
                $this->db->where("cpf_adm", $cpf);

                /* requisitando e retornando */
                $query = $this->db->get("adm");
            }else{

                /* em caso de usuário comum */
                /* Condição do id */
                $this->db->where("cpf", $cpf);

                /* requisitando e retornando */
                $query = $this->db->get("usuario");
            }

            /* Retornando o resultado */
            return $query->row();
        }
    
        
    }

    /* Função para cadastrar o usuário no sistema */
    public function cadastrarUsuario ($dados){

        /* Verifica se os dados foram recebidos */
        if($dados){

            /* verifica se o usuário já existe */
            if(!$this->getUserByCPF($dados["cpf"], "comum")){

                /* tentando cadastrar o usuário */
                if($this->db->insert("usuario", $dados))
                    $this->session->set_flashdata('cadastrar_usuario', "");
                else
                    $this->session->set_flashdata('cadastrar_usuario', "");
            }

            /* Caso já existe um usuário, retornar a mensagem de erro */
            $this->session->set_flashdata('cadastrar_usuario', "");
        }
        
    }
}


?>