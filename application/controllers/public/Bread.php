<?php 

/* Não permitindo que a URL seja acessada diretamente */
defined('BASEPATH') OR exit('No direct script access allowed');

Class Bread extends CI_Controller{

    public function index(){
        $this->load->view("public/bread.php");
    }

}


?>