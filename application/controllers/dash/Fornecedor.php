<?php
/* Não permitindo que a URL seja acessada diretamente */
defined('BASEPATH') OR exit('No direct script access allowed');

/* Controlador do model de login */
class Fornecedor extends CI_Controller {
	
    /* primeira função que é chamada */
    public function index(){

        /* verifica se o adm está logado */
        if(!$this->session->has_userdata("adm")) redirect("/");

        /* dados que serão passados como parâmetro */
        /* enviando como parâmetro a cor da ul */
        $data['cor_ul_gfornecedores'] = 'ul-marcada';


        /* carrega as views */
        $this->load->view("dash/base.php", $data);
        $this->load->view("dash/gerenciar_fornecedores.php");
	}
	
	/* função que carrega a página para adicionar um novo fornecedor */
    public function add(){

		/* verifica se o adm está logado */
		if(!$this->session->has_userdata("adm")) redirect("/");

		/* dados que serão passados como parâmetro */
		/* enviando como parâmetro a cor da ul */
		$data['cor_ul_gfornecedores'] = 'ul-marcada';


		/* carrega as views */
		$this->load->view("dash/base.php", $data);
		$this->load->view("dash/add_fornecedor.php");
	}

	/* função para chamar o model de gravação em banco de dados */
	public function gravar(){
		
		/* verifica se o adm está logado */
		if(!$this->session->has_userdata("adm")) redirect("/");

		/* dados que serão passados como parâmetro */
		/* enviando como parâmetro a cor da ul */
		$data['cor_ul_gfornecedores'] = 'ul-marcada';

		/* recebe os dados do post */
		$dados['nome_fornecedor'] = $this->input->post("nome_fornecedor");
		$dados['cnpj_fornecedor'] = $this->input->post("cnpj_fornecedor");
		$dados['email_fornecedor'] = $this->input->post("email_fornecedor");

		$contato['numero_telefone'] = $this->input->post("numero_telefone");
		$contato['numero_celular'] = $this->input->post("numero_celular");

		$endereco['cep'] = $this->input->post("cep");
		$endereco['rua'] = $this->input->post("rua");
		$endereco['bairro'] = $this->input->post("bairro");
		$endereco['cidade'] = $this->input->post("cidade");
		$endereco['uf'] = $this->input->post("uf");
		$endereco['numero_endereco'] = $this->input->post("numero_endereco");
		$endereco['complemento'] = $this->input->post("complemento");

		
		/* chamando o model */
		$this->load->model("dash/fornecedor_model", "fornecedor");

		/* chamando a função de inserção */
		$this->fornecedor->addFornecedor($dados, $contato, $endereco);

		/* redirecionando */
		redirect("dash/fornecedor/");
	
	}	


}
