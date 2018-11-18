<?php
/* Não permitindo que a URL seja acessada diretamente */
defined('BASEPATH') OR exit('No direct script access allowed');

/* Controlador do model de login */
class Auth extends CI_Controller {
	
	/* primeira função que é chamada */
	public function index(){

        /* Aqui será carregada a view */
        $this->load->view("dash/login.php");
		
    }
    
    /* função para fazer o login no sistema */
    public function logar(){

        /* Carregando o model (nome e apelido) */
        $this->load->model("dash/auth_model", "auth");
        
        /* recuperando os dados do form */
        $dados['senha'] = $this->input->post("senha");
        $dados['cpf'] = $this->input->post("cpf");
        $dados['tipo_auth'] = $this->input->post("tipo_auth");
        
        /* verifica se os campos estão preenchidos e chama a função de loguin */
        if($dados['cpf'] && $dados['senha']) $auth = $this->auth->auth($dados);

    }

}
?>