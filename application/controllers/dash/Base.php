<?php
/* Não permitindo que a URL seja acessada diretamente */
defined('BASEPATH') OR exit('No direct script access allowed');

/* Controlador do model da página home */
class Base extends CI_Controller {
	
	/* primeira função que é chamada */
	public function index(){

		/* verifica se o adm está logado */
        if(!$this->session->has_userdata("adm")) redirect("/");
        
        /* carrega o model da página home */
        $this->load->model("dash/base_model", "base");

        /* dados que serão passados como parâmetro */

        /* enviando como parâmetro a cor da ul */
        $data['cor_ul_inicio'] = 'ul-marcada';

        /* carrega a base da página e a tela de dashboard como padrão */
        $this->load->view("dash/base.php", $data);
        $this->load->view("dash/dash.php");
		
    }



}

?>