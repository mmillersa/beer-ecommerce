<?php
/* Não permitindo que a URL seja acessada diretamente */
defined('BASEPATH') OR exit('No direct script access allowed');

/* Controlador do model da página de marca */
class Marca extends CI_Controller {

    /* construtor da classe */
    public function __construct(){

        /* carregando os models e DAOs necessários */
		parent::__construct();
        $this->load->dao("marca_dao", "", TRUE);
    }
    
	/* primeira função que é chamada */
	public function index(){

        /* verifica se o adm está logado */
        if(!$this->session->has_userdata("adm")) redirect("/");

        /* carregandos os dados da página */
        $data["dados"] = $this->marca_dao->getMarcas();

        /* dados que serão passados como parâmetro */
        /* enviando como parâmetro a cor da ul */
        $data['cor_ul_gmarcas'] = 'ul-marcada';

        /* carrega a base da página e a tela de dashboard como padrão */
        $this->load->view("dash/base.php", $data);
        $this->load->view("dash/gerenciar_marcas.php", $data);

    }

    /* função para gravar dados do formulário */
    public function gravar(){

        /* verifica se o usuário está logado */
        if(!$this->session->has_userdata("adm")) redirect("/");

        
        /* chamando a função de inserção do DAO */
        $this->marca_dao->insert(
            $this->input->post("nome_marca")
        );

        /* redirecionando */
        redirect("/dash/marca");
    }

    /* função para apagar uma marca */
    public function apagar($id = NULL){

        /* verifica se o usuário está logado */
        if(!$this->session->has_userdata("adm")) redirect("/");

        /* chamando a função de delete do DAO */
        $this->marca_dao->delete(
            $id
        );

        /* redirecionando */
        redirect("/dash/marca");
    }

    /* função para atualizar uma marca */
    public function atualizar(){

        /* verifica se o usuário está logado */
        if(!$this->session->has_userdata("adm")) redirect("/");

        /* carrega e chama a função atualizar marca do model */
        $this->marca_dao->update(
            $this->input->post("nome_marca"),
            $this->input->post("id_marca")
        );    

        /* redirecionando */
        redirect("/dash/marca");
        
    }
    
}

?>