<?php
/* Não permitindo que a URL seja acessada diretamente */
defined('BASEPATH') OR exit('No direct script access allowed');

/* Controlador do model de promoções */
class Promocao extends CI_Controller {
	
	/* primeira função que é chamada (carregando a tela) */
	public function index(){

        /* verifica se o adm está logado */
		if(!$this->session->has_userdata("adm")) redirect("/");

        /* dados que serão passados como parâmetro */
        /* enviando como parâmetro a cor da ul */
        $data['cor_ul_gpromocoes'] = 'ul-marcada';

        /* carregando as bebidas */
        $this->load->model("dash/bebida_model", "bebida");
        $dados['bebidas'] = $this->bebida->getBebidas();

        /* Carregando a view da tela de gerenciamento de promoções */
        $this->load->view("dash/base.php", $data);
        $this->load->view("dash/gerenciar_promocoes.php", $dados);
		
    }

    /* função para chamar o model e editar ou adicionarq uma nova promoção */
    public function gravar(){
        /* verifica se o adm está logado */
        if(!$this->session->has_userdata("adm")) redirect("/");
        
        /* verifica qual o tipo de requisição */
        /* no caso de uma nova promoção */
        if($this->input->post("tipo") == "adicionar"){

            /* guardando os parâmetros */
            $dados['apelido_promocao'] = $this->input->post("apelido_promocao");
            $dados['desconto'] = $this->input->post("desconto");
            $dados['bebidas_desconto'] = $this->input->post("bebidas_desconto");

            /* carregando o model de promoção */
            $this->load->model("dash/promocao_model", "promocao");

            /* chamando a função para adicionar uma nova promoção */
            $this->promocao->addPromocao($dados);

        }

        /* redirecionando */
        redirect("dash/promocao");
    }
}
