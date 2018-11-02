<?php
/* Não permitindo que a URL seja acessada diretamente */
defined('BASEPATH') OR exit('No direct script access allowed');

/* Controlador do model da página de categorias */
class Categoria extends CI_Controller {

    /* construtor da classe */
    public function __construct(){

        /* carregando os models e DAOs necessários */
		parent::__construct();
        $this->load->dao("categoria_dao", "", TRUE);
    }
    
	/* primeira função que é chamada */
	public function index(){

        /* verifica se o adm está logado */
        if(!$this->session->has_userdata("adm")) redirect("/");

        /* carregandos os dados da página */
        $data["dados"] = $this->categoria_dao->getCategorias();

        /* dados que serão passados como parâmetro */
        /* enviando como parâmetro a cor da ul */
        $data['cor_ul_gcategorias'] = 'ul-marcada';

        /* carrega a base da página e a tela de dashboard como padrão */
        $this->load->view("dash/base.php", $data);
        $this->load->view("dash/gerenciar_categorias.php", $data);

    }

    /* função para gravar dados do formulário */
    public function gravar(){

        /* verifica se o usuário está logado */
        if(!$this->session->has_userdata("adm")) redirect("/");

        /* chamando a função de inserção do DAO */
        $this->categoria_dao->insert(
            $this->input->post("descricao_categoria")
        );

        /* redirecionando */
        redirect("/dash/categoria");
    }

    /* função para apagar uma categoria */
    public function apagar($id = NULL){

        /* verifica se o usuário está logado */
        if(!$this->session->has_userdata("adm")) redirect("/");

        /* chamando a função de delete do DAO */
        $this->categoria_dao->delete(
            $id
        );

        /* redirecionando */
        redirect("/dash/categoria");
    }

    /* função para atualizar uma categoria */
    public function atualizar(){

        /* verifica se o usuário está logado */
        if(!$this->session->has_userdata("adm")) redirect("/");

        /* carrega e chama a função atualizar categoria do model */
        $this->categoria_dao->update(
            $this->input->post("descricao_categoria"),
            $this->input->post("id_categoria")
        );    

        /* redirecionando */
        redirect("/dash/categoria");
        
    }
    
}

?>