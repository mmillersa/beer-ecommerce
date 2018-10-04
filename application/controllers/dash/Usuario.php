<?php
/* Não permitindo que a URL seja acessada diretamente */
defined('BASEPATH') OR exit('No direct script access allowed');

/* Controlador do model de cadastro de clientes */
class Usuario extends CI_Controller {
	
	/* primeira função que é chamada (carregando a tela) */
	public function index(){

		/* Carregando o model (nome e apelido) */
		$this->load->model("dash/usuario_model", "usuario");
		
    }
    
    /* função para fazer o cadastro */
    public function cadastrar(){

        /* Carregando o model (nome e apelido) */
        $this->load->model("dash/usuario_model", "usuario");
        
        /* recuperando os dados do form */
        $dados['cpf'] = $this->input->post("cpf");
        $dados['senha'] = $this->input->post("senha");
        $dados['nome'] = $this->input->post("nome");
        $dados['data_nascimento'] = $this->input->post("data_nascimento");
        $dados['apelido'] = $this->input->post("apelido");

        
        /* verifica se os campos estão preenchidos e chama a função de cadast9 */
        if($dados['cpf'] && $dados['senha'] && $dados['nome'] && $dados['data_nascimento'] && $data['apelido']) 
            $this->usuario->cadastrarUsuario($dados);
        
        /* redirecionando */
        redirect("");
        
    }

    /* função para realizar update no cadastro */
    public function atualizar(){
        /* Carregando o model (nome e apelido) */
        $this->load->model("dash/usuario_model", "usuario");

        /* recuperando os dados do form */
        $dados['senha'] = $this->input->post("senha");
        $dados['apelido'] = $this->input->post("apelido");
    }


}
