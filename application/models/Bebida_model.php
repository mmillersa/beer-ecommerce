<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Model de autenticação do sistema */
Class Bebida_model extends CI_Model{

    /* função para retornar uma categoria */
    public function getCategoriaByID($id = NULL){

        if($id){
            /* Condição do id */
            $this->db->where("id_categoria", $id);

            /* Definindo um limite */
            $this->db->limit(1);

            /* Requisitando e retornando */
            $query = $this->db->get("categoria");
            return $query->row();
        }

    }

    /* função para adicionar uma nova categoria de bebida */
    public function addCategoria($dados = NULL){

        /* verifica se os dados não são nulos */
        if($dados){
            $this->db->insert("categoria", ["descricao_categoria" => $dados["nome-categoria"]]);
        }
        
        /* Adiconando mensagem de sucesso na sessão */
        $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-success'>Categoria adicionada com sucesso</div>");

    }

    /* função para recuperar categorias do banco de dados */
    public function getCategorias(){

        /* recuperando as categorias */
        $categorias = $this->db->get('categoria');

        /* Verificando se retornou algo e guardando o resultado */
        if($categorias) $categorias->result_array();
        
        /* retornando o array final */
        return $categorias->result_array;
        
    }

    /* função para atualizar categorias do banco de dados */
    public function atualizarCategoria($dados = NULL){
        
        /* verifica se os dados foram preenchidos */
        if($dados){
            $id = $dados['id'];
            $nome = $dados['nome'];

            /* atualizando as informações */
            if($this->db->update("categoria", array("descricao_categoria" => $nome), "id_categoria = $id"))

                /* Adiconando mensagem de sucesso na sessão */
                $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-success'>Categoria atualizada com sucesso</div>");

            else
                $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-danger'>Erro ao atualizar categoria</div>");
        }
    }

    /* função para apagar uma categoria */
    public function apagarCategoria($id = NULL){

        /* verifica se os dados foram enviados */
        if($id){
            
            /* faz a consulta no bd para verificar se existe */
            $query = $this->getCategoriaByID($id);

            /* verifica se foi encontrado algum registro */
            if($query){

                /* verifica se o registro foi apagado */
                if($this->db->delete("categoria", array("id_categoria" => $id))){
                    $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-success'>Categoria apagada com sucesso</div>");
                }
            }
            $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-danger'>Não foi possível excluir a categoria</div>");
        }

    }


    /*************************************************/


    /* função para retornar uma marca */
    public function getMarcaByID($id = NULL){

        if($id){
            /* Condição do id */
            $this->db->where("id_marca", $id);

            /* Definindo um limite */
            $this->db->limit(1);

            /* Requisitando e retornando */
            $query = $this->db->get("marca");
            return $query->row();
        }

    }

    /* função para adicionar uma nova marca */
    public function addMarca($dados = NULL){

        /* verifica se os dados não são nulos */
        if($dados){
            $this->db->insert("marca", ["nome_marca" => $dados["nome-marca"]]);
        }
        
        /* Adiconando mensagem de sucesso na sessão */
        $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-success'>Marca adicionada com sucesso</div>");

    }

    /* função para recuperar marcas do banco de dados */
    public function getMarcas(){

        /* recuperando as marcas */
        $marcas = $this->db->get('marca');

        /* Verificando se retornou algo e guardando o resultado */
        if($marcas) $marcas->result_array();
        
        /* retornando o array final */
        return $marcas->result_array;
        
    }

    /* função para atualizar marcas do banco de dados */
    public function atualizarMarca($dados = NULL){
        
        /* verifica se os dados foram preenchidos */
        if($dados){
            $id = $dados['id'];
            $nome = $dados['nome'];

            /* atualizando as informações */
            if($this->db->update("marca", array("nome_marca" => $nome), "id_marca = $id"))

                /* Adiconando mensagem de sucesso na sessão */
                $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-success'>Marca atualizada com sucesso</div>");

            else
                $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-danger'>Erro ao atualizar marca</div>");
        }
    }

    /* função para apagar uma marca */
    public function apagarMarca($id = NULL){

        /* verifica se os dados foram enviados */
        if($id){
            
            /* faz a consulta no bd para verificar se existe */
            $query = $this->getMarcaByID($id);

            /* verifica se foi encontrado algum registro */
            if($query){

                /* verifica se o registro foi apagado */
                if($this->db->delete("marca", array("id_marca" => $id))){
                    $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-success'>Marca apagada com sucesso</div>");
                }
            }
            $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-danger'>Não foi possível excluir a marca</div>");

        }

    }


    
    /****************************************************/

    /* função para retornar uma bebida */
    public function getBebidaByName($nome = NULL){

        if($nome){
            /* Condição do id */
            $this->db->where("nome_tipo_bebida", $nome);

            /* Definindo um limite */
            $this->db->limit(1);

            /* Requisitando e retornando */
            $query = $this->db->get("tipo_bebida");
            return $query->row();
        }

    }



    /* função para adicionar uma nova bebida */
    public function addBebida($dados = NULL){

        /* verifica se os dados foram recebidos */
        if($dados){

            /* verifica se já não existe uma bebida com este nome */

            if(!$this->getBebidaByName($dados["nome_tipo_bebida"])){

                /* preparando o array para inserção dos dados na tabela de tipos_bebida */

                $insert["nome_tipo_bebida"] = $dados["nome_tipo_bebida"];
                $insert["ml"] = $dados["ml"];
                $insert["preco_bebida"] = $dados["preco_bebida"];
                $insert["descricao_bebida"] = $dados["descricao_bebida"];
                $insert["teor_alcoolico"] = $dados["teor_alcoolico"];
                $insert["marca_id_marca"] = $dados["marca_id_marca"];


                /* inserindo a bebida no banco de dados */
                $this->db->insert("tipo_bebida", $insert);
                
                /* recuperando o id que foi criado */
                $id = $this->db->insert_id();

                /* inserindo a bebida na sua tabela específica */
                if($dados['tipo_bebida'] == "cerveja")
                    $this->db->insert("cerveja", ["tipo_bebida_id" => $id]);

                /* upando as imagens */
                $this->uploadImgsBebida($id);
                
                /* adicionando as categorias da bebida */
                foreach($dados['categorias'] as $categoria)
                    $this->db->insert("tipo_bebida_has_categoria", ["id_tipo_bebida" => $id, "id_categoria" => $categoria]);

                /* criando o estoque de produtos */
                for($i = 0; $i < $dados['estoque']; $i++)
                    $this->db->insert("bebida", ["id_tipo_bebida" => $id]);


                $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-success'>Bebida adicionada com sucesso! Agora você pode gerenciá-la quando quiser.</div>");


            }

            else 
                $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-danger'>Já existe uma bebida cadastrada com este nome, tente adicionar mais dela em seu estoque ou escolha outro nome</div>");

        }

        else
            $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-danger'>Preencha todos os campos para adicionar uma nova bebida</div>");

        
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

            $name = date("U");
            $config['file_name'] = $name."png";

            /* inicializando a biblioteca */
            $this->upload->initialize($config);

            /* upando a imagem*/
            $this->upload->do_upload("img$i");       

            /* inserindo os dados no banco de dados */
            $this->db->insert("imagem", ["src" => "/beer-ecommerce/upload/$name.png", "id_tipo_bebida" => $id]);
            
        }

    }


}


?>