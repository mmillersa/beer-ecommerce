<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Model de controle do usuario */
Class Usuario_model extends CI_Model{

    /* Função para cadastrar o usuário no sistema */
    public function cadastrarUsuario ($dados){

        /* Verifica se os dados foram recebidos */
        if($dados){

            /* tentando cadastrar o usuário */
            if($this->db->insert("usuario", $dados))
                $this->session->set_flashdata('cadastrar_usuario', "");
            else
                $this->session->set_flashdata('cadastrar_usuario', "");  
                
        }
        
    }
}


?>