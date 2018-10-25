<?php

/* Não permitindo que a URL seja acessada diretamente */
defined('BASEPATH') OR exit('No direct script access allowed');

Class Auth_dao extends MY_Dao{

    public function auth_user($dados){

        /* Definindo um limite */
        $this->db->limit(1);

        /* Condição do cpf */
        $this->db->where($dados["cpf"], $dados["cpf"]);
                            
        /* Condição da senha */
        $this->db->where("senha", $dados["senha"]);
        
        /* Requisitando */
        return $this->db->get("usuario");
    }

    public function auth_adm($dados){

        /* Definindo um limite */
        $this->db->limit(1);

        /* Condição do cpf */
        $this->db->where("cpf_adm", $dados["cpf"]);
            
        /* Condição da senha */
        $this->db->where("senha_adm", $dados["senha"]);

        /* Requisitando */
        return $this->db->get("adm");
    }

}


?>