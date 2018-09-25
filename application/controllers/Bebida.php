<?php
/* Não permitindo que a URL seja acessada diretamente */
defined('BASEPATH') OR exit('No direct script access allowed');

/* Controlador do model da página home */
class Bebida extends CI_Controller {
    
	
	/* primeira função que é chamada */
	public function index(){

        redirect("/");

    }

    /* função para carregar a página de gerenciamento de bebidas */
    public function gerenciar_bebidas(){

        /* verifica se o adm está logado */
        if(!$this->session->has_userdata("adm")) redirect("/");

        /* carrega o model da página bebidas */
        $this->load->model("bebida_model", "bebida");

        /* dados que serão passados como parâmetro */
        /* enviando como parâmetro a cor da ul */
        $data['cor_ul_gbebidas'] = 'ul-marcada';

        /* carrega a base da página e a tela de dashboard como padrão */
        $this->load->view("dash/base.php", $data);
        $this->load->view("dash/gerenciar_bebidas.php", $data);
        

          
    }

    /* função para carregar página de gerenciamento de marcas */
    public function gerenciar_marcas(){
        /* verifica se o adm está logado */
        if(!$this->session->has_userdata("adm")) redirect("/");

        /* carrega o model da página bebidas */
        $this->load->model("bebida_model", "bebida");

        /* carregandos os dados da página */
        $data["dados"] = $this->bebida->getMarcas();

        /* dados que serão passados como parâmetro */
        /* enviando como parâmetro a cor da ul */
        $data['cor_ul_gmarcas'] = 'ul-marcada';

        /* carrega a base da página e a tela de dashboard como padrão */
        $this->load->view("dash/base.php", $data);
        $this->load->view("dash/gerenciar_marcas.php", $data);
        
    }

    /* função para carregar página de gerenciamento de categorias */
    public function gerenciar_categorias(){

        /* verifica se o adm está logado */
        if(!$this->session->has_userdata("adm")) redirect("/");

        /* carrega o model da página bebidas */
        $this->load->model("bebida_model", "bebida");

        /* carregandos os dados da página */
        $data["dados"] = $this->bebida->getCategorias();

        /* dados que serão passados como parâmetro */
        /* enviando como parâmetro a cor da ul */
        $data['cor_ul_gcategorias'] = 'ul-marcada';

        /* carrega a base da página e a tela de dashboard como padrão */
        $this->load->view("dash/base.php", $data);
        $this->load->view("dash/gerenciar_categorias.php", $data);
        
    }

    /* função para carregar a página de adição de uma nova bebida */
    public function add_bebida(){

        /* verifica se o usuário está logado */
        if(!$this->session->has_userdata("adm")) redirect("/");
        
		/* Carregando o model bebidas */
        $this->load->model("bebida_model", "bebida");

        /* carregandos os dados necessários para renderizar a página */
        $dados['marcas'] = $this->bebida->getMarcas();
        $dados['categorias'] = $this->bebida->getCategorias();
        
        /* dados que serão passados como parâmetro */
        /* enviando como parâmetro a cor da ul */
        $data['cor_ul_gbebidas'] = 'ul-marcada';

        /* carrega a base da página e a tela de adição de nova bebida  */
        $this->load->view("dash/base.php", $data);
		$this->load->view("dash/add_bebida.php", $dados );
    }

    /* função para carregar a página de edição de uma bebida */
    public function editar(){

        /* verifica se o usuários está logado */
		if(!$this->session->has_userdata("adm")) redirect("/");

		/* verifica se foi passado um id */
		if(!$id) redirect("/");

		/* Carregando o model produtos */
		$this->load->model("bebida_model", "bebida");

		/* fazendo consulta no bd para verificar se existe o registro */
		//$query = $this->produtos->getProdutoByID($id);

		/* verifica se existe */
		//if(!$query) redirect("/");

		/* criando array onde será guardado os dados (será passado para view) */
		//$dados["produto"] = $query;

		/* carregando a view */
		$this->load->view("editarProdutos");
    }

