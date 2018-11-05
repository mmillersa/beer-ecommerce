<?php
/* Não permitindo que a URL seja acessada diretamente */
defined('BASEPATH') OR exit('No direct script access allowed');

/* Controlador do model/DAO de login */
class Fornecedor extends CI_Controller {

	/* Construtor do controlador de promoções */
	public function __construct(){

		/* carregando o DAO de fornecedor */
		parent::__construct();
		$this->load->dao("fornecedor_dao", "", TRUE);
		
	}
	
    /* primeira função que é chamada */
    public function index(){

        /* verifica se o adm está logado */
		if(!$this->session->has_userdata("adm")) redirect("/");
		
		/* carregando os fornecedores */
		$dados['fornecedores'] = $this->fornecedor_dao->getFornecedores();

        /* dados que serão passados como parâmetro */
        /* enviando como parâmetro a cor da ul */
        $data['cor_ul_gfornecedores'] = 'ul-marcada';

        /* carrega as views */
        $this->load->view("dash/base.php", $data);
        $this->load->view("dash/gerenciar_fornecedores.php", $dados);
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

	/* função que carrega a página para editar um fornecedor */
	public function editar($id = NULL){

		/* verifica se o adm está logado */
		if(!$this->session->has_userdata("adm")) redirect("/");

		/* dados que serão passados como parâmetro */
		/* enviando como parâmetro a cor da ul */
		$data['cor_ul_gfornecedores'] = 'ul-marcada';

		/* recuperando as informações do fornecedor */
		$dados['fornecedor'] = $this->fornecedor_dao->getFornecedorByID($id);

		/* carrega as views */
		$this->load->view("dash/base.php", $data);
		$this->load->view("dash/editar_fornecedor.php", $dados);
		
	}

	/* função para chamar o DAO de gravação em banco de dados */
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

		/* verifica se a requisição é uma edição ou gravação */

		if($this->input->post("tipo") == "gravar"){

			/* chamando a função de inserção */
			$this->fornecedor_dao->insert($dados, $contato, $endereco);

		}else{

			/* recebendo o id's */
			$dados['id_fornecedor'] = $this->input->post("id_fornecedor");
			$endereco['id_endereco'] = $this->input->post("id_endereco");
			$contato['id_contato'] = $this->input->post("id_contato");

			/* chamar a função de edição */
			$this->fornecedor_dao->update($dados, $contato, $endereco);

		}

		/* redirecionando */
		redirect("dash/fornecedor");
	
	}

	/* função para chamar o DAO para deletar um fornecedor do banco de dados */
	public function deletar(){

		/* verifica se o adm está logado */
		if(!$this->session->has_userdata("adm")) redirect("/");

		/* chamando a função para deletar no DAO */
		$this->fornecedor_dao->delete(
			$this->input->post("id_fornecedor"),
			$this->input->post("id_contato"),
			$this->input->post("id_endereco")

		);

		/* redirecionando */
		redirect("dash/fornecedor");
	}
}
