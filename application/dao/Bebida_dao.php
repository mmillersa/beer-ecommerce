<?php

/* Não permitindo que a URL seja acessada diretamente */
defined('BASEPATH') OR exit('No direct script access allowed');

/* Classe responsável por se conectar ao banco de dados com a tabela bebida */

Class Bebida_dao extends MY_Dao{

    /* construtor da classe */
    public function __construct(){

        /* carregando os models necessários */
		parent::__construct();
        $this->load->model("dash/Bebida_model", "bebida_model");
    }

    /* função para retornar todas as bebidas do estoque (ou algumas em caso de filtro) */
    public function getBebidas(){

        /* iniciando as query das bebidas */
        $this->db->select("*");
        $this->db->from("bebida");
        $this->db->join("marca", "marca.id_marca = bebida.id_marca", "inner");

        $bebidas = $this->db->get();

        /* Verificando se retornou algo e guardando o resultado */
        if($bebidas) $bebidas->result_array();
        $bebidas = $bebidas->result_array;
        
        /* Código para verificação de quantidade de bebidas em estoque */
        for($i = 0; $i < count($bebidas); $i++){
        
            $em_estoque = $bebidas[$i]['qtd_estoque'];

            /* verificando a cor da linha do estoque */
            if($em_estoque < 10) $bebidas[$i]["cor_estoque"] = "estoque-vermelho";
            else if($em_estoque < 50) $bebidas[$i]["cor_estoque"] = "estoque-laranja";
            else $bebidas[$i]["cor_estoque"] = "estoque-verde";
        
        }

        /* retornando o array */
        return $bebidas;

    }

    /* função para retornar uma bebida específica por nome */
    public function getBebidaByName($nome = NULL){

        if($nome){

            /* Condição do id */
            $this->db->where("nome_bebida", $nome);

            /* Definindo um limite */
            $this->db->limit(1);

            /* Requisitando e retornando */
            $query = $this->db->get("bebida");
            return $query->row();
        }

    }

    /* função para retornar uma bebida específica pelo ID */
    public function getBebidaByID($id = NULL){

        /* verifica se foi passado um id */
        if($id){

            $this->db->join("marca", "marca.id_marca = bebida.id_marca", "inner");
            $this->db->where("bebida.id_bebida", $id);

            /* Definindo um limite */
            $this->db->limit(1);

            /* Requisitando */
            $query = $this->db->get("bebida");
            $query = $query->result_array();

            /* verificando as categorias relacionadas */
            $this->db->select("descricao_categoria, tipo_bebida_has_categoria.id_categoria");
            $this->db->from("tipo_bebida_has_categoria");
            $this->db->join("categoria", "categoria.id_categoria = tipo_bebida_has_categoria.id_categoria");
            $this->db->where("id_bebida = $id");

            /* Requisitando as categorias  */
            $categorias = $this->db->get();
            $categorias = $categorias->result_array();
            
            /* adicionando as categorias no retorno */ 
            $query[0]["categorias"] = $categorias;

            /* verificando as imagens */
            $this->db->select("src");
            $this->db->from("imagem");
            $this->db->where("id_bebida = $id");

            /* Requisitando as imagens  */
            $imagens = $this->db->get();
            $imagens = $imagens->result_array();
            
            /* adicionando as categorias no retorno */ 
            $query[0]["imagens"] = $imagens;

            /* retornando o resultado */
            return $query;
        }

    }

    /* função para adicionar uma nova bebida */
    public function insert($dados = NULL){

        /* verifica se os dados foram recebidos */
        if($dados){

            /* verifica se já não existe uma bebida com este nome */

            if(!$this->getBebidaByName($dados["nome_bebida"])){

                /* criando o model de bebida */
                $this->bebida_model->__constructor($dados);

                /* inserindo a bebida no banco de dados */
                $this->db->insert("bebida", $this->bebida_model);
                
                /* recuperando o id que foi criado */
                $id = $this->db->insert_id();

                /* upando as imagens */
                $this->uploadImgsBebida($id);
                
                /* adicionando as categorias da bebida */
                foreach($dados['categorias'] as $categoria)
                    $this->db->insert("tipo_bebida_has_categoria", ["id_bebida" => $id, "id_categoria" => $categoria]);

                /* Adicionando mensagen de sucesso na sessão */
                $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-success'>Bebida adicionada com sucesso! Agora você pode gerenciá-la quando quiser.</div>");
            }

            else
                /* Adicionando mensagen de erro na sessão */
                $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-danger'>Já existe uma bebida cadastrada com este nome, tente adicionar mais dela em seu estoque ou escolha outro nome</div>");
        }

        else
            /* Adicionando mensagen de erro na sessão */
            $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-danger'>Preencha todos os campos para adicionar uma nova bebida</div>");
    }

    /* função para atualizar uma bebida existente */
    public function update($dados = NULL){

        /* verifica se os dados foram preenchidos */
        if($dados){

            /* guardando o id da bebida */
            $id = $dados['id_bebida'];
    
            /* criando o model de bebida */
            $this->bebida_model->__constructor($dados);

            /* removendo as categorias atuais da bebida */
            $this->db->where("id_bebida = $id");
            $this->db->delete("tipo_bebida_has_categoria");
            

            /* adicionando as novas categorias */
            foreach($dados['categorias'] as $key => $value){

                /* iniciando a query */
                $query = " INSERT INTO tipo_bebida_has_categoria (id_bebida, id_categoria)
                    SELECT $id, $value FROM DUAL WHERE NOT EXISTS (
                        SELECT * FROM tipo_bebida_has_categoria WHERE id_bebida = $id AND id_categoria = $value
                    ); ";

                /* executando a query */
                $this->db->query($query);
            }


            /* atualizando as informações */
            if($this->db->update("bebida", $this->bebida_model, "id_bebida = $id"))
                /* Adicionando mensagem de sucesso na sessão */
                $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-success'>Bebida atualizada com sucesso</div>");

            else
                $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-danger'>Erro ao atualizar bebida</div>");
        }
    }

    /* função para atualizar o estoque de bebidas */
    public function attEstoque($dados = NULL){

        /* verifica se foram passados parâmetros */
        if($dados){

            /* caso para adicionar bebidas ao estoque */
            if($dados['tipo'] == 'add'){

                /* verificando se a quantidade informada é maior que 0 */
                if($dados['quantidade-add-estoque'] > 0){

                    /* total para adicionar */
                    $add = $dados['qtd_estoque'] + $dados['quantidade-add-estoque'];

                    /* atualizando */
                    $this->db->where('id_bebida', $dados['id_bebida']);
                    $this->db->update("bebida", ['qtd_estoque' => $add ]);

                    /* adicinando mensagem de sucesso */
                    $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-success'>Estoque atualizado com sucesso!</div>");


                }else{
                    $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-danger'>Erro ao atualizar estoque, você informou um valor inválido.</div>");

                }

            }

            /* caso para remover bebidas do estoque */
            else{
                /* verificando se a quantidade informada é maior que 0 */
                if($dados['quantidade-remove-estoque'] > 0 && $dados['quantidade-remove-estoque'] <= $dados['qtd_estoque']){

                    /* total para remover */
                    $remove = $dados['qtd_estoque'] - $dados['quantidade-remove-estoque'];

                    /* atualizando */
                    $this->db->where('id_bebida', $dados['id_bebida']);
                    $this->db->update("bebida", ['qtd_estoque' => $remove ]);

                    /* adicinando mensagem de sucesso */
                    $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-success'>Estoque atualizado com sucesso!</div>");

                }else{
                    $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-danger'>Erro ao atualizar estoque, você informou um valor inválido.</div>");

                }
            }

        }

    }

    /* função responsável por fazer o upload e inserir no banco de dados as imagens */
    private function uploadImgsBebida($id){

        /* carregando a biblioteca de upload */
        $this->load->library('upload');
        
        for($i = 1; $i < 5; $i++){

            /* definindo configurações do upload */
            $config['upload_path'] = './upload/';
            $config['allowed_types'] = '*';
            $config['max_size'] = 200000;
            $config['max_width'] = 3000;
            $config['max_height'] = 2000;

            $name = "img".rand().".png";
            $config['file_name'] = $name;

            /* inicializando a biblioteca */
            $this->upload->initialize($config);

            /* upando a imagem*/
            $this->upload->do_upload("img$i");       

            /* inserindo os dados no banco de dados */
            $this->db->insert("imagem", ["src" => "/beer-ecommerce/upload/".$config['file_name'], "id_bebida" => $id]);
            
        }

    }

    /* função para atualizar status de uma bebida */
    public function attStatusBebida($id = NULL, $status = NULL ){
        
        /* verifica se os dados foram enviados */
        if($id && $status){
            
            /* verificando qual o status foi enviado */
            $status = ($status == "checked") ? "unchecked" : "checked";
            
            /* chamando o update */
            $this->db->update("bebida", ["status_bebida" => $status], "id_bebida = $id" );
        }   
    }

}


?>