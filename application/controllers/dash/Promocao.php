<?php
/* Não permitindo que a URL seja acessada diretamente */
defined('BASEPATH') OR exit('No direct script access allowed');

/* Controlador do model de promoções */
class Promocao extends CI_Controller {
	
	/* primeira função que é chamada (carregando a tela) */
	public function index(){

        /* dados que serão passados como parâmetro */
        /* enviando como parâmetro a cor da ul */
        $data['cor_ul_gpromocoes'] = 'ul-marcada';

        /* Carregando a view da tela de gerenciamento de promoções */
        $this->load->view("dash/base.php", $data);
        $this->load->view("dash/gerenciar_promocoes.php");
		
    }
}
