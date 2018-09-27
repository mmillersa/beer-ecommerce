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

    /* função para retornar uma bebida específica */
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

    /* função para retornar uma bebida específica pelo ID */
    public function getBebidaByID($id = NULL){

        if($id){
            /* Condição do id */

            $this->db->join("marca", "marca.id_marca = tipo_bebida.marca_id_marca", "inner");
            $this->db->where("tipo_bebida.id_tipo_bebida", $id);

            /* Definindo um limite */
            $this->db->limit(1);

            /* Requisitando */
            $query = $this->db->get("tipo_bebida");
            $query = $query->result_array();

            /* verificando a quantidade em estoque */
            $this->db->where("id_tipo_bebida= $id");
            $em_estoque = $this->db->count_all_results("bebida");
            $query[0]["em_estoque"] = $em_estoque;

            /* verificando as categorias relacionadas */
            $this->db->select("descricao_categoria, tipo_bebida_has_categoria.id_categoria");
            $this->db->from("tipo_bebida_has_categoria");
            $this->db->join("categoria", "categoria.id_categoria = tipo_bebida_has_categoria.id_categoria");
            $this->db->where("id_tipo_bebida = $id");

            /* Requisitando as categorias  */
            $categorias = $this->db->get();
            $categorias = $categorias->result_array();
            
            /* adicionando as categorias no retorno */ 
            $query[0]["categorias"] = $categorias;

            /* verificando as imagens */
            $this->db->select("src");
            $this->db->from("imagem");
            $this->db->where("id_tipo_bebida = $id");

            /* Requisitando as categorias  */
            $imagens = $this->db->get();
            $imagens = $imagens->result_array();
            
            /* adicionando as categorias no retorno */ 
            $query[0]["imagens"] = $imagens;


            return $query;
        }

    }

    /* função para retornar todas as bebidas do estoque (ou algumas em caso de filtro) */
    public function getBebidas(){

        /* iniciando as query das bebidas */
        $this->db->select("*");
        $this->db->from("tipo_bebida");
        $this->db->join("marca", "marca.id_marca = tipo_bebida.marca_id_marca", "inner");

        $bebidas = $this->db->get();

        /* Verificando se retornou algo e guardando o resultado */
        if($bebidas) $bebidas->result_array();
        $bebidas = $bebidas->result_array;
        
        for($i = 0; $i < count($bebidas); $i++){
            

            /* verificando quantas existem no estoque */
            $this->db->where("id_tipo_bebida=".$bebidas[$i]["id_tipo_bebida"]);
            $em_estoque = $this->db->count_all_results("bebida");
            $bebidas[$i]["em_estoque"] = $em_estoque;

            /* verificando a cor da linha do estoque */
            if($em_estoque < 10) $bebidas[$i]["cor_estoque"] = "estoque-vermelho";
            else if($em_estoque < 50) $bebidas[$i]["cor_estoque"] = "estoque-laranja";
            else $bebidas[$i]["cor_estoque"] = "estoque-verde";
        
        }

        /* retornando o array */
        return $bebidas;


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
                $insert["tipo_bebida"] = $dados['tipo_bebida'];


                /* inserindo a bebida no banco de dados */
                $this->db->insert("tipo_bebida", $insert);
                
                /* recuperando o id que foi criado */
                $id = $this->db->insert_id();

                /* upando as imagens */
                $this->uploadImgsBebida($id);
                
                /* adicionando as categorias da bebida */
                foreach($dados['categorias'] as $categoria)
                    $this->db->insert("tipo_bebida_has_categoria", ["id_tipo_bebida" => $id, "id_categoria" => $categoria]);

                /* criando o estoque de produtos */
                for($i = 0; $i < $dados['estoque']; $i++)
                    $this->db->insert("bebida", ["id_tipo_bebida" => $id]);

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

    /* função para atualizar uma bebida */
    public function atualizartBebida($dados = NULL, $id = NULL){


        /* verifica se os dados foram preenchidos */
        if($dados){

            /* gerando array de update */
            $update = [
                "nome_tipo_bebida" => $dados['nome_tipo_bebida'],
                "ml" => $dados['ml'],
                "preco_bebida" => $dados['preco_bebida'],
                "descricao_bebida" => $dados['descricao_bebida'],
                "teor_alcoolico" => $dados['teor_alcoolico'],
                "marca_id_marca" => $dados['marca_id_marca'],
                "tipo_bebida" => $dados['tipo_bebida']
            ];

            /* removendo suas categorias atuais */
            $this->db->where("id_tipo_bebida = $id");
            $this->db->delete("tipo_bebida_has_categoria");
            

            /* adicionando as novas categorias */
            foreach($dados['categorias'] as $key => $value){

                /* iniciando a query */
                $query = " INSERT INTO tipo_bebida_has_categoria (id_tipo_bebida, id_categoria)
                    SELECT $id, $value FROM DUAL WHERE NOT EXISTS (
                        SELECT * FROM tipo_bebida_has_categoria WHERE id_tipo_bebida = $id AND id_categoria = $value
                    ); ";

                /* executando a query */
                $this->db->query($query);
            }


            /* atualizando as informações */
            if($this->db->update("tipo_bebida", $update, "id_tipo_bebida = $id"))
                /* Adicionando mensagem de sucesso na sessão */
                $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-success'>Bebida atualizada com sucesso</div>");

            else
                $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-danger'>Erro ao atualizar bebida</div>");
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
            $this->db->insert("imagem", ["src" => "/beer-ecommerce/upload/".$config['file_name'], "id_tipo_bebida" => $id]);
            
        }

    }



    /***************************************************/

    /* função para retornar o estoque de uma bebida */
    public function getEstoque($id = NULL){
    
        /* verifica se foi passado um id */
        if($id){
            /* Condição do id */
            $this->db->where("id_tipo_bebida", $id);

            /* Requisitando e retornando */
            $query = $this->db->get("bebida");
            return $query->result_array();
        }
    }

    /* função para retornar um item do estoque por ID */
    public function getEstoqueByID($id = NULL){

        /* verifica se os dados foram enviados */
        if($id){
            /* Condição do id */
            $this->db->where("id_bebida", $id);

            /* Definindo um limite */
            $this->db->limit(1);

            /* Requisitando e retornando */
            $query = $this->db->get("bebida");
            return $query->row();
        }

    
    }

    /* função para apagar um item do estoque */
    public function apagarEstoque($id = NULL){

        /* verifica se os dados foram enviados */
        if($id){
            
            /* faz a consulta no bd para verificar se existe */
            $query = $this->getEstoqueByID($id);

            /* verifica se foi encontrado algum registro */
            if($query){

                /* verifica se o registro foi apagado */
                if($this->db->delete("bebida", array("id_bebida" => $id)))
                    $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-success'>Bebida excluída do estoque com sucesso</div>");
                else
                    $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-danger'>Não foi possível excluir a bebida do estoque</div>");
                
            }

        }
    }
    
    /* função para adicionar items ao estoque */
    public function addEstoque($quantidade = NULL, $id = NULL){
        
        /* verifica se os dados foram preenchidos */
        if($quantidade && $id){

            /* iniciando a query */
            $query = "INSERT INTO bebida (id_tipo_bebida) VALUES ";

            /* iniciando laço de repetição para adicionar a quantidade */
            for($i = 0; $i < $quantidade; $i++)
                $query .= "($id),";
                
            /* tirando a virgula da ultima posição */
            $query[-1] = " ";

            /* executando a query */
            if($this->db->query($query))
                $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-success'>Bebidas adicionadas ao estoque</div>");
            else
                $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-danger'>Erro ao adicionar bebidas ao estoque</div>");

        }else{
            $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-danger'>Preencha os campos para adicionar bebidas ao estoque</div>");
        }

    }

}


?>