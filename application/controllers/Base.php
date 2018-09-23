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
        $this->load->model("base_model", "base");

        /* carrega a base da página e a tela de dashboard como padrão */
        $this->load->view("dash/base.php");
        $this->load->view("dash/dash.php");
		
    }
    


}
