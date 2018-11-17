<?php
/* Não permitindo que a URL seja acessada diretamente */
defined('BASEPATH') OR exit('No direct script access allowed');

/* model de promoções */
class Promocao extends CI_Controller {

    /* Construtor do controlador de promoções */
    public function __construct(){

		/* carregando o os DAOS necessários para a págia */
		parent::__construct();
        $this->load->dao("promocao_dao", "", TRUE);
        $this->load->dao("bebida_dao", "", TRUE);
        
	}

	/* primeira função que é chamada (carregando a tela) */
	public function index(){

        /* verifica se o adm está logado */
		if(!$this->session->has_userdata("adm")) redirect("/");

        /* dados que serão passados como parâmetro */
        /* enviando como parâmetro a cor da ul */
        $data['cor_ul_gpromocoes'] = 'ul-marcada';

        /* carregando as bebidas */
        $dados['bebidas'] = $this->bebida_dao->getBebidas();

        /* carregando as promoções */
        $dados['promocoes'] = $this->promocao_dao->getPromocoes();

        /* Carregando a view da tela de gerenciamento de promoções */
        $this->load->view("dash/base.php", $data);
        $this->load->view("dash/gerenciar_promocoes.php", $dados);
		
    }

    /* função para chamar o model e editar ou adicionar uma nova promoção */
    public function gravar(){

        /* verifica se o adm está logado */
        if(!$this->session->has_userdata("adm")) redirect("/");

        
        /* guardando os parâmetros */
        $dados['apelido_promocao'] = $this->input->post("apelido_promocao");
        $dados['desconto'] = $this->input->post("desconto");
        $dados['bebidas_desconto'] = $this->input->post("bebidas_desconto");
    

        if($this->input->post("tipo") == "adicionar")
            /* chamando a função para adicionar uma nova promoção */
            $this->promocao_dao->addPromocao($dados);

        else
            /* chamando a função para atualizar uma promoção */
            $this->promocao_dao->attPromocao($dados, $this->input->post("id_promocao"));

        /* redirecionando */
        redirect("dash/promocao");
    }

    /* função para chamar o model de atualizar o status de uma promoção */
    public function attStatus(){

        /* verifica se o usuários está logado */
        if(!$this->session->has_userdata("adm")) redirect("/");

        /* recebendo os dados do post */
        $id = $this->input->post("id");
        $status = $this->input->post("status"); 

        /* chama a função do model */
        $this->promocao_dao->attStatusPromocao($id, $status);
    }

    /* função para chamar a página de editar uma promoção */
    public function editar($id = NULL){

        /* verifica se o usuários está logado */
		if(!$this->session->has_userdata("adm")) redirect("/");

		/* verifica se foi passado um id */
        if(!$id) redirect("/");
    
		/* Carregando os models necessários */
        $this->load->model("dash/bebida_model", "bebida");

        /* carregando informações sobre a promoção */
        $dados['promocao'] = $this->promocao->getPromocaoByID($id)[0];

        /* carregando as bebidas */
        $dados['bebidas'] = $this->bebida->getBebidas();

        $dados['cor_ul_gpromocoes'] = 'ul-marcada';

        /* carregando as views */
        $this->load->view("dash/base.php", $dados);
		$this->load->view("dash/editar_promocao.php", $dados);
    }
}