    /* função para chamar o model e gravar os dados do formulário */
    public function gravar(){
        /* verifica se o usuários está logado */
        if(!$this->session->has_userdata("adm")) redirect("/");
        
        /* verifica de onde veio a requisição */
        /* no caso da requisição vir da página de gerencimaneto de categorias */
        if($this->input->post("tipo") == "categoria"){

            /* verifica se todos os campos foram preenchidos */
            if($this->input->post("nome-categoria")){

                /* passsando os dados para um array */
                $this->data["nome-categoria"] = $this->input->post("nome-categoria");

                /* carrega e chama a função gravar categoria do model */
                $this->load->model("bebida_model", "bebida");
                $this->bebida->addCategoria($this->data);

                /* redirecionando */
                redirect("/bebida/gerenciar_categorias");

            }else{
                /* Adiconando mensagem de sucesso na sessão */
                $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-danger'>Erro ao adicionar categoria, preencha todos os campos para fazer isso.</div>");
            }

        }

        /* no caso da requisição vir da página de gerenciamento de marcas */
        else if($this->input->post("tipo") == "marca"){
            
            /* verifica se todos os campos foram preenchidos */
            if($this->input->post("nome-marca")){

                /* passsando os dados para um array */
                $this->data["nome-marca"] = $this->input->post("nome-marca");

                /* carrega e chama a função gravar categoria do model */
                $this->load->model("bebida_model", "bebida");
                $this->bebida->addMarca($this->data);

                /* redirecionando */
                redirect("/bebida/gerenciar_marcas");

            }else{
                /* Adiconando mensagem de sucesso na sessão */
                $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-danger'>Erro ao adicionar marca, preencha todos os campos para fazer isso.</div>");
            }

        }

        /* no caso da requisição vir da agoma de gerenciamento de bebidas */
        else {

            /* recebe os dados */
            $dados['nome_tipo_bebida'] = $this->input->post("nome_tipo_bebida");
            $dados['ml'] = $this->input->post("ml");
            $dados['preco_bebida'] = $this->input->post("preco_bebida");
            $dados['descricao_bebida'] = $this->input->post("descricao_bebida");
            $dados['teor_alcoolico'] = $this->input->post("teor_alcoolico");
            $dados['marca_id_marca'] = $this->input->post("marca");
            $dados['tipo_bebida'] = $this->input->post("tipo_bebida");
            $dados['img2'] = $this->input->post("img2");
            $dados['img3'] = $this->input->post("img3");
            $dados['img4'] = $this->input->post("img4");
            $dados['categorias'] = $this->input->post("categorias");
            $dados['estoque'] = $this->input->post("estoque");

            /* carrega e chama a função gravar categoria do model */
            $this->load->model("bebida_model", "bebida");
            $this->bebida->addBebida($dados);

            /* redirecionando */
            //redirect("/bebida/gerenciar_bebidas");


        }
        

    }

    /* função para chamar o model e atualizar os dados do formulário */
    public function atualizar(){

        /* verifica se o usuários está logado */
        if(!$this->session->has_userdata("adm")) redirect("/");

        /* verifica de onde veio a requisição */
        /* no caso da requisição vir da página de gerencimaneto de categorias */
        if($this->input->post("tipo") == "categoria"){
            
            /* verificando se todos os dados foram preenchidos */
            if(
                $this->input->post("nome-categoria") &&
                $this->input->post("id-categoria")
            ){

                /* recebendo os dados */
                $dados['nome'] = $this->input->post("nome-categoria");
                $dados['id'] = $this->input->post("id-categoria");

                /* carrega e chama a função atualizar categoria do model */
                $this->load->model("bebida_model", "bebida");
                $this->bebida->atualizarCategoria($dados);
                
                /* redirecionando */
                redirect("/bebida/gerenciar_categorias");

            }else{
                /* Adiconando mensagem de sucesso na sessão */
                $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-danger'>Erro ao atualizar categoria, preencha todos os campos para fazer isso.</div>");
            }
        }

        /* no caso da requisição vir da página de gerenciamento de marcas */
        else if($this->input->post("tipo") == "marca"){
            /* verificando se todos os dados foram preenchidos */
            if(
                $this->input->post("nome-marca") &&
                $this->input->post("id-marca")
            ){

                /* recebendo os dados */
                $dados['nome'] = $this->input->post("nome-marca");
                $dados['id'] = $this->input->post("id-marca");
                

                /* carrega e chama a função atualizar marca do model */
                $this->load->model("bebida_model", "bebida");
                $this->bebida->atualizarMarca($dados);
                
                /* redirecionando */
                redirect("/bebida/gerenciar_marcas");

            }else{
                /* Adiconando mensagem de sucesso na sessão */
                $this->session->set_flashdata('gravar_dados_bebidas', "<div class = 'alert alert-danger'>Erro ao atualizar marca, preencha todos os campos para fazer isso.</div>");
            }

        }

    }

    /* funções para apagar categorias, marcas ou bebidas */
    public function apagar($tipo = NULL, $id = NULL){

        /* verifica se o usuários está logado */
        if(!$this->session->has_userdata("adm")) redirect("/");

        /* verifica se todos os dados foram passados */
		if($id == NULL && $tipo) redirect("/");

        /* carrega o model bebidas */
		$this->load->model("bebida_model", "bebida");

        /* verifica se o que irá apagar é bebida, marca ou categoria */

        if($tipo == "categoria")
            /* chamando o model de exclusão */
		    $this->bebida->apagarCategoria($id);
        
        else if($tipo == "marca")
            /* chamando model de exclusão */
            $this->bebida->apagarMarca($id);

		/* redirecionando */
        redirect("/bebida/gerenciar_marcas");

    }
}
