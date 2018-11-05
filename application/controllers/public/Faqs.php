<?php 

/* Não permitindo que a URL seja acessada diretamente */
defined('BASEPATH') OR exit('No direct script access allowed');

Class Faqs extends CI_Controller{

    public function index(){
        $this->load->view('public/header.php');
        $this->load->view("public/faqs.php");
        $this->load->view('public/footer.php');
    }

}


?>