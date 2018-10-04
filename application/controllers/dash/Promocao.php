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

    /* função para chamar o model e editar ou adicionar uma nova promoção */
    public function gravar(){
        /* verifica se o adm está logado */
		if(!$this->session->has_userdata("adm")) redirect("/");
    }
}
