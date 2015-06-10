<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('home/index');
    }

    public function cadastrar() {
        $this->form_validation->set_rules('login', 'Login', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|');
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required|min_length[6]');
        if ($this->form_validation->run() == FALSE) {           
            $this->load->view('home/index');
        } else {
            $this->load->view('home/logado');
        }
    }
    public function logado() {
        echo "entrei";
    }

}

// home.php