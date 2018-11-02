<?php

/* Não permitindo que a URL seja acessada diretamente */
defined('BASEPATH') OR exit('No direct script access allowed');

/* Classe responsável por se conectar ao banco de dados com a tabela promoção */

Class Promocao_dao extends MY_Dao{

    public function get(){
        /* fazendo a requisição */
        return $this->db->get("promocao");
    }

    public function get_por_apelido($dados){
       return $this->db->get_where("promocao", ["apelido_promocao" => $dados['apelido_promocao']]);
    }

    public function get_por_id(){
        return $this->db->get_where("promocao", "id_promocao = $id");
    }

    public function get_relacoes(){
        return $this->db->get_where("promocao_has_tipo_bebida", "id_promocao = $id");
    }

    public function insert($dados){
        $this->db->insert("promocao", 
        ["desconto" => $dados["desconto"], "status" => "checked", 
        "apelido_promocao" => $dados["apelido_promocao"]]);
    }

    public function insert_relacao($bebida, $id){
        $this->db->insert("promocao_has_tipo_bebida", 
            ["id_tipo_bebida" => (int)$bebida, "id_promocao" => $id]);
    }

    public function recupera_ultimo_id(){
        return $this->db->insert_id();
    }

    public function remove_promocoes_atuais(){
        $this->db->where("id_promocao = $id");
        $this->db->delete("promocao_has_tipo_bebida");
    }

    public function adicionar_novas_bebidas($value, $id){

        /* iniciando a query */
        $query = "INSERT INTO promocao_has_tipo_bebida (id_tipo_bebida, id_promocao)
        SELECT $value, $id FROM DUAL WHERE NOT EXISTS (
            SELECT * FROM promocao_has_tipo_bebida WHERE id_tipo_bebida = $value AND id_promocao = $id
        );";

        /* executando a query */
        $this->db->query($query);
    }

    public function att_promocao($id, $dados){

        /* gerando array de update */
        $update = [
            "desconto" => $dados['desconto'],
            "apelido_promocao" => $dados['apelido_promocao']
        ];

        return $this->db->update("promocao", $update, "id_promocao = $id");
    }
    
    public function att_status_promocao($id, $status){
        $this->db->update("promocao", ["status" => $status], "id_promocao = $id" );
    }

}


?>