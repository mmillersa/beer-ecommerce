<?php
/* Não permitindo que a URL seja acessada diretamente */
defined('BASEPATH') OR exit('No direct script access allowed');

/* Controlador do model da página home */
class Home extends CI_Controller {
	
	/* primeira função que é chamada */
	public function index(){

		/* verifica se o adm está logado */
        if(!$this->session->has_userdata("adm")) redirect("/");
        
        /* carrega o model da página home */
        $this->load->model("home_model", "home");

        /* carrega a view da página home */

        $this->load->view("dash/home.php");
		
    }
    


}
