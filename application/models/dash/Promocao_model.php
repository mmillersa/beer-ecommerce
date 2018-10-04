<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Model de promoções do sistema */
Class Promocao_model extends CI_Model{

    /* função para adicionar uma nova promoção no sistema */
    public function addPromocao($dados){

        /* verifica se os dados foram passados  */
        if($dados){

            /* adicionando dados na tabela promocao */
            $this->db->insert("promocao", 
            ["desconto" => $dados["desconto"], "status" => "checked", 
            "apelido_promocao" => $dados["apelido_promocao"]]);

            /* recuperando o id que foi criado */
            $id = $this->db->insert_id();

            /* fazendo as relações com as bebidas marcadas */

            /* verifica se as opções que estão marcadas e adiciona a relação */
            foreach($dados['bebidas_desconto'] as $bebida)
                
                /* inserindo a relação */
                $this->db->insert("promocao_has_tipo_bebida", 
                ["id_tipo_bebida" => (int)$bebida, "id_promocao" => $id]);
                
            /* Adicionando mensagen de sucesso na sessão */
            $this->session->set_flashdata('gravar_dados_promocoes', "<div class = 'alert alert-success'>Promoção adicionada com sucesso.</div>");
            
        }else{
            /* Adicionando mensagen de erro na sessão */
            $this->session->set_flashdata('gravar_dados_promocoes', "<div class = 'alert alert-danger'>Erro ao adicionar promoção, verifica se todos os campos foram preenchidos corretamente.</div>");
        }
    }
}


?>