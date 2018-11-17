<?php 

/* Não permitindo que a URL seja acessada diretamente */
defined('BASEPATH') OR exit('No direct script access allowed');

Class Privacy extends CI_Controller{

    public function index(){
        $this->load->view('public/header.php');
        $this->load->view("public/privacy.php");
        $this->load->view('public/footer.php');
    }

}


?>